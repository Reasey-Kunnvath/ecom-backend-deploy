<?php

namespace App\Livewire\PaymentSubscription;

use Stripe\Stripe;
use App\Models\User;
use Livewire\Component;
use App\Models\JobPosting;
use Illuminate\Support\Str;
use App\Models\SubscribedUser;
use App\Trait\HasNotification;
use App\Models\SubscriptionPlan;
use App\Models\CancelledSubscription;
use Stripe\Subscription as StripeSubscription;

class Subscription extends Component
{
    use HasNotification;
    public $step = 1;
    public $search = '';

    public $bUser;
    public $bPlan;

    public $user_id = '';
    public $sub_plan_id = '';

    public $revokeReason = '';
    public $revokeNow = false;

    public $selectedSubscription;

    public $isRevokeMode = false;

    public function __construct(){
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    public function openEditModal($id){
        $this->selectedSubscription = SubscribedUser::with('subscriptionPlan')->find($id);
        $this->isRevokeMode = false;
        $this->dispatch('show-subscription-modal');
    }

    public function openRevokeModal($id){
        $this->selectedSubscription = SubscribedUser::with('subscriptionPlan')->find($id);
        $this->isRevokeMode = true;
        $this->dispatch('show-subscription-modal');
    }

    public function updatedUserId($user_id){
        $this->bUser = User::find($user_id);
    }

    public function updatedSubPlanId($sub_plan_id){
        $this->bPlan = SubscriptionPlan::find($sub_plan_id);
    }

    public function openCreateModal(){
        $this->dispatch('show-modal');
    }

    protected function rules (){
        return [
            'user_id' => 'required',
            'sub_plan_id' => 'required',
        ];
    }

    public function resetModal(){
        $this->user_id = '';
        $this->sub_plan_id = '';
        $this->step = 1;
        $this->bUser = null;
        $this->bPlan = null;
        $this->reset();
    }

    public function save(){
        try{
            $this->validate();
        }catch(\Throwable $th){
            $this->sweetToastError($th->getMessage());
            return;
        }

        $exists = SubscribedUser::where('user_id', $this->user_id)->where('is_active', true)->exists();

        if($exists){
            $this->sweetToastError('User already has an active subscription');
            $this->dispatch('close-modal');
            $this->resetModal();
            return;
        }

        try{
            SubscribedUser::create([
                'subscription_plan_id' => $this->bPlan->plan_code,
                'stripe_subscription_id' => 'GIVEAWAY'.random_int(10000, 99999),
                'start_date' => now(),
                'end_date' => now()->addDays($this->bPlan->plan_duration),
                'is_active' => true,
                'status' => 'ACTIVE',
                'user_id' => $this->user_id,
            ]);
            $this->sweetToastSuccess('Subscription created successfully');
            $this->dispatch('close-modal');
            $this->resetModal();
        }catch(\Throwable $th){
            $this->sweetToastError($th->getMessage());
        }
    }

    public function reCheck(){
        try{
            SubscribedUser::expired()->where('is_active', true)->update(['is_active' => false]);
        }catch(\Throwable $th){
            $this->sweetToastError($th->getMessage());
            return;
        }

        $this->sweetToastSuccess('Subscriptions re-checked successfully!');
    }

    public function revokeSubcription(){

        if(!$this->selectedSubscription->is_active){
            $this->sweetToastError('Subscription already expired');
            $this->dispatch('close-modal');
            $this->resetModal();
            return;
        }

        try{
            $this->validate([
                'revokeReason' => 'required',
            ]);
        }catch(\Throwable $th){
            $this->sweetToastError($th->getMessage());
            return;
        }

        try{
            if (!Str::startsWith($this->selectedSubscription->stripe_subscription_id, 'GIVEAWAY')) {
                $sub = StripeSubscription::retrieve($this->selectedSubscription->stripe_subscription_id);

                if ($this->revokeNow) {
                    $sub->cancel([
                        'invoice_now' => true,
                        'prorate' => true,
                    ]);
                } else {
                    $sub->cancel_at_period_end = true;
                    $sub->metadata = [
                        'cancellation_reason' => $this->revokeReasoneason,
                        'cancel_immediately' => false,
                    ];
                }
            }

            SubscribedUser::find($this->selectedSubscription->id)->update([
                'is_active' => false,
                'status' => 'REVOKED'
            ]);

            CancelledSubscription::create([
                'user_id' => $this->selectedSubscription->user_id,
                'stripe_subscription_id' => $this->selectedSubscription->stripe_subscription_id,
                'cancelled_at' => now(),
                'effective_date' => $this->revokeNow ? now() : $this->selectedSubscription->end_date,
                'reason' => $this->revokeReason
            ]);

            JobPosting::where('maker_id', $this->selectedSubscription->user_id)->update(['is_active' => false]);

            $this->sweetToastSuccess('Subscription revoked successfully');
            $this->dispatch('close-modal');
            $this->resetModal();
        }catch(\Throwable $th){
            $this->sweetToastError($th->getMessage());
        }
    }

    public function fetchSubscription(){
        return SubscribedUser::with('subscriptionPlan')->Search($this->search)->orderBy('created_at', 'desc')->get();
    }

    public function fetchPlans(){
        return SubscriptionPlan::with('stripePricing')->where('is_active', true)->get();
    }

    public function fetchUsers(){
        return User::where('role', 'EMP')->where('status', 'true')->get();
    }

    public function render()
    {
        return view('livewire.payment-subscription.subscription', [
            'subscriptions' => $this->fetchSubscription(),
            'plans' => $this->fetchPlans(),
            'users' => $this->fetchUsers(),
        ]);
    }
}