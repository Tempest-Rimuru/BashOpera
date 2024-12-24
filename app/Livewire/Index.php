<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\Event;
use App\Models\AgeRestriction;
use App\Models\Post;
use Carbon\Carbon;

class Index extends Component
{
    #[Layout('components.layouts.app')]

    public $events;
    public $posts;
    public $age_restrictions;

    public function mount()
    {
        $this->age_restrictions = AgeRestriction::all();
        $this->events = Event::limit(3)->get();
        $this->posts = Post::limit(4)->get();

        foreach ($this->events as $event) {
            $event->show_date = Carbon::parse($event->show_date)->format('d F, H:i');

            if ($this->age_restrictions->isNotEmpty()) {
                $restriction = $this->age_restrictions->firstWhere('id', $event->id_age_restriction);

                if ($restriction) {
                    $event->id_age_restriction = $restriction->tvalue;
                }
            }
        }
    }

    public function redirectToEvent($eventId)
    {
        return redirect()->route('event', ['id' => $eventId]);
    }

    public function render()
    {
        return view('livewire.index', [
            'posts' => $this->posts,
            'events' => $this->events,
            'age_restrictions' => $this->age_restrictions,
        ]);
    }
}
