<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Fault;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function global(Request $request)
    {
        $query = $request->get('q');
        $chapters = [];
        $faults = [];

        if ($query) {
            $chapters = Chapter::where('title', 'LIKE', "%{$query}%")
                ->orWhere('content', 'LIKE', "%{$query}%")
                ->get();

            $faults = Fault::where('description', 'LIKE', "%{$query}%")
                ->orWhere('cause', 'LIKE', "%{$query}%")
                ->orWhere('solution', 'LIKE', "%{$query}%")
                ->get();
        }

        return view('search', compact('chapters', 'faults', 'query'));
    }
}
