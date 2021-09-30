<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\School;
use App\Models\Student;

class SchoolDropdown extends Component
{
    public $school_id = '';
    public $sudent_id;
    public $sudent_name;
    public $sudent_school;
    public $sudent_class;
    public $sudent_stage;
    public $sudent_mobile;
    public $sudent_status;
    public $modalFormVisible = false;

    public function changeSchool($value)
    {
        $this->school_id = $value;
    }

    public function showUpdateModal($id){
        $this->modalFormReset();
        $this->modalFormVisible = true;
        $this->sudent_id = $id;
    }

    public function modelData()
    {
        $data = [
            'mobile' => $this->sudent_mobile,
            'status' => 1,
        ];

        return $data;
    }

    public function loadModalData()
    {
        $data = Student::find($this->sudent_id);
        $this->sudent_name = $data->name;
        $this->sudent_school = $data->school->name;
        $this->sudent_class = $data->class;
        $this->sudent_stage = $data->stage;
        $this->sudent_mobile = $data->mobile;
    }

    public function rules()
    {
        return [
            'sudent_mobile' => ['required', 'numeric', 'digits_between:10,12'],
        ];
    }

    public function modalFormReset()
    {
        $this->sudent_mobile = null;
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate();
        $student = Student::where('id', $this->sudent_id)->first();

        $student->update($this->modelData());

        $this->modalFormVisible = false;

        $this->alert('success', 'تم حفظ رقم الهاتف', [
            'position'  =>  'center',
            'timer'  =>  3000,
            'toast'  =>  true,
            'text'  =>  null,
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }

    public function render()
    {
        $schools = School::orderByDesc('name')->get();
        $students = Student::where('school_id', $this->school_id)->orderByDesc('name')->get();

        return view('livewire.school-dropdown',[
            'schools' => $schools,
            'students' => $students
        ]);
    }
}
