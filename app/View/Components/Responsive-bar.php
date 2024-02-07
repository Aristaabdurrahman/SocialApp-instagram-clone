<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Responsive-bar extends Component
{
    public $user;
    public function __construct($user)
    {
        return $this->user = $user;
    }

    public function render(): View|Closure|string
    {
        return view('components.responsive-bar');
    }
}
