@extends('layouts.app')

@section('title', 'Все главы паспорта')

@section('content')
    <div class="container" style="padding: 32px 0;">
        <h1>Руководство по эксплуатации</h1>
        <p class="text-muted" style="margin-bottom: 16px;">Полная информация из паспорта лазерного CO₂ станка Wattsan</p>

        <!-- ПОИСК ПО ГЛАВАМ -->
        <div style="margin-bottom: 32px;">
            <input type="text" id="searchInput" class="form-control" placeholder="🔍 Поиск по всем главам..." style="max-width: 400px; padding: 10px;">
            <div id="searchResults" style="margin-top: 16px; display: none;"></div>
        </div>

        <style>
            .chapter-item {
                margin-bottom: 4px;
            }
            .chapter-header {
                cursor: pointer;
                padding: 12px 0;
                border-bottom: 1px solid #eee;
                display: flex;
                justify-content: space-between;
                align-items: center;
                transition: background 0.2s;
            }
            .chapter-header:hover {
                background: #f5f5f5;
                padding-left: 8px;
            }
            .chapter-title {
                font-weight: 500;
            }
            .chapter-arrow {
                color: #888;
                font-size: 12px;
                transition: transform 0.2s;
            }
            .chapter-content {
                display: none;
                padding: 16px 0 16px 20px;
                border-bottom: 1px solid #eee;
                line-height: 1.6;
            }
            .chapter-content.level-2 {
                padding-left: 40px;
                background: #fafafa;
            }
            .chapter-content.level-3 {
                padding-left: 60px;
                background: #f8f8f8;
            }
            .open > .chapter-content {
                display: block;
            }
            .open .chapter-arrow {
                transform: rotate(90deg);
            }
            .search-highlight {
                background: #ffeb3b;
                padding: 0 2px;
            }
            .no-results {
                padding: 20px;
                text-align: center;
                color: #666;
            }
            .open-all-btn {
                margin-bottom: 20px;
                padding: 8px 16px;
                background: #fff;
                border: 1px solid #ccc;
                cursor: pointer;
            }
            .open-all-btn:hover {
                background: #f0f0f0;
            }
        </style>

        <div>
            <button class="open-all-btn" onclick="openAll()">📂 Открыть все главы</button>
            <button class="open-all-btn" onclick="closeAll()" style="margin-left: 8px;">📁 Закрыть все</button>
        </div>

        <div id="chaptersTree" style="margin-top: 24px;">
            @foreach($chapters as $chapter)
                @include('partials.chapter-item', ['chapter' => $chapter, 'level' => 1])
            @endforeach
        </div>
    </div>

    <script>
        // Поиск по главам
        const searchInput = document.getElementById('searchInput');
        const searchResultsDiv = document.getElementById('searchResults');
        const chaptersTree = document.getElementById('chaptersTree');

        let allContent = [];

        // Собираем весь текст для поиска
        document.querySelectorAll('.chapter-content').forEach(content => {
            const text = content.innerText;
            const header = content.previousElementSibling?.querySelector('.chapter-title')?.innerText || '';
            allContent.push({
                element: content,
                text: text,
                title: header,
                id: content.id
            });
        });

        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();

            if (query.length < 2) {
                searchResultsDiv.style.display = 'none';
                chaptersTree.style.display = 'block';
                // Убираем подсветку
                document.querySelectorAll('.search-highlight').forEach(el => {
                    const parent = el.parentNode;
                    parent.replaceChild(document.createTextNode(el.innerText), el);
                    parent.normalize();
                });
                return;
            }

            // Поиск
            const results = allContent.filter(item =>
                item.text.toLowerCase().includes(query) ||
                item.title.toLowerCase().includes(query)
            );

            if (results.length > 0) {
                searchResultsDiv.style.display = 'block';
                chaptersTree.style.display = 'none';

                let html = `<div style="background: #f8f8f8; padding: 16px; border-left: 3px solid #111;">
                            <strong>🔍 Найдено ${results.length} результатов по запросу "${this.value}"</strong>
                        </div>`;

                results.forEach(result => {
                    // Подсветка в найденном фрагменте
                    let preview = result.text.substring(0, 300);
                    const regex = new RegExp(`(${query})`, 'gi');
                    preview = preview.replace(regex, '<mark class="search-highlight">$1</mark>');

                    html += `
                    <div style="border: 1px solid #eee; padding: 16px; margin-top: 12px; cursor: pointer;" onclick="goToChapter('${result.id}')">
                        <div style="font-weight: 500;">📖 ${result.title}</div>
                        <div style="font-size: 0.85rem; color: #555; margin-top: 8px;">${preview}...</div>
                    </div>
                `;
                });
                searchResultsDiv.innerHTML = html;
            } else {
                searchResultsDiv.style.display = 'block';
                chaptersTree.style.display = 'none';
                searchResultsDiv.innerHTML = '<div class="no-results">😞 Ничего не найдено. Попробуйте другой запрос.</div>';
            }
        });

        function goToChapter(contentId) {
            searchResultsDiv.style.display = 'none';
            chaptersTree.style.display = 'block';
            searchInput.value = '';

            const targetContent = document.getElementById(contentId);
            if (targetContent) {
                // Открываем все родительские главы
                let parent = targetContent.closest('.chapter-item');
                while (parent) {
                    parent.classList.add('open');
                    parent = parent.parentElement.closest('.chapter-item');
                }
                targetContent.scrollIntoView({ behavior: 'smooth', block: 'center' });
                targetContent.style.background = '#fffbcc';
                setTimeout(() => {
                    targetContent.style.background = '';
                }, 2000);
            }
        }

        function toggleChapter(el) {
            const item = el.closest('.chapter-item');
            item.classList.toggle('open');
        }

        function openAll() {
            document.querySelectorAll('.chapter-item').forEach(item => {
                item.classList.add('open');
            });
        }

        function closeAll() {
            document.querySelectorAll('.chapter-item').forEach(item => {
                item.classList.remove('open');
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Проверяем, нужно ли раскрыть и показать определённую главу
            var chapterId = sessionStorage.getItem('scrollToChapter');
            if (chapterId) {
                sessionStorage.removeItem('scrollToChapter');

                // Находим элемент главы
                var chapterElement = document.getElementById('chapter-' + chapterId);
                if (chapterElement) {
                    // Раскрываем главу и всех родителей
                    var current = chapterElement;
                    while (current) {
                        current.classList.add('open');
                        var content = current.querySelector('.chapter-content');
                        if (content) {
                            content.style.display = 'block';
                        }
                        current = current.parentElement.closest('.chapter-item');
                    }

                    // Прокручиваем к главе
                    chapterElement.scrollIntoView({ behavior: 'smooth', block: 'start' });

                    // Подсвечиваем главу жёлтым на 3 секунды
                    chapterElement.style.transition = 'background 0.3s';
                    chapterElement.style.background = '#fffbcc';
                    setTimeout(function() {
                        chapterElement.style.background = '';
                    }, 3000);
                }
            }
        });
    </script>
@endsection
