<?php

namespace App\Http\Livewire\Purchase;

use Livewire\Component;
use App\Models\Provider;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
class Create extends Component
{
    public $providers, $provider;
    public $invoice_code, $observation;
    public $search;

    public function mount(){
        $this->providers=Provider::all();
    }
    public function render(){

        if(strlen($this->search)>0){
            $products=Product::where('status','ACTIVE')
            ->where('name', 'like','%'.$this->search.'%')
            ->orWhere('id','like','%'.$this->search.'%')
            ->orWhere('code','like','%'.$this->search.'%')
            ->get();
        }else {
            $products=[];
        }
        //dd($products);
        $cart_content=Cart::getContent()->sortBy('name');//dd($cart_content);
        $total=Cart::getTotal();
        $items_count=Cart::getTotalQuantity();
        return view('livewire.purchase.create',compact('cart_content',
        'total','products','items_count'));
    }
    public function removeItem($remove_id){
        Cart::remove($remove_id);
    }
    public function updateQuantity($item_id, $quantity=1){
        $product=Product::find($item_id);
        Cart::remove($item_id);
        if($quantity>0){
            Cart::remove($item_id);
            Cart::add($product->id,$product->name,
            $product->purchase_price,$quantity, array());
        }else{
            Cart::remmove($item_id);
        }
    }
    public function addTocart($checked,$product_id){
        $product=Product::find($product_id);dd($product_id);
        Cart::add($product->id,$product->name,$product->purchase_price,1,array());
        if($checked){
            Cart::add($product->id,$product->name,
            $product->purchase_price,1,array());
        }else{
            Cart::remove($product_id);
        }
    }
    public function resetSearch(){
        $this->search='';
    }
    public function updatedSearch($search){

        $this->emit('search', $search);
    }
}


