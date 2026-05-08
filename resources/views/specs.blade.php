@extends('layouts.app')

@section('title', 'Технические характеристики')

@section('content')
    <div class="container py-5">
        <h1 class="h3 mb-4">Технические характеристики</h1>

        <div class="table-responsive">
            <table class="table-minimal">
                <thead>
                <tr>
                    <th>Параметр</th>
                    <th>Wattsan 6090</th>
                    <th>Wattsan 1290</th>
                    <th>Wattsan 1610</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Рабочее поле, мм</td>
                    <td>600×900</td>
                    <td>1200×900</td>
                    <td>1600×1000</td>
                </tr>
                <tr>
                    <td>Габариты (Д×Ш×В), мм</td>
                    <td>1030×1490×985</td>
                    <td>1410×1790×985</td>
                    <td>1505×2200×985</td>
                </tr>
                <tr>
                    <td>Мощность лазера, Вт</td>
                    <td>50-150</td>
                    <td>50-180</td>
                    <td>50-180</td>
                </tr>
                <tr>
                    <td>Длина волны, нм</td>
                    <td colspan="3">10600</td>
                </tr>
                <tr>
                    <td>Диаметр зеркал, мм</td>
                    <td colspan="3">D20/25</td>
                </tr>
                <tr>
                    <td>Скорость резки, мм/с</td>
                    <td colspan="3">500</td>
                </tr>
                <tr>
                    <td>Скорость гравировки, мм/с</td>
                    <td colspan="3">500</td>
                </tr>
                <tr>
                    <td>Точность позиционирования, мм</td>
                    <td colspan="3">0,03</td>
                </tr>
                <tr>
                    <td>Автофокус</td>
                    <td colspan="3">Опционально</td>
                </tr>
                <tr>
                    <td>Вторая лазерная голова (DUOS)</td>
                    <td colspan="3">Опционально</td>
                </tr>
                <tr>
                    <td>Глубина опускания стола, мм</td>
                    <td colspan="3">40 (ST) / 160 (LT)</td>
                </tr>
                <tr>
                    <td>Конвейерный стол</td>
                    <td colspan="3">Опционально</td>
                </tr>
                <tr>
                    <td>Направляющие</td>
                    <td colspan="3">PMI 15 мм</td>
                </tr>
                <tr>
                    <td>Двигатели на осях</td>
                    <td colspan="3">Трехфазные</td>
                </tr>
                <tr>
                    <td>Система управления</td>
                    <td colspan="3">Ruida</td>
                </tr>
                <tr>
                    <td>Программное обеспечение</td>
                    <td colspan="3">RDWorks / LightBurn</td>
                </tr>
                <tr>
                    <td>Поддерживаемые форматы</td>
                    <td colspan="3">PLT, DXF, BMP, JPG, PNG</td>
                </tr>
                <tr>
                    <td>Интерфейс подключения</td>
                    <td colspan="3">USB / Ethernet</td>
                </tr>
                <tr>
                    <td>Система охлаждения</td>
                    <td colspan="3">Водяная (чиллер)</td>
                </tr>
                <tr>
                    <td>Температура охлаждения, °C</td>
                    <td colspan="3">20-25</td>
                </tr>
                <tr>
                    <td>Питание</td>
                    <td colspan="3">220±10% В, 50 Гц</td>
                </tr>
                <tr>
                    <td>Класс лазера</td>
                    <td colspan="3">4</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
