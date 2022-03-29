<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use App\Models\Contact;
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
        $contact = Contact::orderBy('id','asc')->paginate(5);
        return view('components.admin.header',compact('contact'));
    }
}
