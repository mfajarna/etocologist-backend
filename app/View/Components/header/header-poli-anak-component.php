<?php

namespace App\View\Components\header;

use Illuminate\View\Component;

class header-poli-anak-component extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.header-poli-anak-component');
    }
}
