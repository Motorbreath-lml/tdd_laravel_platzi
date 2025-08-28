<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        // Fetch the last repositorie
        $repositories = \App\Models\Repository::latest()->get();

        return view('home', compact('repositories'));
    }   
}
