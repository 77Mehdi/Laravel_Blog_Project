<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    // public string $type;
    // public string $nom;

    // public function __construct(string $type, string $nom ){

    //     // $this->type = $type;
    //     // $this->nom = $nom;
    // }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
