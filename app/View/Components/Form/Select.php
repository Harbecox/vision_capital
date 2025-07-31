<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name = "",
        public string $label = "",
        public array $options = [],
        public bool|null $required = null,
        public string $id = "",
        public int $col = 8,
        public int $offset = 2,
        public string $classes = ""
    )
    {
        $this->id = "select_".$this->name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
