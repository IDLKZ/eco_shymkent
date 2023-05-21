<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarNavlink extends Component
{
    public string $route;
    public string $icon;
    public string $routeName;

    /**
     * Create a new component instance.
     */
    public function __construct(string $route, string $icon,string $routeName)
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->routeName = $routeName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-navlink');
    }
}
