<div class="chapter-item" id="chapter-{{ $chapter->id }}">
    <div class="chapter-header" onclick="toggleChapter(this)">
        <span class="chapter-title">
            @if($level == 1)📘 @elseif($level == 2)📌 @else 🔹 @endif
            Глава {{ $chapter->number }}. {{ $chapter->title }}
        </span>
        <span class="chapter-arrow">▶</span>
    </div>
    <div class="chapter-content level-{{ $level }}" id="content-{{ $chapter->id }}">
        {!! nl2br(e($chapter->content)) !!}

        @if($chapter->children && $chapter->children->count() > 0)
            <div style="margin-top: 16px;">
                @foreach($chapter->children as $child)
                    @include('partials.chapter-item', ['chapter' => $child, 'level' => $level + 1])
                @endforeach
            </div>
        @endif
    </div>
</div>

<style>
    .chapter-item {
        margin-left: {{ ($level - 1) * 20 }}px;
    }
</style>
