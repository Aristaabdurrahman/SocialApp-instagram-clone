<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notifications extends Component
{
    public $notification;
    public function __construct($notification)
    {
        return $this->notification = $notification;
    }

    public function render(): View|Closure|string
    {
        return view('components.notifications');
    }
}
