<?php

namespace App\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $listeners = ['refresh' => 'refresh'];
    public $newComment;
    public $image;

    public function updated($field) {
        $this->validateOnly($field, [
            'newComment' => 'max:255'
        ]);
    }
    
    public function addComment() {
        $this->validate(['newComment' => 'required|max:255']);

        Comment::create([
            'body' => $this->newComment,
            'user_id' => 1
        ]);

        // $this->dispatch('refresh');
        session()->flash('message', 'comment added successfully');
    }

    public function removeComment($id) {
        Comment::find($id)->delete();
        // $this->dispatch('refresh');

        session()->flash('message', 'comment deleted successfully');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->simplePaginate(2)
        ]);
    }
}
