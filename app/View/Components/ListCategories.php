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

    /**
     * The user's categories.
     *
     * @var Collection
     */
    public $categories;
    /**
     * CSS classes for category indicators.
     *
     * @var array
     */
    public $categoryInClass = [
        "note-personal" => "g-dot-primary",
        "note-social" => "g-dot-success",
        "note-important" => "g-dot-danger",
        "note-work" => "g-dot-warning",
    ];
    public function __construct()
    {
        $this->categories = Auth::user()->categories()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.list-categories');
    }
}
