<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('faults', function (Blueprint $table) {
            $table->id();
            $table->string('code');          // Код из таблицы неисправностей (№)
            $table->string('description');   // Описание неисправности
            $table->text('cause');           // Причина
            $table->text('solution');        // Способ устранения
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faults');
    }
};
