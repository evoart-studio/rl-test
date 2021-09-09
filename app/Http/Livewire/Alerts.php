<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alerts extends Component
{
    public string $type = "";
    public string $message = "";

    protected $listeners = [
        'alert'
    ];

    public function alert($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.alerts');
    }
}
