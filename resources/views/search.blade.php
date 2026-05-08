@extends('layouts.app')

@section('title', 'Результаты поиска')

@section('content')
    <h1>🔎 Результаты поиска: "{{ $query }}"</h1>

    @if(empty($results['faults']) || $results['faults']->isEmpty())
        <div class="alert alert-info">Ничего не найдено.</div>
    @else
        <h3>⚠️ Неисправности</h3>
        <div class="row">
            @foreach($results['faults'] as $fault)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-header">№ {{ $fault->code }} — {{ $fault->description }}</div>
                        <div class="card-body">
                            <a href="{{ route('faults.edit', $fault) }}" class="btn btn-sm btn-primary">Перейти →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
