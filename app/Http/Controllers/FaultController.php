<?php

namespace App\Http\Controllers;

use App\Models\Fault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaultController extends Controller
{
    public function index(Request $request)
    {
        $query = Fault::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('code', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%")
                ->orWhere('cause', 'LIKE', "%{$search}%")
                ->orWhere('solution', 'LIKE', "%{$search}%");
        }

        // Правильная сортировка: сначала преобразуем code в число для числовых кодов
        // Для кодов вида "10a" оставляем строковую сортировку
        $faults = $query->orderByRaw('CAST(code AS INTEGER) ASC, code ASC')->paginate(15);

        return view('faults.index', compact('faults'));
    }

    public function create()
    {
        return view('faults.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10',
            'description' => 'required|string',
            'cause' => 'required|string',
            'solution' => 'required|string',
        ]);

        Fault::create($validated);

        return redirect()->route('faults.index')->with('success', 'Неисправность добавлена');
    }

    public function edit(Fault $fault)
    {
        return view('faults.edit', compact('fault'));
    }

    public function update(Request $request, Fault $fault)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:10',
            'description' => 'required|string',
            'cause' => 'required|string',
            'solution' => 'required|string',
        ]);

        $fault->update($validated);

        return redirect()->route('faults.index')->with('success', 'Неисправность обновлена');
    }

    public function destroy(Fault $fault)
    {
        $fault->delete();
        return redirect()->route('faults.index')->with('success', 'Неисправность удалена');
    }
}
