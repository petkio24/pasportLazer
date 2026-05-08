@extends('layouts.app')

@section('title', 'Лазерный CO2 станок Wattsan')

@section('content')
    <div class="hero">
        <div class="container">
            <h1>Лазерный CO2 станок Wattsan</h1>
            <p>Модели 6090, 1290, 1610 — высокоточная резка и гравировка неметаллических материалов</p>
        </div>
    </div>

    <div class="container" style="padding-bottom: 2rem;">
        <div style="margin-bottom: 2rem;">
            <h2>1. Область применения</h2>
            <p>Лазерный CO2 станок WATTSAN предназначен для высокоточной резки и гравировки неметаллических материалов с применением лазерного излучения. Оборудование позволяет автоматизировать процессы обработки с высоким качеством и точностью.</p>
        </div>

        <div style="margin-bottom: 2rem;">
            <h2>2. Основные характеристики</h2>
            <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                <div style="flex: 1; min-width: 200px; background: #fafafa; padding: 1rem;">
                    <strong>Wattsan 6090</strong><br>
                    600×900 mm<br>
                    Мощность: 50-150 W
                </div>
                <div style="flex: 1; min-width: 200px; background: #fafafa; padding: 1rem;">
                    <strong>Wattsan 1290</strong><br>
                    1200×900 mm<br>
                    Мощность: 50-180 W
                </div>
                <div style="flex: 1; min-width: 200px; background: #fafafa; padding: 1rem;">
                    <strong>Wattsan 1610</strong><br>
                    1600×1000 mm<br>
                    Мощность: 50-180 W
                </div>
            </div>
        </div>

        <div style="margin-bottom: 2rem;">
            <h2>3. Комплектация</h2>
            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                <div style="background: #fafafa; padding: 0.5rem 1rem;">Станок лазерной резки</div>
                <div style="background: #fafafa; padding: 0.5rem 1rem;">Вентилятор вытяжки</div>
                <div style="background: #fafafa; padding: 0.5rem 1rem;">Водяная помпа</div>
                <div style="background: #fafafa; padding: 0.5rem 1rem;">Воздушный компрессор</div>
                <div style="background: #fafafa; padding: 0.5rem 1rem;">Кабели питания (2 шт)</div>
                <div style="background: #fafafa; padding: 0.5rem 1rem;">Силиконовая трубка (3 шт)</div>
                <div style="background: #fafafa; padding: 0.5rem 1rem;">Кабель Ethernet / USB</div>
                <div style="background: #fafafa; padding: 0.5rem 1rem;">Паспорт станка</div>
            </div>
        </div>

        <div style="margin-bottom: 2rem;">
            <h2>4. Порядок включения станка</h2>
            <ol style="background: #fafafa; padding: 1rem 1rem 1rem 2rem;">
                <li>Отожмите кнопку аварийного отключения</li>
                <li>Включите питание системы управления</li>
                <li>Включите питание лазера</li>
                <li>Включите чиллер и компрессор</li>
                <li>Поверните ключ активации лазера в положение ON</li>
            </ol>
        </div>

        <div style="margin-bottom: 2rem;">
            <h2>5. Порядок выключения станка</h2>
            <ol style="background: #fafafa; padding: 1rem 1rem 1rem 2rem;">
                <li>Поверните ключ активации лазера в положение OFF</li>
                <li>Выключите питание системы управления</li>
                <li>Выключите питание лазера</li>
                <li>Выключите чиллер и компрессор</li>
                <li>Зажмите кнопку аварийной остановки</li>
            </ol>
        </div>

        <div class="alert alert-danger" style="background: #fee2e2; border-left: 3px solid #dc2626; padding: 1rem;">
            <strong>Запрещенные для обработки материалы:</strong><br>
            Тефлон, ПВХ, гетинакс, фторопласт, винил, любые фтор-, хлор-, бром-, йод-, астат-содержащие материалы.
        </div>

        <div style="margin-top: 2rem;">
            <h2>6. Условия эксплуатации</h2>
            <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                <div style="flex: 1;">Температура: 10–40°C</div>
                <div style="flex: 1;">Влажность: менее 70%</div>
                <div style="flex: 1;">Заземление: менее 5 Ом</div>
                <div style="flex: 1;">Стабилизатор напряжения</div>
                <div style="flex: 1;">Свободное пространство: 1 м</div>
                <div style="flex: 1;">Огнетушитель</div>
            </div>
        </div>
    </div>
@endsection
