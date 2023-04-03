<?php

namespace App\Http\Livewire\Front\Page;

use App\Models\ContactUs;
use Livewire\Component;
use Google\Recaptcha\V3\ReCaptcha;
class ContactusForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public $recaptcha;

    public function updatedRecaptcha($value)
    {
        $this->validate([
            'recaptcha' => new ReCaptcha(config('services.recaptcha.secret_key'))
        ]);
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);


        $enquiry = new ContactUs();
        $enquiry->name = $this->name;
        $enquiry->email = $this->email;
        $enquiry->phone = $this->phone;
        $enquiry->subject = $this->subject;
        $enquiry->message = $this->message;
        $enquiry->save();

        session()->flash('success', 'Form submitted successfully!');
        $this->resetForm();
        $this->dispatchBrowserEvent('show-success-popup');
        // Send the form data
    }
    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->subject = '';
        $this->message = '';

        $this->resetValidation();
        $this->resetErrorBag();
    
      
    }
    public function render()
    {
        return view('livewire.front.page.contactus-form');
    }
}
