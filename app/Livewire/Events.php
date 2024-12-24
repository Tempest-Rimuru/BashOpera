<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\AgeRestriction;
use App\Models\Event;
use Illuminate\Support\Carbon;

class Events extends Component
{
    #[Layout('components.layouts.app')]

    public $events;
    public $age_restrictions;
    public $hideButton;
    private $totalEventsLoaded = 3;

    public function mount()
    {
        $this->age_restrictions = AgeRestriction::all();
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $this->events = Event::limit($this->totalEventsLoaded)->get();
        $this->formatEvents();
        $this->checkHideButton();
    }

    public function addEvents()
    {
        $this->totalEventsLoaded += 3;

        $this->events = Event::limit($this->totalEventsLoaded)->get();
        $this->formatEvents();
        $this->checkHideButton();
    }

    private function formatEvents()
    {
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

    private function checkHideButton()
    {
        $totalEvents = Event::count();

        $this->hideButton = $this->events->count() >= $totalEvents;
    }

    public function goToEvent($eventId)
    {
        return redirect()->route('event', ['id' => $eventId]);
    }

    public function render()
    {
        return view('livewire.events');
    }
}
