<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class News extends Component
{
    #[Layout('components.layouts.app')]

    public $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }

    public $title;
    public $description;
    public $image;

    public $post_id = null;

    public function createNew()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string',
        ]);

        if ($this->post_id) {
            $post = Post::find($this->post_id);
            if ($post) {
                $post->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'image' => $this->image,
                ]);
            }
        } else {
            Post::create([
                'title' => $this->title,
                'description' => $this->description,
                'image' => $this->image,
            ]);
        }

        session()->flash('success', $this->post_id ? 'Пост успешно обновлен!' : 'Пост успешно добавлен!');
        $this->reset(['title', 'description', 'image', 'post_id']);
        return redirect()->route('admin.news');
    }


    public function editPost($postId)
    {
        $post = Post::find($postId);

        if ($post) {
            $this->post_id = $post->id;
            $this->title = $post->title;
            $this->description = $post->description;
            $this->image = $post->image;
        }
    }

    public function deletePost()
    {
        if ($this->post_id) {
            $post = Post::find($this->post_id);
            if ($post) {
                $post->delete();
                return redirect()->route('admin.news')->with('success', 'Пост успешно удален!');
            }
        } else {
            return redirect()->route('admin.news')->with('success', 'Выберите новость для удаления!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Вы вышли из аккаунта');
    }

    public function render()
    {
        return view('livewire.admin.news');
    }
}
