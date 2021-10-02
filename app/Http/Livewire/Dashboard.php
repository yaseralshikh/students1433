<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;

class Dashboard extends Component
{
    use WithPagination;

    public $sortField = 'school_id';
    public $sortAsc = true;
    public $search = '';
    public $changeStatus= '';

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

    public function export()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }

    public function render()
    {
        $students = Student::search($this->search)->Where('status', 'like','%'.$this->changeStatus.'%')->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(50);

        return view('livewire.dashboard',[
            'students' => $students
        ]);
    }
}
