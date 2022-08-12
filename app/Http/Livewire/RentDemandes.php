<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Demande;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailMail;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class RentDemandes extends Component
{
    use WithPagination;
    
    public function refuseDemande($idDemande)
    {
        $demande = Demande::findOrFail($idDemande);
        //update state demande where id
        $demande->update(['state' => 'refused']);

        //update stat annonceDispo where id_annonce ==  and day ==
        $demande->annoncedispo->update(['stat' => "1"]);

        //notification : id_client  :
        Notification::create([
            'demande_id' => $idDemande,
            'message' => 'your request has been refused.',
        ]);

        $this->emit('demandeTraited', $demande->user->id);
    }



    public function sendEmail($data)
    {
        Mail::to($data['EmailTo'])->send(new MailMail($data));
    }


    public function acceptDemande($idDemande)
    {
        $demande = Demande::findOrFail($idDemande);
        //update state demande where id
        $demande->update(['state' => 'accepted']);

        //notification : id_client  : 
        Notification::create([
            'demande_id' => $idDemande,
            'message' => 'your request has been accepted.',
        ]);


        //send client's informations to partner.
        $data = [
            'EmailTo' => $demande->annoncedispo->annonce->user->email,
            'demandeOwner' => $demande->user,
            'title' => "Client Personal Information",
            'message' => "Below you will find all informations about ",
        ];

        $this->sendEmail($data);

        $this->emit('demandeTraited');
    }
    public function render()
    {

        $demandes = Demande::join('annoncedispos', 'demandes.annoncedispo_id', '=', 'annoncedispos.id')
        ->join('annonces', 'annonces.id', '=', 'annoncedispos.annonce_id')
        ->select('demandes.*')
        ->where([
            ['annonces.user_id','=',auth()->user()->id],
            ['state', '=', 'pending'],    
        ])->paginate(3);

        return view('livewire.rent-demandes', [
            'demandes' => $demandes,
        ]);
    }
}
