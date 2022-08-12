<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Annonce;
use App\Models\Annoncedispo;
use App\Models\Demande;
use App\Models\Cart;

class RentBtn extends Component
{   
    public $article;
    public $confirmingRent;
    public $dispoDate;
    protected $listeners  = ['removeFromCart' => 'render'];

    public function confirmingRent(){
        $this->confirmingRent = true;
    }

    public function rentNow(){
        
        $annoncedispo_id =$this->article->annoncedispo->where('day','=',"$this->dispoDate");
        foreach ($annoncedispo_id as $id) {
            $annonceDispoId = $id->id;
        }

        Demande::create([
            'annoncedispo_id' => $annonceDispoId,
            'user_id' => auth()->user()->id,
            'reservation_date' =>  date("Y-m-d", strtotime('next '.$this->dispoDate)),
            'reservation_day' => $this->dispoDate,
        ]);

        Annoncedispo::where([
                ['annonce_id','=',$this->article->id],
                ['day','=',$this->dispoDate]
            ])->update(['stat' => '0']);

        session()->flash('message', 'Your order has been saved succesully. wait for the response from the car owner');
    
        $this->confirmingRent = false;
    }

    public function addToCart(){
        Cart::create([
            'annonce_id' => $this->article->id,
            'user_id' => auth()->user()->id,
        ]);
        
        $this->emit('updateCart');
        session()->flash('message', 'The item is added successfully to your cart');
        
    }

    public function render()
    {
        return view('livewire.rent-btn',[
            'annonce' => Annonce::findOrFail($this->article->id),
            'countDateDispo' => Annoncedispo::where([
                ['annonce_id','=',$this->article->id],
                ['stat','=',1]
            ])->count(),
            'annoncedispo' => Annoncedispo::where([
                ['annonce_id','=',$this->article->id],
            ])->get(),
            'addedCart' => Cart::where([
                ['annonce_id','=',$this->article->id],
                ['user_id','=',auth()->user()->id],
            ])->count(),
        ]);
    }
}
