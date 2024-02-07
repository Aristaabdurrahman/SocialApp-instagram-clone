<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Comment-detail extends Component
{
    public $posts;
    public function __construct($posts)
    {
        return $this->posts = $posts;
    }

    public function render(): View|Closure|string
    {
        return view('components.comment-detail');
    }
}
