<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Post;

class Posts extends Component
{
    #[Layout('components.layouts.app')]
    public $posts;
    private $totalPostsLoaded = 4;
    public $hideButton = false;

    public function mount()
    {
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $this->posts = Post::limit($this->totalPostsLoaded)->get();
        $this->checkHideButton();
    }

    public function addPosts()
    {
        $this->totalPostsLoaded += 4;

        $newPosts = Post::limit($this->totalPostsLoaded)->get();
        $this->posts = $newPosts;

        $this->checkHideButton();
    }

    private function checkHideButton()
    {
        $totalPosts = Post::count();

        $this->hideButton = $this->posts->count() >= $totalPosts;
    }

    public function goToPost($postId)
    {
        return redirect()->route('post', ['id' => $postId]);
    }

    public function render()
    {
        return view('livewire.posts');
    }
}
