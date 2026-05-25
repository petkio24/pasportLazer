@extends('layouts.app')

@section('title', 'Результаты поиска')

@section('content')
    <div class="container" style="padding: 32px 0;">
        <h1>Результаты поиска: "{{ $query }}"</h1>

        @if(count($chapters) > 0)
            <h2 style="margin-top: 24px;">Главы паспорта ({{ count($chapters) }})</h2>
            @foreach($chapters as $chapter)
                <div class="search-result-item" style="border: 1px solid #e5e5e5; padding: 16px; margin-bottom: 12px; cursor: pointer;" onclick="goToChapter({{ $chapter->id }})">
                    <div style="font-weight: 600; margin-bottom: 8px;">
                        {{ $chapter->number }}. {{ $chapter->title }}
                    </div>
                    <div style="font-size: 0.85rem; color: #555;">
                        {!! nl2br(e(Str::limit(strip_tags($chapter->content), 200))) !!}
                    </div>
                </div>
            @endforeach
        @endif

        @if(count($faults) > 0)
            <h2 style="margin-top: 24px;">Неисправности ({{ count($faults) }})</h2>
            @foreach($faults as $fault)
                <div class="search-result-item" style="border: 1px solid #e5e5e5; padding: 16px; margin-bottom: 12px; cursor: pointer;" onclick="goToFault({{ $fault->id }})">
                    <div style="font-weight: 600; margin-bottom: 8px;">
                        №{{ $fault->code }}. {{ $fault->description }}
                    </div>
                    <div style="font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <strong>Причина:</strong> {{ Str::limit($fault->cause, 150) }}
                    </div>
                    <div style="font-size: 0.85rem; color: #555;">
                        <strong>Устранение:</strong> {{ Str::limit($fault->solution, 150) }}
                    </div>
                </div>
            @endforeach
        @endif

        @if(count($chapters) == 0 && count($faults) == 0)
            <div class="alert alert-warning" style="background: #fef3c7; border-left: 3px solid #d97706; padding: 16px; margin-top: 24px;">
                Ничего не найдено. Попробуйте другой запрос.
            </div>
        @endif
    </div>

    <script>
        function goToChapter(chapterId) {
            sessionStorage.setItem('scrollToChapter', chapterId);
            window.location.href = '/chapters';
        }

        function goToFault(faultId) {
            window.location.href = '/faults/' + faultId + '/edit';
        }
    </script>
@endsection
