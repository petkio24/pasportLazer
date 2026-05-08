<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('chapters', function (Blueprint $table) {
            if (!Schema::hasColumn('chapters', 'parent_id')) {
                $table->integer('parent_id')->default(0);
            }
            if (!Schema::hasColumn('chapters', 'level')) {
                $table->integer('level')->default(0);
            }
        });
    }

    public function down()
    {
        Schema::table('chapters', function (Blueprint $table) {
            $table->dropColumn(['parent_id', 'level']);
        });
    }
};
