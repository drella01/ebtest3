<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticController extends Controller
{
    public function news()
    {
        return view('news.240312news');
    }

    public function about()
    {
        return view('politics.about');
    }

    public function payments()
    {
        return view('politics.payments');
    }

    public function shipments()
    {
        return view('politics.shipments');
    }

    public function return()
    {
        return view('politics.return');
    }
}
