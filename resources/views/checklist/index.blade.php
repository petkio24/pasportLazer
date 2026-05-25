@extends('layouts.app')

@section('title', 'Ежедневный чек-лист проверки станка')

@section('content')
    <div class="container" style="padding: 32px 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 24px;">
            <h1 style="margin: 0;">Ежедневный чек-лист проверки станка</h1>
            <a href="{{ route('checklist.history') }}" class="btn">История проверок</a>
        </div>

        <div class="alert-info" style="background: #e8f4f8; border-left: 3px solid #111; padding: 12px; margin-bottom: 24px;">
            <strong>Внимание</strong><br>
            Перед началом работы необходимо выполнить все пункты чек-листа. Отмечайте каждый пункт после выполнения.
            При пересменке убедитесь, что все отметки актуальны.
        </div>

        <div class="checklist-grid" style="display: flex; flex-direction: column; gap: 16px;">
            @foreach($items as $item)
                <div class="checklist-card" style="border: 1px solid #e5e5e5; background: #fff; overflow: hidden;">
                    <div style="padding: 16px; border-bottom: 1px solid #e5e5e5; background: #fafafa;">
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                            <div>
                                <span style="font-weight: 700; font-size: 1rem;">{{ $item->name }}</span>
                                @if($item->lastLog && $item->lastLog->checked_at->isToday())
                                    <span style="background: #d1fae5; color: #065f46; padding: 2px 8px; font-size: 0.7rem; margin-left: 8px;">Выполнено сегодня</span>
                                @endif
                            </div>
                            <div style="font-size: 0.75rem; color: #666;">
                                @if($item->lastLog)
                                    Последняя проверка: {{ $item->lastLog->checked_at->format('d.m.Y H:i') }} ({{ $item->lastLog->operator_name }})
                                @else
                                    Ещё не проверялось
                                @endif
                            </div>
                        </div>
                        <p style="font-size: 0.8rem; color: #666; margin-top: 8px;">{{ $item->description }}</p>
                    </div>

                    <div style="padding: 16px;">
                        <form action="{{ route('checklist.store') }}" method="POST" style="display: flex; flex-wrap: wrap; gap: 12px; align-items: flex-end;">
                            @csrf
                            <input type="hidden" name="checklist_item_id" value="{{ $item->id }}">

                            <div style="flex: 1; min-width: 150px;">
                                <label class="form-label" style="font-size: 0.7rem;">Оператор (ФИО)</label>
                                <input type="text" name="operator_name" class="form-control" placeholder="Ваше имя" required style="padding: 6px 10px; font-size: 0.85rem;">
                            </div>

                            <div style="min-width: 120px;">
                                <label class="form-label" style="font-size: 0.7rem;">Статус</label>
                                <select name="status" class="form-control" required style="padding: 6px 10px; font-size: 0.85rem;">
                                    <option value="1">Всё хорошо</option>
                                    <option value="0">Есть проблемы</option>
                                </select>
                            </div>

                            <div style="flex: 2; min-width: 200px;">
                                <label class="form-label" style="font-size: 0.7rem;">Комментарий (при наличии проблем)</label>
                                <input type="text" name="comment" class="form-control" placeholder="Какие проблемы обнаружены?" style="padding: 6px 10px; font-size: 0.85rem;">
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary" style="padding: 6px 20px;">Отметить</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Состояние на сегодня -->
        <div style="margin-top: 32px; padding: 20px; background: #f8f8f8; border: 1px solid #e5e5e5;">
            <h3 style="margin-top: 0; margin-bottom: 16px;">Состояние на сегодня</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 12px;">
                @php
                    $checkedToday = 0;
                    $total = $items->count();
                    foreach($items as $item) {
                        if($item->lastLog && $item->lastLog->checked_at->isToday()) {
                            $checkedToday++;
                        }
                    }
                    $percent = $total > 0 ? round($checkedToday / $total * 100) : 0;
                @endphp

                <div style="flex: 1; min-width: 150px; background: #fff; padding: 16px; text-align: center;">
                    <div style="font-size: 2rem; font-weight: 700;">{{ $checkedToday }}/{{ $total }}</div>
                    <div style="font-size: 0.8rem; color: #666;">Выполнено пунктов</div>
                </div>
                <div style="flex: 2; min-width: 200px; background: #fff; padding: 16px;">
                    <div style="font-size: 0.8rem; margin-bottom: 8px;">Прогресс</div>
                    <div style="background: #e5e5e5; height: 20px;">
                        <div style="background: #111; height: 20px; width: {{ $percent }}%;"></div>
                    </div>
                    <div style="font-size: 0.75rem; color: #666; margin-top: 8px;">{{ $percent }}% выполнено</div>
                </div>
            </div>

            @if($checkedToday == $total && $total > 0)
                <div style="margin-top: 16px; text-align: center; color: #065f46;">
                    <strong>Все пункты выполнены! Станок готов к работе.</strong>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Автоматическая подстановка времени и даты
        const now = new Date();
        document.querySelectorAll('input[type="datetime-local"]').forEach(input => {
            if (!input.value) {
                const formatted = now.toISOString().slice(0, 16);
                input.value = formatted;
            }
        });
    </script>
@endsection
