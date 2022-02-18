<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type; // types: default - important

    public $level; // levels: success - info - warning - danger

    public $message;

    public $subtitle;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $type = 'default', string $level, string $message, string $subtitle = null)
    {
        $this->type = $type;
        $this->level = $level;
        $this->message = $message;
        $this->subtitle = $subtitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
