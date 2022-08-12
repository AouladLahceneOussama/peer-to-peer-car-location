<?php

namespace App\Http\Livewire;

use App\Mail\contactMail;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
class ContactUs extends Component
{
    public function contactUs($formData)
    {
      Mail::to('ayatanssaien@gmail.com')->send(new contactMail($formData));
      session()->flash('message', 'Email sent succefully');
    }
    public function render()
    {
        return view('livewire.contact-us');
    }
}
