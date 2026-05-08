@extends('layouts.app')

@section('title', 'Редактировать неисправность')

@section('content')
    <div class="container" style="padding: 32px 0;">
        <div style="margin-bottom: 24px;">
            <a href="{{ route('faults.index') }}" style="color: #666; text-decoration: none;">← Назад к списку</a>
        </div>

        <div class="form-card">
            <h1 style="margin-top: 0; margin-bottom: 24px; font-size: 1.5rem;">Редактирование неисправности</h1>

            <form action="{{ route('faults.update', $fault) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Код (номер)</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code', $fault->code) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Описание неисправности</label>
                    <textarea name="description" class="form-control" rows="2" required>{{ old('description', $fault->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Причина возникновения</label>
                    <textarea name="cause" class="form-control" rows="4" required>{{ old('cause', $fault->cause) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Способ устранения</label>
                    <textarea name="solution" class="form-control" rows="5" required>{{ old('solution', $fault->solution) }}</textarea>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a href="{{ route('faults.index') }}" class="btn">Отмена</a>
                </div>
            </form>

            <hr>

            <div style="font-size: 0.75rem; color: #888;">
                <div>Создано: {{ $fault->created_at ? $fault->created_at->format('d.m.Y H:i:s') : 'не указано' }}</div>
                <div>Обновлено: {{ $fault->updated_at ? $fault->updated_at->format('d.m.Y H:i:s') : 'не указано' }}</div>
            </div>
        </div>
    </div>
@endsection
