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
            $lowerQuery = mb_strtolower($query);

            $chapters = Chapter::whereRaw('LOWER(title) LIKE ?', ["%{$lowerQuery}%"])
                ->orWhereRaw('LOWER(content) LIKE ?', ["%{$lowerQuery}%"])
                ->get();

            $faults = Fault::whereRaw('LOWER(description) LIKE ?', ["%{$lowerQuery}%"])
                ->orWhereRaw('LOWER(cause) LIKE ?', ["%{$lowerQuery}%"])
                ->orWhereRaw('LOWER(solution) LIKE ?', ["%{$lowerQuery}%"])
                ->get();
        }

        return view('search', compact('chapters', 'faults', 'query'));
    }
}
