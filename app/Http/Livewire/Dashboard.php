<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $sortField = 'school_id';
    public $sortAsc = true;
    public $search = '';
    public $changeStatus = '';

    public function changeStatus($status)
    {
        $this->changeStatus = $status;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        $students = Student::search($this->search)->Where('status', $this->changeStatus)->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(50);

        return view('livewire.dashboard',[
            'students' => $students
        ]);
    }
}
