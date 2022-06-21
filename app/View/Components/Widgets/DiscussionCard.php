<?php

namespace App\View\Components\Widgets;

use App\Models\Discuss;
use Illuminate\View\Component;

class DiscussionCard extends Component
{
    public $discuss;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Discuss $discuss)
    {
        $this->discuss = $discuss;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widgets.discussion-card');
    }
}
