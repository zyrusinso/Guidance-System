<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TeacherComplain;
use App\Models\Teacher;


use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AddTeacherComplain extends Component
{
    public $searchStudentForm = false;
    public $registerStudForm = false;
    public $registeredStudDropDown = false;
    
    public $complainType;
    public $studNum;
    public $studentSearchNum;

    public $teacherName;
    public $offenseTitleForm;
    public $offenseDescriptionForm;
    
    //Validation Rules
    public function rules(){
        return [
            'teacherName' => 'required',
            'offenseTitleForm' => 'required',
            'offenseDescriptionForm' => 'required',
        ];
    }

    protected $messages = [
        'teacherName.required' => "Teacher Name is Required!",
        'offenseTitleForm.required' => 'Offense Title is Required!',
        'offenseDescriptionForm.required' => 'Offense Description is Required!',
    ];

    public function createTeacherComplainModel(){
        return [
            'teacher_name' => $this->teacherName,
            'offense_title' => $this->offenseTitleForm,
            'offense_description' => $this->offenseDescriptionForm,
        ];
    }

    public function create(){
        $this->validate();

        try {
            DB::beginTransaction();

            TeacherComplain::create($this->createTeacherComplainModel());
            Teacher::updateOrCreate(['name' => $this->teacherName], $this->updateOrCreateTeacherModel());
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

    public function updateOrCreateTeacherModel(){
        return [
            'name' => $this->teacherName,
        ];
    }

    public function render()
    {
        return view('livewire.add-teacher-complain')->layout('layouts.base');
    }
}
