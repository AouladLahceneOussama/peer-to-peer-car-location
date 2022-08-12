<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Annonce;
use App\Models\Annoncedispo;
use Livewire\WithFileUploads;
use App\Models\feedbackArticle;

class PartnerAnnonce extends Component
{
    public $annonceToEdit;
    public $imagenes = [];
    public $annonceToEdit2;
    public $editAnnonce;
    public $dispo_annonce;
    use WithFileUploads;

    public function editAnnonce($id)
    {
        $this->editAnnonce = true;
        $this->annonceToEdit = Annonce::findOrFail($id);
        //dd($this->annonceToEdit->annoncedispo);

    }

    function statut($id, $stat)
    {

        if ($stat == 0) {
            Annonce::where('id', '=', $id)->update(['stat' => 1]);

            return redirect()->back()->with('message1', 'Annonce modifié avec succès');
        } else {
            Annonce::where('id', '=', $id)->update(['stat' => 0]);
            return redirect()->back()->with('message1', 'Annonce modifié avec succès');
        }
    }

    public function edit($formData, $id)
    {

        //dd($formData['image']);

        if (isset($formData['premium'])) {

            Annonce::where('id', '=', $id)->update([
                'title' => $formData['title'], 'description' => $formData['desc'], 'car_model' => $formData['carModel'], 'city' => $formData['city'], 'color' => $formData['color'], 'price' => $formData['price'],
                'premium' => $formData['premium'], 'premium_duration' => $formData['days']
            ]);
        } else {
            Annonce::where('id', '=', $id)->update([
                'title' => $formData['title'], 'description' => $formData['desc'], 'car_model' => $formData['carModel'], 'city' => $formData['city'], 'color' => $formData['color'], 'price' => $formData['price'],
                'premium' => 'off', 'premium_duration' => 0
            ]);
        }
        if (isset($formData['monday'])) {
            Annoncedispo::updateOrCreate(
                ['annonce_id' => $id, 'day' => 'monday'],
                ['annonce_id' => $id, 'day' => 'monday', 'from' => $formData['time1'], 'to' => $formData['time2']],
            );
        } else {
            Annoncedispo::where(['annonce_id' => $id, 'day' => 'monday'])->delete();
        }

        if (isset($formData['tuesday'])) {
            Annoncedispo::updateOrCreate(
                ['annonce_id' => $id, 'day' => 'tuesday'],
                ['annonce_id' => $id, 'day' => 'tuesday', 'from' => $formData['time3'], 'to' => $formData['time4']],
            );
        } else {
            Annoncedispo::where(['annonce_id' => $id, 'day' => 'tuesday'])->delete();
        }

        if (isset($formData['wednesday'])) {
            Annoncedispo::updateOrCreate(
                ['annonce_id' => $id, 'day' => 'wednesday'],
                ['annonce_id' => $id, 'day' => 'wednesday', 'from' => $formData['time5'], 'to' => $formData['time6']],
            );
        } else {
            Annoncedispo::where(['annonce_id' => $id, 'day' => 'wednesday'])->delete();
        }
        if (isset($formData['thursday'])) {
            Annoncedispo::updateOrCreate(
                ['annonce_id' => $id, 'day' => 'thursday'],
                ['annonce_id' => $id, 'day' => 'thursday', 'from' => $formData['time7'], 'to' => $formData['time8']],
            );
        } else {
            Annoncedispo::where(['annonce_id' => $id, 'day' => 'thursday'])->delete();
        }

        if (isset($formData['friday'])) {
            Annoncedispo::updateOrCreate(
                ['annonce_id' => $id, 'day' => 'friday'],
                ['annonce_id' => $id, 'day' => 'friday', 'from' => $formData['time9'], 'to' => $formData['time10']],
            );
        } else {
            Annoncedispo::where(['annonce_id' => $id, 'day' => 'friday'])->delete();
        }

        if (isset($formData['saturday'])) {
            Annoncedispo::updateOrCreate(
                ['annonce_id' => $id, 'day' => 'saturday'],
                ['annonce_id' => $id, 'day' => 'saturday', 'from' => $formData['time11'], 'to' => $formData['time12']],
            );
        } else {
            Annoncedispo::where(['annonce_id' => $id, 'day' => 'saturday'])->delete();
        }

        if (isset($formData['sunday'])) {
            Annoncedispo::updateOrCreate(
                ['annonce_id' => $id, 'day' => 'sunday'],
                ['annonce_id' => $id, 'day' => 'sunday', 'from' => $formData['time13'], 'to' => $formData['time14']],
            );
        } else {
            Annoncedispo::where(['annonce_id' => $id, 'day' => 'sunday'])->delete();
        }
        if (isset($this->imagenes[0]) && isset($this->imagenes[1]) && isset($this->imagenes[2])) {

            $this->imagenes[0]->store('carsImages', ['disk' => 'storage']);
            $this->imagenes[1]->store('carsImages', ['disk' => 'storage']);
            $this->imagenes[2]->store('carsImages', ['disk' => 'storage']);

            Annonce::where('id', '=', $id)->update(['image1' => '/storage/carsImages/' . $this->imagenes[0]->hashName(), 'image2' => '/storage/carsImages/' . $this->imagenes[1]->hashName(), 'image3' => '/storage/carsImages/' . $this->imagenes[2]->hashName()]);
        }


        if (isset($this->imagenes[0]) && isset($this->imagenes[1]) && !isset($this->imagenes[2])) {
            $this->imagenes[0]->store('carsImages', ['disk' => 'storage']);
            $this->imagenes[1]->store('carsImages', ['disk' => 'storage']);
            Annonce::where('id', '=', $id)->update(['image1' => '/storage/carsImages/' . $this->imagenes[0]->hashName(), 'image2' => '/storage/carsImages/' . $this->imagenes[1]->hashName()]);
        }

        if (isset($this->imagenes[0]) && !isset($this->imagenes[1]) && !isset($this->imagenes[2])) {
            $this->imagenes[0]->store('carsImages', ['disk' => 'storage']);
            Annonce::where('id', '=', $id)->update(['image1' => '/storage/carsImages/' . $this->imagenes[0]->hashName()]);
        }


        $this->editAnnonce = false;

        return redirect()->back()->with('message1', 'Annonce Modifiée avec succès');
    }

    public function delete($id)
    {
        feedbackArticle::where('annonce_id', '=', $id)->delete();
        Annoncedispo::where('annonce_id', '=', $id)->delete();
        Annonce::where('id', '=', $id)->delete();
        return redirect()->back()->with('message1', 'Annonce supprimée avec succès');
    }

    public function render()
    {
        return view('livewire.partner-annonce', ['article' => Annonce::where('user_id', '=', auth()->user()->id)->get()]);
    }
}
