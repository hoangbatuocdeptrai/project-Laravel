<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;
use App\Models\Cart;
class header extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $cart = new Cart();
        return view('components.home.header',compact('cart'));
    }
}
