<?php

namespace App\View\Components;

use Illuminate\View\Component;

class userTolles extends Component
{
    public $movieDitaels;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($movieDitaels)
    {
        //
        $this->movieDitaels = $movieDitaels;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-tolles');
    }
}
