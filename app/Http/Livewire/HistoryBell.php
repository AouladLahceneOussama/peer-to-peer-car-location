<?php

namespace App\Http\Livewire;
use App\Models\Demande;
use Livewire\Component;

class HistoryBell extends Component
{
    public function render()
    {
        {
            $demandes = Demande::where(['user_id' => auth()->user()->id])->get();
            return view('livewire.history-bell',[
                'demandes' => $demandes,
            ]);
        }
    }
}
