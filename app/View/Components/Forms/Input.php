<?php

namespace App\View\Components\Forms;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $user;
    public function __construct($user)
    {
        return $this->user = $user;
    }

    public function render(): View|Closure|string
    {
        return view('components.forms.input');
    }
}
