@extends('layouts.app')

@section('title', 'Неисправности и устранение')

@section('content')
    <div class="container" style="padding: 32px 0;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 24px;">
            <h1 style="margin: 0;">Неисправности станка</h1>
            <a href="{{ route('faults.create') }}" class="btn btn-primary">+ Добавить</a>
        </div>

        <form method="GET" action="{{ route('faults.index') }}" style="margin-bottom: 24px;">
            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <input type="text" name="search" class="form-control" placeholder="Поиск по коду, описанию, причине..." value="{{ request('search') }}" style="max-width: 300px;">
                <button type="submit" class="btn">Найти</button>
                @if(request('search'))
                    <a href="{{ route('faults.index') }}" class="btn">Сбросить</a>
                @endif
            </div>
        </form>

        <div class="faults-grid">
            @forelse($faults as $fault)
                <div class="fault-item">
                    <div class="fault-header">
                        <span class="fault-code">No {{ $fault->code }}</span>
                        <span class="fault-title">{{ $fault->description }}</span>
                    </div>
                    <div class="fault-cause">
                        <span class="fault-label">Причина:</span> {{ $fault->cause }}
                    </div>
                    <div class="fault-solution">
                        <span class="fault-label">Устранение:</span> {{ $fault->solution }}
                    </div>
                    <div class="fault-actions">
                        <a href="{{ route('faults.edit', $fault) }}" class="btn btn-sm">Редактировать</a>
                        <form action="{{ route('faults.destroy', $fault) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить запись?')">Удалить</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-muted text-center p-4">Неисправности не найдены</div>
            @endforelse
        </div>

        {{ $faults->links() }}
    </div>
@endsection
