<?php

namespace App\Http\Livewire\Front\Page;

use App\Models\JobApplicant;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;

class CareerApplyJob extends Component
{

    use WithFileUploads;

    public $fname;
    public $email;
    public $phone;
    public $career_id;
    public $career_title;
    public $cover_letter;
    public $cvfile;
    protected $rules = [
        'fname' => 'required',
        'email' => 'required|email',
        'phone' => 'required|regex:/^\+?\d{8,}$/',
        'cover_letter' => 'required',
        'cvfile' => 'required|mimes:pdf,doc,docx|max:2048',
    ];

    public function mount($career_id, $career_title)
    {
        $this->career_id= $career_id;
        $this->career_title= $career_title;
    }
    public function submitForm()
    {
        $validatedData = $this->validate();
        // Handle form submission here...


        $fileName="";
        $file = $validatedData['cvfile'];

        if ($this->cvfile) {
           
            if ($file->isValid()) {
                $fileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/uploads/resume', $fileName);
            } else {
                session()->flash('error', 'Upload failed!');
            }


        }

        
   
        $jobA = new JobApplicant();
        $jobA->career_id  = $this->career_id;
        $jobA->name = $this->fname;
        $jobA->email = $this->email;
        $jobA->phone = $this->phone;
        $jobA->cover_letter = $this->cover_letter;
        $jobA->resume = $fileName;
        $jobA->save();

        session()->flash('success', 'Form submitted successfully!');
        $this->resetForm();
        $this->reset('cvfile');
        $this->dispatchBrowserEvent('show-success-popup');
    }

    public function resetForm()
    {
        $this->fname = '';
        $this->email = '';
        $this->phone = '';
        $this->cover_letter = '';
        $this->cvfile = null;

        $this->resetValidation();
        $this->resetErrorBag();
    
      
    }



    public function render()
    {
        return view('livewire.front.page.career-apply-job');
    }


    
}
