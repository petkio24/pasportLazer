<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>@yield('title', 'Wattsan CO2 Laser')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav class="navbar">
    <div class="container navbar-container">
        <a class="navbar-brand" href="{{ route('home') }}">WATTSAN</a>

        <!-- Десктопная навигация -->
        <div class="nav-links">
            <a class="nav-link" href="{{ route('home') }}">Главная</a>
            <span class="nav-divider"></span>
            <a class="nav-link" href="{{ route('specs') }}">Характеристики</a>
            <span class="nav-divider"></span>
            <a class="nav-link" href="{{ route('safety') }}">Безопасность</a>
            <span class="nav-divider"></span>
            <a class="nav-link" href="{{ route('guide') }}">Руководство ПО</a>
            <span class="nav-divider"></span>
            <a class="nav-link" href="{{ route('chapters') }}">Все главы</a>
            <span class="nav-divider"></span>
            <a class="nav-link" href="{{ route('faults.index') }}">Неисправности</a>
        </div>

        <!-- Десктопный поиск -->
        <form action="{{ route('search.global') }}" method="GET" class="search-form">
            <input type="text" name="q" class="search-input" placeholder="Поиск..." value="{{ request('q') }}">
            <button type="submit" class="btn-search">Найти</button>
        </form>

        <!-- Кнопка бургер-меню для мобильных -->
        <button class="burger-btn" id="burgerBtn">Меню</button>
    </div>
</nav>

<!-- Мобильное меню -->
<div class="mobile-menu" id="mobileMenu">
    <div class="nav-links-mobile">
        <a class="nav-link" href="{{ route('home') }}">Главная</a>
        <a class="nav-link" href="{{ route('specs') }}">Характеристики</a>
        <a class="nav-link" href="{{ route('safety') }}">Безопасность</a>
        <a class="nav-link" href="{{ route('guide') }}">Руководство ПО</a>
        <a class="nav-link" href="{{ route('chapters') }}">Все главы</a>
        <a class="nav-link" href="{{ route('faults.index') }}">Неисправности</a>
    </div>
    <div class="search-form-mobile">
        <form action="{{ route('search.global') }}" method="GET">
            <input type="text" name="q" class="search-input-mobile" placeholder="Поиск..." value="{{ request('q') }}">
            <button type="submit" class="btn-search-mobile">Найти</button>
        </form>
    </div>
</div>

<main>
    @yield('content')
</main>

<footer class="footer">
    <div class="container">
        <p>2025 Wattsan CO2 Laser — Полный паспорт оборудования</p>
        <p>Модели: 6090 | 1290 | 1610</p>
    </div>
</footer>

<script>
    // Бургер-меню для мобильных устройств
    const burgerBtn = document.getElementById('burgerBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (burgerBtn && mobileMenu) {
        burgerBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('active');
        });

        // Закрыть меню при клике на ссылку
        const mobileLinks = mobileMenu.querySelectorAll('.nav-link');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('active');
            });
        });
    }

    // Аккордеон для глав
    function toggleChapter(el) {
        const item = el.closest('.chapter-item');
        if (item) item.classList.toggle('open');
    }

    function openAll() {
        document.querySelectorAll('.chapter-item').forEach(item => {
            item.classList.add('open');
            const content = item.querySelector('.chapter-content');
            if (content) content.style.display = 'block';
        });
    }

    function closeAll() {
        document.querySelectorAll('.chapter-item').forEach(item => {
            item.classList.remove('open');
            const content = item.querySelector('.chapter-content');
            if (content) content.style.display = 'none';
        });
    }

    function toggleContent(btn) {
        const content = btn.nextElementSibling;
        const isCollapsed = btn.classList.contains('collapsed');

        if (isCollapsed) {
            btn.classList.remove('collapsed');
            if (content) content.style.display = 'block';
        } else {
            btn.classList.add('collapsed');
            if (content) content.style.display = 'none';
        }
    }
</script>
</body>
</html>
