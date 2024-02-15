<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;

class Todolist extends Component
{
    public $title = '';
    public $idnya = 0;
    public $isEdit = false;
    public $search = '';


    public function save()
    {
        $this->validate([
            'title' => 'required'
        ]);
        if ($this->idnya != 0) {
            Todo::find($this->idnya)->update(['title' => $this->title]);
        } else {
            Todo::create([
                'title' => $this->title
            ]);
        }
        $this->reset();
    }

    public function edit($id)
    {
        $this->title = Todo::find($id)->title;
        $this->idnya = Todo::find($id)->id;
        $this->isEdit = true;
    }

    public function delete($id)
    {
        Todo::find($id)->delete();
    }
    public function render()
    {
        if ($this->isEdit == true) {
            if ($this->title == '') {
                $this->reset();
            }
        }
        return view('livewire.todolist', [
            'items' =>   $this->search == '' ? Todo::all():
                Todo::where('title','like', '%'.$this->search.'%')->get()
        ]);
    }
}