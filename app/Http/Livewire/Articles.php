<?php

namespace App\Http\Livewire;

use App\Models\Annonce;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;
    protected $annonce;

    public function mount()
    {
        $whereArray['annoncedispos.stat']  = 1;
        $this->annonce = Annonce::orderBy('created_at', 'desc')
        ->join('annoncedispos', 'annonces.id', '=', 'annoncedispos.annonce_id')
        ->distinct('annonces.id')
        ->select('annonces.*')
        ->where($whereArray)
        ->paginate(6);
    }



    
    public function search($formData)
    {
       
        foreach ($formData as $key => $column) {
            if ($key = "date") {
                $day = date('l', strtotime($formData['date']));
                $whereArray['day']  = $day;
            } else {
                if ($column != "")
                    $whereArray[$key]  = $column;
            }

        }
        $whereArray['annoncedispos.stat']  = 1;



        $this->annonce = Annonce::orderBy('created_at', 'desc')
            ->join('annoncedispos', 'annonces.id', '=', 'annoncedispos.annonce_id')
            ->distinct('annonces.id')
            ->select('annonces.*')
            ->where($whereArray)
            ->paginate(6);
    }

    public function resetForm()
    {
        $whereArray['annoncedispos.stat']  = 1;
        $this->annonce = Annonce::orderBy('created_at', 'desc')
        ->join('annoncedispos', 'annonces.id', '=', 'annoncedispos.annonce_id')
        ->distinct('annonces.id')
        ->select('annonces.*')
        ->where($whereArray)
        ->paginate(6);
    }
    


    public function render()
    {



        if( $this->annonce == null)
         $this->mount();

        $viewArray['cityOptions'] = Annonce::distinct("city")->get();
        $viewArray['carModelOptions'] = Annonce::distinct("car_model")->get();
        $viewArray['annonces'] = $this->annonce;
        
        return view('livewire.articles', $viewArray);
       
    }
}
