<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class User-list extends Component
{
    public $user;
    public function __construct($user)
    {
        return $this->user = $user;
    }

    public function render(): View|Closure|string
    {
        return view('components.user-list');
    }
}
