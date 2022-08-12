<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;

class CartNotification extends Component
{
  
    protected $listeners  = ['updateCart' => 'render'];

    public function removeFromCart($cartId){
        Cart::where('id','=',$cartId)->delete();
        $this->emit('removeFromCart');
    }

    public function render()
    {
        return view('livewire.cart-notification',[
            'carts' => Cart::where('user_id','=',auth()->user()->id)->get(),
            'itemCartCount' => Cart::where('user_id','=',auth()->user()->id)->count(),
        ]);
    }
}
