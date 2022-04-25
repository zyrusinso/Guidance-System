<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\StudProfile;
use App\Models\Complain;

use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AddComplainComponent extends Component
{
    public $searchStudentForm = false;
    public $registerStudForm = false;
    public $registeredStudDropDown = false;
    
    public $complainType;
    public $studNum;
    public $studentSearchNum;

    public $studNumForm;
    public $studFNameForm;
    public $studLNameForm;
    public $studEmailForm;
    public $studPhoneForm;
    public $studAddressForm;
    public $offenseTitleForm;
    public $offenseDescriptionForm;
    
    //Validation Rules
    public function rules(){
        return [
            'studNumForm' => 'required',
            'studFNameForm' => 'required',
            'studLNameForm' => 'required',
            'studEmailForm' => 'required',
            'studPhoneForm' => 'required',
            'studAddressForm' => 'required',
            'offenseTitleForm' => 'required',
            'offenseDescriptionForm' => 'required',
        ];
    }

    protected $messages = [
        'studNumForm.required' => "Student Number is Required!",
        'studFNameForm.required' => "Student First Name is Required!",
        'studLNameForm.required' => "Student Last Name is Required!",
        'studEmailForm.required' => 'Student Email is Required!',
        'studPhoneForm.required' => 'Student Phone Number is Required!',
        'studAddressForm.required' => 'Student Address is Required!',
        'offenseTitleForm.required' => 'Offense Title is Required!',
        'offenseDescriptionForm.required' => 'Offense Description is Required!',
    ];

    public function complainTypeSelection(){
        return [
            '1' => 'Already Registered Student',
            '2' => 'Search for Student Number',
            '3' => 'Custom Complain'
        ];
    }

    public function updatedComplainType($complainType){
        switch($this->complainType){
            case 1: 
                $this->resetExcept(['complainType', 'studNum']);
                $this->resetValidation();
                $this->registeredStudDropDown = true;
                break;
            case 2:
                $this->resetExcept('complainType');
                $this->resetValidation();
                $this->searchStudentForm = true;
                break;
            case 3:
                $this->resetExcept('complainType');
                $this->resetValidation();
                $this->registerStudForm = true;
                break;
            default:
                $this->reset();
                $this->resetValidation();
        }

        return;
    }

    public function createComplainModel(){
        return [
            'stud_num' => $this->studNumForm,
            'stud_name' => $this->studFNameForm.' '.$this->studLNameForm,
            'offense_title' => $this->offenseTitleForm,
            'offense_desc' => $this->offenseDescriptionForm,
        ];
    }

    public function updatedStudNum(){
        if($this->studNum == null){
            $this->resetExcept(['complainType', 'registeredStudDropDown']);
            return false;
        }

        $this->resetExcept(['complainType', 'studNum', 'registeredStudDropDown']);
        $data = StudProfile::where('stud_num', $this->studNum)->first();

        // Set the data got from DB
        $this->studNumForm = $data->stud_num;
        $this->studFNameForm = $data->fname;
        $this->studLNameForm = $data->lname;
        $this->studEmailForm = $data->email;
        $this->studPhoneForm = $data->phone_num;
        $this->studAddressForm = $data->address;

        // Set to open the Form
        $this->registerStudForm = true;
    }

    public function create(){
        $this->validate();

        try {
            DB::beginTransaction();

            Complain::create($this->createComplainModel());
            StudProfile::updateOrCreate(['stud_num' => $this->studNumForm], $this->updateOrCreateStudentModel());
        } catch (Throwable $ex) {

            DB::rollBack();
            Log::critical($ex);
            return response()->json([
                'success' => false,
                'message' => 'System Failed! please contact the developer to fix this problem!', //Activation failed.
            ], 500);
        }
        DB::commit();
        session()->flash('success', 'Complain Successfully Added!');
        $this->reset();
        $this->resetValidation();
    }

    public function updateOrCreateStudentModel(){
        return [
            'stud_num' => $this->studNumForm,
            'fname' => $this->studFNameForm,
            'lname' => $this->studLNameForm,
            'email' => $this->studEmailForm,
            'phone_num' => $this->studPhoneForm,
            'address' => $this->studAddressForm,
        ];
    }

    public function searchStudent(){
        $this->resetValidation();

        $data = StudProfile::where('stud_num', $this->studentSearchNum)->first();

        if(!$data){
            $this->registerStudForm = false;
            return $this->addError('studentSearchNum', 'Invalid Student Number!');
        }

        // Set the data got from DB
        $this->studNumForm = $data->stud_num;
        $this->studFNameForm = $data->fname;
        $this->studLNameForm = $data->lname;
        $this->studEmailForm = $data->email;
        $this->studPhoneForm = $data->phone_num;
        $this->studAddressForm = $data->address;

        // Set to open the Form 
        $this->registerStudForm = true;
    }

    public function render()
    {
        return view('livewire.add-complain-component')->layout('layouts.base');
    }
}

