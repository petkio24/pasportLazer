@extends('layouts.app')

@section('title', 'Руководство по работе с ПО')

@section('content')
    <div class="container" style="padding: 32px 0;">
        <h1>Руководство по работе с программным обеспечением</h1>
        <p class="text-muted" style="margin-bottom: 32px;">Управление лазерным станком через RdWorks и LightBurn</p>

        <div class="info-block" style="background: #e8f4f8; border-left: 3px solid #111; padding: 16px; margin-bottom: 32px;">
            <strong>Поддерживаемые форматы:</strong> PLT, DXF, BMP, JPG, PNG, AI, CDR (через импорт)
        </div>

        <!-- 8.1 Введение -->
        <div class="guide-section" style="margin-bottom: 32px;">
            <h2>8.1 Введение в функции ПО</h2>
            <p>RdWorks позволяет создавать простые изображения или текст, используя панель редактирования. Для создания сложных изображений используют CorelDraw, Adobe Illustrator, Photoshop, а затем импортируют файлы в RdWorks через File → Import.</p>
        </div>

        <!-- 8.1.1 Параметры обработки -->
        <div class="guide-section" style="margin-bottom: 32px;">
            <h2>8.1.1 Параметры обработки</h2>
            <p>В панели управления каждому цвету можно задать уникальные параметры обработки:</p>

            <div style="overflow-x: auto;">
                <table class="table-minimal" style="margin-top: 16px;">
                    <thead>
                    <tr>
                        <th>Параметр</th>
                        <th>Описание</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr><td>Layer</td><td>Цвет редактируемого слоя</td></tr>
                    <tr><td>Is output</td><td>Если No – цвет не будет обрабатываться</td></tr>
                    <tr><td>Speed</td><td>Скорость обработки, мм/сек</td></tr>
                    <tr><td>Repeat</td><td>Многократный повтор обработки слоя</td></tr>
                    <tr><td>Processing mode</td><td>Cut (резка) или Scan (гравировка)</td></tr>
                    <tr><td>If blowing</td><td>Включение обдува (если подключен компрессор)</td></tr>
                    <tr><td>Min power / Max power</td><td>Мощность лазера от 0 до 100%</td></tr>
                    <tr><td>Scan mode</td><td>unilateralism (однонаправленная) / swing (двунаправленная)</td></tr>
                    <tr><td>Interval</td><td>Расстояние между строками (0.08-0.1 мм)</td></tr>
                    <tr><td>Negative engrave</td><td>Инвертирование цветов</td></tr>
                    <tr><td>Output direct</td><td>Для стекла и прозрачного акрила</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 8.2 Панель управления -->
        <div class="guide-section" style="margin-bottom: 32px;">
            <h2>8.2 Панель управления станка</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 8px; background: #f8f8f8; padding: 16px;">
                <div><strong>Reset</strong> — перезагрузка системы</div>
                <div><strong>Start/Pause</strong> — запуск/пауза</div>
                <div><strong>Pulse</strong> — тестовый импульс</div>
                <div><strong>Stop</strong> — остановка</div>
                <div><strong>Focus</strong> — автофокус</div>
                <div><strong>Menu</strong> — меню настроек</div>
                <div><strong>Frame</strong> — обводка области обработки</div>
                <div><strong>File</strong> — доступ к файлам</div>
                <div><strong>Origin</strong> — установка нулевой точки</div>
                <div><strong>Power</strong> — установка мощности</div>
                <div><strong>Speed</strong> — установка скорости</div>
                <div><strong>Z↑/Z↓</strong> — движение по оси Z</div>
                <div><strong>U+/U-</strong> — движение по оси U</div>
            </div>
        </div>

        <!-- 8.3 Запуск программы -->
        <div class="guide-section" style="margin-bottom: 32px;">
            <h2>8.3 Как запустить управляющую программу</h2>

            <h3 style="font-size: 1rem; margin: 16px 0 8px 0;">Способ 1: С компьютера</h3>
            <p>Нажмите кнопку Start в окне Laser work программы RdWorks.</p>

            <h3 style="font-size: 1rem; margin: 16px 0 8px 0;">Способ 2: Из памяти контроллера</h3>
            <ol style="background: #f8f8f8; padding: 16px 16px 16px 32px;">
                <li>Нажмите кнопку Download в окне Laser work</li>
                <li>Введите название управляющей программы</li>
                <li>На панели станка нажмите File → Read memory files</li>
                <li>Выберите нужный файл и нажмите Start/Pause</li>
            </ol>

            <h3 style="font-size: 1rem; margin: 16px 0 8px 0;">Способ 3: С USB-флеш-накопителя</h3>
            <ol style="background: #f8f8f8; padding: 16px 16px 16px 32px;">
                <li>Нажмите UFileOutput в окне Laser work</li>
                <li>Сохраните программу на флешку</li>
                <li>Вставьте флешку в разъем USB на станке</li>
                <li>На панели станка нажмите File → Read USB files</li>
                <li>Выберите файл и нажмите Start/Pause</li>
            </ol>
        </div>

        <!-- 6.9 Подключение ПК -->
        <div class="guide-section" style="margin-bottom: 32px;">
            <h2>6.9 Подключение ПК</h2>
            <ol style="background: #f8f8f8; padding: 16px 16px 16px 32px;">
                <li>Возьмите USB-кабель A-A из комплекта</li>
                <li>Подключите к разъему PC на станке</li>
                <li>Второй конец подключите к компьютеру</li>
                <li>Установите драйверы с USB-диска из комплекта</li>
                <li>Запустите RdWorks и выберите модель контроллера (RDC6445G или RDV6445)</li>
                <li>Установите рабочее поле в Config → System settings → Page Size</li>
            </ol>
        </div>

        <!-- 6.10 Подключение через Ethernet -->
        <div class="guide-section" style="margin-bottom: 32px;">
            <h2>6.10 Подключение через Ethernet</h2>
            <div class="alert-warning" style="background: #fef3c7; border-left: 3px solid #d97706; padding: 12px; margin-bottom: 16px;">
                Важно: Используйте только один способ подключения – USB или Ethernet. Не подключайте их вместе.
            </div>
            <ol style="background: #f8f8f8; padding: 16px 16px 16px 32px;">
                <li>Подключите Ethernet кабель к станку и ПК</li>
                <li>В RdWorks: Settings → Add → выберите Web</li>
                <li>Установите IP контроллера: 192.168.001.100 - 192.168.001.149</li>
                <li>В настройках сети ПК установите IP: 192.168.001.2 - 192.168.001.049</li>
            </ol>
        </div>

        <!-- 6.7 Юстировка -->
        <div class="guide-section" style="margin-bottom: 32px;">
            <h2>6.7 Юстировка лазера</h2>
            <p>Юстировку необходимо проводить при первом запуске оборудования, а также ежедневно перед началом работы.</p>

            <h3 style="font-size: 1rem; margin: 16px 0 8px 0;">6.7.1 Настройка первого зеркала</h3>
            <p>Латунные винты регулируют угол наклона зеркала. Верхний винт регулирует вертикаль, правый и левый – горизонталь и диагональ.</p>

            <h3 style="font-size: 1rem; margin: 16px 0 8px 0;">6.7.2 Настройка второго зеркала</h3>
            <p>Принцип регулировки тот же. Важно, чтобы луч приходил в центр зеркала.</p>

            <h3 style="font-size: 1rem; margin: 16px 0 8px 0;">6.7.3 Настройка третьего зеркала</h3>
            <p>Настройка вертикальности луча. Отпечаток луча должен быть круглым и точно в центре сопла.</p>

            <h3 style="font-size: 1rem; margin: 16px 0 8px 0;">6.7.4 Фокусное расстояние</h3>
            <p>Для поиска фокуса используйте треугольный деревянный блок. Наименьшее выгорание будет фокусным расстоянием.</p>
        </div>

        <!-- Минимальные требования ПК -->
        <div class="guide-section" style="margin-bottom: 32px;">
            <h2>Минимальные требования ПК</h2>
            <ul style="background: #f8f8f8; padding: 16px 16px 16px 32px;">
                <li>Windows XP, 7, 10 (32 или 64-bit)</li>
                <li>Intel Celeron / Core i3/5/7 или AMD Ryzen 3/5/7/9</li>
                <li>2 ГБ оперативной памяти</li>
                <li>2 ГБ свободного места на диске</li>
                <li>Разрешение монитора 1280 x 720</li>
                <li>USB 2.0 / 3.0</li>
            </ul>
            <div class="alert-warning" style="background: #fef3c7; border-left: 3px solid #d97706; padding: 12px; margin-top: 16px;">
                Компьютер также должен быть заземлен.
            </div>
        </div>
    </div>
@endsection
