<?php

namespace App\Livewire\PlanPricing;

use Stripe\Price;
use Stripe\Stripe;
use Stripe\Product;
use Livewire\Component;
use App\Models\StripePricing;
use App\Trait\HasNotification;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

#[Title('Product & Pricing')]
class Pricing extends Component
{
    use HasNotification;
    // MISC
    public $search = '';
    public $isEditMode = false;

    // FIELDS
    public $product_id;
    public $product_name;
    public $price_id;
    public $amount;
    public $currency;
    public $is_active = true;
    public $maker_id ; // Auth::user()->id

    public function __construct(){
        Stripe::setApiKey(env('STRIPE_SECRET'));
    }

    protected function rules(){
        return [
            'product_id' => [
                'required',
                'string',
                'regex:/^prod_.*/',
                $this->isEditMode ?
                    Rule::unique('stripe_pricing', 'product_id')->ignore($this->product_id, 'product_id') :
                    'unique:stripe_pricing,product_id'
            ],
            'product_name' => 'required|string',
            'price_id' => [
                'required',
                'string',
                'regex:/^price_.*/',
                $this->isEditMode ?
                    Rule::unique('stripe_pricing', 'price_id')->ignore($this->product_id, 'product_id') :
                    'unique:stripe_pricing,price_id'
            ],
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'is_active' => 'required|boolean',
        ];
    }

    public function resetFields(){
        $this->reset(['product_id', 'product_name', 'price_id', 'amount', 'currency']);
        $this->is_active = true;
        $this->isEditMode = false;
    }

    public function openCreateModal(){
        $this->resetFields();

        $this->isEditMode = false;

        $this->dispatch('show-modal');
    }

    public function openEditModal($id){
        $pricing = StripePricing::findOrFail($id);

        $this->product_id = $pricing->product_id;
        $this->product_name = $pricing->product_name;
        $this->price_id = $pricing->price_id;
        $this->amount = $pricing->amount;
        $this->currency = $pricing->currency;
        $this->is_active = $pricing->is_active;

        $this->isEditMode = true;

        $this->dispatch('show-modal');
    }

    public function openDeleteModal($id){
        $pricing = StripePricing::findOrFail($id);

        $this->product_id = $pricing->product_id;
        $this->product_name = $pricing->product_name;

        $this->dispatch('open-delete-modal');
    }

    // CRUD
    public function save(){

        try {
            $this->validate();
        } catch (\Throwable $th) {
            $this->sweetToastError($th->getMessage());
            return;
        }

        $product = Product::retrieve($this->product_id);
        if(empty($product)){
            $this->sweetToastError('Product or Price not found in Stripe.');
        }

        if($this->isEditMode){
            // UPDATE
            $pricing = StripePricing::where('product_id', $this->product_id)->first();
            $pricing->update([
                'product_id' => $this->product_id,
                'product_name' => $this->product_name,
                'amount' => $this->amount,
                'currency' => $this->currency,
                'is_active' => $this->is_active,
            ]);
            $this->sweetToastSuccess('Pricing updated successfully!' . $this->product_name);
        } else {
            // CREATE
            StripePricing::create([
                'product_id' => $this->product_id,
                'product_name' => $this->product_name,
                'price_id' => $this->price_id,
                'amount' => $this->amount,
                'currency' => $this->currency,
                'is_active' => $this->is_active,
                'maker_id' => Auth::user()->id,
            ]);
            $this->sweetToastSuccess('Pricing Created successfully!' . $this->product_name);
        }

        $this->reset(['product_id', 'product_name', 'price_id', 'amount', 'currency', 'is_active']);
        $this->dispatch('close-modal');
    }

    public function delete(){
        StripePricing::where('product_id', $this->product_id)->delete();
        $this->sweetToastSuccess('Pricing deleted successfully!');
        $this->dispatch('close-delete-modal');
        $this->resetFields();
    }

    // RENDER
    public function checkProduct(){
        try {
            $product = Product::retrieve($this->product_id);

            try{
                $price = Price::retrieve($product->default_price);
            }catch(\Exception $e){
                $this->sweetToastError('No Price ID Found. Please set default price for this product in Stripe.');
                return;
            }
            $this->product_id = $product->id;
            $this->product_name = $product->name;
            $this->price_id = $product->default_price;
            $this->amount = $price->unit_amount / 100;
            $this->currency = strtoupper($price->currency);
            $this->sweetToastSuccess('1 Product found!');
        } catch (\Throwable $th) {
            $this->sweetToastError('Product not found. Please check your Stripe.');
        }
    }

    public function FetchPricing(){
        return StripePricing::Search($this->search)
            ->orderBy('id', 'ASC')
            ->get();
    }

    public function render()
    {
        return view('livewire.service-subscription.pricing',[
            'pricings' => $this->FetchPricing()
        ]);
    }
}