<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Post as PostModel;

class Post extends Component
{
    #[Layout('components.layouts.app')]

    public $id;
    public $post;

    public function mount($id)
    {
        $this->id = $id;
        $this->post = PostModel::find($this->id);
    }

    public function render()
    {
        return view('livewire.post');
    }
}
