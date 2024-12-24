<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Http\Request;


class ModalTheater extends Component
{
    public $activeLink = 'theater-history';

    public function setActiveLink($linkId)
    {
        $this->activeLink = $linkId;
    }

    public function mount(Request $request)
    {
        if ($request->query('activeLink')) {
            $this->activeLink = $request->query('activeLink');
        }
    }

    public function render()
    {
        return view('livewire.modal-theater');
    }
}
