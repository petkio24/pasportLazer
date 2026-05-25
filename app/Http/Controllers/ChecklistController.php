<?php

namespace App\Http\Controllers;

use App\Models\ChecklistItem;
use App\Models\ChecklistLog;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChecklistController extends Controller
{
    public function index()
    {
        $items = ChecklistItem::where('is_active', true)->orderBy('order')->get();

        // Загружаем последние записи для каждого пункта
        foreach ($items as $item) {
            $item->lastLog = $item->logs()->first();
        }

        // Получаем историю проверок за последние 7 дней
        $history = ChecklistLog::with('item')
            ->where('checked_at', '>=', Carbon::now()->subDays(7))
            ->orderBy('checked_at', 'desc')
            ->get()
            ->groupBy(function ($log) {
                return $log->checked_at->format('Y-m-d');
            });

        return view('checklist.index', compact('items', 'history'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'checklist_item_id' => 'required|exists:checklist_items,id',
            'operator_name' => 'required|string|max:100',
            'status' => 'required|boolean',
            'comment' => 'nullable|string|max:500',
        ]);

        $validated['checked_at'] = Carbon::now();

        ChecklistLog::create($validated);

        return redirect()->route('checklist.index')
            ->with('success', 'Отметка сохранена');
    }

    public function history($days = 7)
    {
        $logs = ChecklistLog::with('item')
            ->where('checked_at', '>=', Carbon::now()->subDays($days))
            ->orderBy('checked_at', 'desc')
            ->get();

        return view('checklist.history', compact('logs', 'days'));
    }
}
