<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;
use App\Models\Paper;
use App\Models\Chapter;
use Livewire\WithPagination;

class Questions extends Component
{
    use WithPagination;

    public $search, $paper, $chapter_id, $difficulty_level, $type, $selectedRows = [];

    public function mount($paper)
    {
        $this->paper = $paper;
    }

    public function render()
    {
        $query = Question::query();

        //    if($this->paper->term_id==3){
        //     $query->where(['subject_id'=>$this->paper->subject_id,'class_id'=>$this->paper->class_id]);
        //    }
        $query->where(['subject_id' => $this->paper->subject_id, 'class_id' => $this->paper->class_id]);
        $query->when(!empty($this->search) == true, function ($q) {
            return $q->where('question', 'like', '%' . $this->search . '%');
        });

        $query->when($this->paper->term_id != 3, function ($q) {
            return $q->where('term_id', $this->paper->term_id);
        });
        $query->when(!empty($this->type) == true, function ($q) {
            return $q->Where('type', $this->type);
        });

        $query->when(!empty($this->chapter_id) == true, function ($q) {
            return $q->Where('chapter_id', $this->chapter_id);
        });
        $query->when(!empty($this->chapter_id) == true, function ($q) {
            return $q->Where('chapter_id', $this->chapter_id);
        });
        $query->when(!empty($this->difficulty_level) == true, function ($q) {
            return $q->Where('difficulty_level', $this->difficulty_level);
        });
        $questions = $query->paginate(5);
        $chapter = Chapter::get();
        $selectedRowCount = count($this->selectedRows);

        return view('livewire.questions', [
            'chapter' => $chapter, 'questions' => $questions, 'selectedRows' => $this->selectedRows, 'selectedRowCount' => count($this->selectedRows),
        ]);
    }
}
