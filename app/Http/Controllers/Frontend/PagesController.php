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

    public function blogs()
    {
        return view('frontend.pages.blogs.index');
    }
    public function our_services()
    {
        return view('frontend.pages.our-services');
    }
}
