@extends('layouts.app')

@section('title', 'Неисправность № ' . $fault->code)

@section('content')
    <div class="card">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h3 class="h5 mb-0">⚠️ Неисправность № {{ $fault->code }}</h3>
            <div>
                <a href="{{ route('faults.edit', $fault) }}" class="btn btn-sm btn-warning me-2">✏️ Редактировать</a>
                <a href="{{ route('faults.index') }}" class="btn btn-sm btn-secondary">← Назад к списку</a>
            </div>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h4>{{ $fault->description }}</h4>
                <hr>
            </div>

            <div class="mb-4">
                <h5 class="text-danger">🔧 Причина:</h5>
                <div class="p-3 bg-light rounded">
                    {!! nl2br(e($fault->cause)) !!}
                </div>
            </div>

            <div class="mb-4">
                <h5 class="text-success">✅ Способ устранения:</h5>
                <div class="p-3 bg-light rounded">
                    {!! nl2br(e($fault->solution)) !!}
                </div>
            </div>

            <div class="alert alert-info mt-3">
                <small>
                    <strong>Создано:</strong> {{ $fault->created_at ? $fault->created_at->format('d.m.Y H:i:s') : 'Не указано' }}<br>
                    <strong>Обновлено:</strong> {{ $fault->updated_at ? $fault->updated_at->format('d.m.Y H:i:s') : 'Не указано' }}
                </small>
            </div>
        </div>
    </div>
@endsection
