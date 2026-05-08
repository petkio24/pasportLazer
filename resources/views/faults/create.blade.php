@extends('layouts.app')

@section('title', 'Добавить неисправность')

@section('content')
    <div class="container" style="padding: 32px 0;">
        <div style="margin-bottom: 24px;">
            <a href="{{ route('faults.index') }}" style="color: #666; text-decoration: none;">← Назад к списку</a>
        </div>

        <div class="form-card">
            <h1 style="margin-top: 0; margin-bottom: 24px; font-size: 1.5rem;">Добавление неисправности</h1>

            <form action="{{ route('faults.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">Код (номер)</label>
                    <input type="text" name="code" class="form-control" placeholder="например: 13" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Описание неисправности</label>
                    <textarea name="description" class="form-control" rows="2" placeholder="Краткое описание проблемы" required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Причина возникновения</label>
                    <textarea name="cause" class="form-control" rows="4" placeholder="Что стало причиной неисправности" required></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Способ устранения</label>
                    <textarea name="solution" class="form-control" rows="5" placeholder="Пошаговая инструкция по устранению" required></textarea>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                    <a href="{{ route('faults.index') }}" class="btn">Отмена</a>
                </div>
            </form>
        </div>
    </div>
@endsection
