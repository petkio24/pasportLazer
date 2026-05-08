<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Specification;
use App\Models\SafetyRule;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function specs()
    {
        return view('specs');
    }

    public function safety()
    {
        return view('safety');
    }

    public function chapters()
    {
        $chapters = Chapter::where('parent_id', 0)->orderBy('order')->get();
        return view('chapters', compact('chapters'));
    }
}
