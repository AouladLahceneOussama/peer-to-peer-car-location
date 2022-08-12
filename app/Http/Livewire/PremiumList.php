<?php

namespace App\Http\Livewire;

use App\Models\Annonce;
use Livewire\Component;
use App\Models\Cart;
class PremiumList extends Component
{


    public function render()
    {
        return view(
            'livewire.premium-list',
            [
                'premiums'=>Annonce::all()->where('premium', '=', 'on'),
            ]
        );
    }
}
