<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('checklist_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checklist_item_id')->constrained()->onDelete('cascade');
            $table->string('operator_name');
            $table->boolean('status'); // true = всё хорошо, false = есть проблемы
            $table->text('comment')->nullable();
            $table->datetime('checked_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('checklist_logs');
    }
};
