<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Event;
use App\Models\AgeRestriction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class Poster extends Component
{
    #[Layout('components.layouts.app')]

    public $events;
    public $age_restrictions;

    public $title;
    public $subtitle;
    public $duration;
    public $id_age_restriction;
    public $description;
    public $team;
    public $image;
    public $show_date;

    public function mount()
    {
        $this->events = Event::all();
        $this->age_restrictions = AgeRestriction::all();
    }

    public $event_id = null;

    public function createNew()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'duration' => 'required|date_format:H:i',
            'id_age_restriction' => 'required|exists:age_restrictions,id',
            'description' => 'required|string',
            'team' => 'required|string',
            'image' => 'required|string|max:255',
            'show_date' => 'required|date|date_format:Y-m-d\TH:i',
        ]);

        if (!empty($this->show_date)) {
            $this->show_date = Carbon::createFromFormat('Y-m-d\TH:i', $this->show_date)->format('Y-m-d H:i:s');
        }

        if ($this->event_id) {
            $event = Event::find($this->event_id);
            if ($event) {
                $event->update([
                    'title' => $this->title,
                    'subtitle' => $this->subtitle,
                    'duration' => $this->duration,
                    'id_age_restriction' => $this->id_age_restriction,
                    'description' => $this->description,
                    'team' => $this->team,
                    'image' => $this->image,
                    'show_date' => $this->show_date,
                ]);
            }
        } else {
            Event::create([
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'duration' => $this->duration,
                'id_age_restriction' => $this->id_age_restriction,
                'description' => $this->description,
                'team' => $this->team,
                'image' => $this->image,
                'show_date' => $this->show_date,
            ]);
        }

        session()->flash('success', $this->event_id ? 'Мероприятие успешно обновлено!' : 'Мероприятие успешно добавлено!');
        $this->reset(['title', 'subtitle', 'duration', 'id_age_restriction', 'description', 'team', 'image', 'show_date', 'event_id']);
        return redirect()->route('admin.poster');
    }

    public function editEvent($eventId)
    {
        $event = Event::find($eventId);

        if ($event) {
            $this->event_id = $event->id;
            $this->title = $event->title;
            $this->subtitle = $event->subtitle;
            $this->duration = Carbon::parse($event->duration)->format('H:i');
            $this->id_age_restriction = $event->id_age_restriction;
            $this->description = $event->description;
            $this->team = $event->team;
            $this->image = $event->image;
            $this->show_date = Carbon::parse($event->show_date)->format('Y-m-d\TH:i');
        }
    }

    public function deleteEvent()
    {
        if ($this->event_id) {
            $event = Event::find($this->event_id);
            if ($event) {
                $event->delete();
                return redirect()->route('admin.poster')->with('success', 'Мероприятие успешно удалено!');
            }
        } else {
            return redirect()->route('admin.poster')->with('success', 'Выберите мероприятие для удаления!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Вы вышли из аккаунта');
    }

    public function render()
    {
        return view('livewire.admin.poster');
    }
}
