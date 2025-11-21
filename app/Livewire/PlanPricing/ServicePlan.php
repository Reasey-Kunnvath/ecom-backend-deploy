<?php

namespace App\Livewire\PlanPricing;

use Livewire\Component;
use App\Models\StripePricing;
use App\Trait\HasNotification;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use App\Models\SubscriptionPlan;
use Illuminate\Testing\Fluent\Concerns\Has;

#[Title('Plan & Services')]
class ServicePlan extends Component
{
    use HasNotification;
    // MISC
    public $isEditMode = false;
    public $isDeleteMode = false;

    // SEARCH
    public $search = '';

    public $plan_id = '';
    public $plan_code = '';
    public $plan_name = '';
    public $product_id = '';
    public $plan_duration = '';
    public $max_post = '';
    public $is_active = true;
    public $plan_description = '';
    public $plan_features = [''];

    public function addFeature()
    {
        $this->plan_features[] = '';
    }

    public function removeFeature($index)
    {
        unset($this->plan_features[$index]);
        $this->plan_features = array_values($this->plan_features);
    }

    protected function rules()
    {
        return [
            // 'plan_code' => 'required|string|max:50|unique:subscription_plans,plan_code',
            'plan_code' => [
                'required',
                'string',
                'max:50',
                $this->isEditMode ?
                    Rule::unique('subscription_plans', 'plan_code')->ignore($this->plan_id) :
                    'unique:subscription_plans,plan_code'
            ],
            'plan_name' => 'required|string|max:100',
            'plan_description' => 'nullable|string|max:255',
            'plan_duration' => 'required|integer|min:1,max:31',
            'max_post' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
            'product_id' => 'required|exists:stripe_pricing,product_id',
            'plan_features.*' => 'nullable|string|max:100'
        ];
    }

    public function resetFields()
    {
        $this->reset([
            'plan_id',
            'plan_code',
            'plan_name',
            'plan_description',
            'plan_duration',
            'max_post',
            'is_active',
            'product_id',
            'plan_features'
        ]);
        $this->plan_features = [''];
        $this->is_active = true;
    }


    public function openCreateModal()
    {
        $this->resetFields();
        $this->isEditMode = false;
        $this->dispatch('show-modal');
    }

    public function openEditModal($id)
    {
        $plan = SubscriptionPlan::find($id);
        if (!$plan) {
            $this->sweetToastError('Service Plan not found!');
            return;
        }

        $this->plan_id = $plan->id;
        $this->plan_code = $plan->plan_code;
        $this->plan_name = $plan->plan_name;
        $this->plan_description = $plan->plan_description;
        $this->plan_duration = $plan->plan_duration;
        $this->max_post = $plan->max_post;
        $this->is_active = $plan->is_active;
        $this->product_id = StripePricing::where('price_id', $plan->stripe_price_id)->first()->product_id;
        $this->plan_features = $plan->plan_features ?? [''];

        $this->isEditMode = true;
        $this->dispatch('show-modal');
    }

    public function openDeleteModal($id)
    {
        $this->plan_id = $id;
        $this->plan_name = SubscriptionPlan::find($id)->plan_name;
        $this->isDeleteMode = true;
        $this->dispatch('open-delete-modal');
    }

    // CRUD
    public function save()
    {
        try {
            $this->validate();
        } catch (\Throwable $th) {
            $this->sweetToastError($th->getMessage());
            return;
        }

        $features = array_filter($this->plan_features, fn($f) => trim($f) !== '');

        $data = $this->only([
            'plan_code',
            'plan_name',
            'plan_description',
            'plan_duration',
            'max_post',
            'is_active'
        ]);

        $data['plan_features'] = !empty($features) ? $features : null;

        $stripe = StripePricing::where('product_id', $this->product_id)->first();
        $data['plan_price'] = $stripe->amount;
        $data['stripe_price_id'] = $stripe->price_id;

        if ($this->isEditMode) {
            SubscriptionPlan::find($this->plan_id)->update($data);
            $this->sweetToastSuccess('Service Plan Updated successfully!');
        } else {
            SubscriptionPlan::create($data);
            $this->sweetToastSuccess('Plan created successfully!');
        }

        $this->dispatch('close-modal');
        $this->resetFields();
    }

    public function delete()
    {
        SubscriptionPlan::find($this->plan_id)->delete();
        $this->sweetToastSuccess('Service Plan deleted successfully!');
        $this->dispatch('close-delete-modal');
        $this->resetFields();
    }

    // RENDER
    public function fetchSubPlan()
    {
        return SubscriptionPlan::Search($this->search)->orderBy('id', 'ASC')->paginate(8);
    }

    public function fetchPricing()
    {
        return StripePricing::Search($this->search)->orderBy('id', 'ASC')->paginate(8);
    }

    public function render()
    {
        return view('livewire.service-subscription.service-plan', [
            'services' => $this->fetchSubPlan(),
            'pricings' => $this->fetchPricing()
        ]);
    }
}