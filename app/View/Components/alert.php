<?php

namespace App\View\Components;

use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\This;

class alert extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public function __construct($type = null)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
