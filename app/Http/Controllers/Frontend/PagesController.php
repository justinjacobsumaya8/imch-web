<?php

namespace App\Http\Controllers\Frontend;


class PagesController 
{
    public function our_doctors()
    {
        return view('frontend.pages.our-doctors');
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
}
