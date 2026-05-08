import 'bootstrap/dist/js/bootstrap.min.js';
// Локальный JavaScript без внешних зависимостей

// Аккордеон для глав
document.addEventListener('DOMContentLoaded', function() {
    // Инициализация аккордеона
    const accordionButtons = document.querySelectorAll('.accordion-button');
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            this.classList.toggle('collapsed');
            const body = this.nextElementSibling;
            if (body && body.classList.contains('accordion-body')) {
                body.classList.toggle('show');
            }
        });
    });

    // Поиск по главам (если есть)
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const items = document.querySelectorAll('.chapter-item');
            items.forEach(item => {
                const text = item.innerText.toLowerCase();
                if (text.includes(query)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
});

// Функции для работы с главами
function openAll() {
    const items = document.querySelectorAll('.chapter-item');
    items.forEach(item => {
        item.classList.add('open');
        const content = item.querySelector('.chapter-content');
        if (content) content.style.display = 'block';
    });
}

function closeAll() {
    const items = document.querySelectorAll('.chapter-item');
    items.forEach(item => {
        item.classList.remove('open');
        const content = item.querySelector('.chapter-content');
        if (content) content.style.display = 'none';
    });
}

function toggleChapter(element) {
    const item = element.closest('.chapter-item');
    if (item) {
        item.classList.toggle('open');
        const content = item.querySelector('.chapter-content');
        if (content) {
            if (content.style.display === 'block') {
                content.style.display = 'none';
            } else {
                content.style.display = 'block';
            }
        }
    }
}
