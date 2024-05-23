<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ListCategories extends Component
{
    /**
     * Create a new component instance.
     */

    public $CategoryinClass;
    public $categories;
    public function __construct()
    {
        $this->categories = Auth::user()->categories()->get();
        $this->CategoryinClass = [
            "note-personal" => "g-dot-primary",
            "note-social" => "g-dot-success",
            "note-important" => "g-dot-danger",
            "note-work" => "g-dot-warning"
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.list-categories');
    }
}
