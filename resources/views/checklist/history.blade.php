@extends('layouts.app')

@section('title', 'История проверок')

@section('content')
    <div class="container" style="padding: 32px 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 24px;">
            <h1 style="margin: 0;">История проверок</h1>
            <a href="{{ route('checklist.index') }}" class="btn">← Назад к чек-листу</a>
        </div>

        <div style="display: flex; gap: 8px; margin-bottom: 24px; flex-wrap: wrap;">
            <a href="{{ route('checklist.history', 7) }}" class="btn {{ $days == 7 ? 'btn-primary' : '' }}">За 7 дней</a>
            <a href="{{ route('checklist.history', 14) }}" class="btn {{ $days == 14 ? 'btn-primary' : '' }}">За 14 дней</a>
            <a href="{{ route('checklist.history', 30) }}" class="btn {{ $days == 30 ? 'btn-primary' : '' }}">За 30 дней</a>
        </div>

        @php
            $grouped = $logs->groupBy(function($log) {
                return $log->checked_at->format('Y-m-d');
            });
        @endphp

        @forelse($grouped as $date => $dayLogs)
            <div style="margin-bottom: 24px;">
                <h3 style="font-size: 1rem; margin-bottom: 12px; border-left: 3px solid #111; padding-left: 12px;">
                    {{ \Carbon\Carbon::parse($date)->format('d.m.Y') }}
                    @if(\Carbon\Carbon::parse($date)->isToday()) <span style="font-size: 0.7rem; background: #111; color: #fff; padding: 2px 6px;">Сегодня</span> @endif
                </h3>

                <div style="overflow-x: auto;">
                    <table class="table-minimal">
                        <thead>
                        <tr>
                            <th>Пункт чек-листа</th>
                            <th>Оператор</th>
                            <th>Статус</th>
                            <th>Комментарий</th>
                            <th>Время</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dayLogs as $log)
                            <tr>
                                <td>{{ $log->item->name }}</td>
                                <td>{{ $log->operator_name }}</td>
                                <td>
                                    @if($log->status)
                                        <span style="color: #065f46;">Всё хорошо</span>
                                    @else
                                        <span style="color: #dc2626;">Есть проблемы</span>
                                    @endif
                                </td>
                                <td>{{ $log->comment ?? '—' }}</td>
                                <td>{{ $log->checked_at->format('H:i:s') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="text-muted text-center p-4">История проверок пуста</div>
        @endforelse
    </div>
@endsection
