<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Event as EventModel;
use App\Models\AgeRestriction;

class Event extends Component
{
    #[Layout('components.layouts.app')]

    public $id;
    public $event;
    public $ageRestriction;
    public $activeLink = 'event-about';
    public $modal = false;

    public $team;
    public $conductor;

    public $row;
    public $cell;

    public function mount($id)
    {
        $this->id = $id;
        $this->event = EventModel::find($this->id);
        $this->ageRestriction = AgeRestriction::find($this->event->id_age_restriction);

        $teamMembers = explode(';', $this->event->team);
        $this->conductor = '';

        if (!empty($teamMembers)) {
            $this->conductor = end($teamMembers);
            array_pop($teamMembers);
        }

        $this->team = array_map('trim', $teamMembers);
    }

    public function setActiveLink($linkId)
    {
        $this->activeLink = $linkId;
    }

    public function getCell($row, $cell)
    {
        $this->row = $row;
        $this->cell = $cell;
    }

    public function showModal()
    {
        $this->modal = true;
    }
    public function hideModal()
    {
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.event');
    }
}
