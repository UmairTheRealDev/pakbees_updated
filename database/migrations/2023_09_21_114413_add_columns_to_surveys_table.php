<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->string('signboard')->nullable()->after('day');
            $table->string('showcase')->nullable()->after('day');
            $table->string('ldu_table')->nullable()->after('day');
            $table->string('promoter')->nullable()->after('day');
            $table->string('cabinet')->nullable()->after('day');
            $table->string('promotion_stand')->nullable()->after('day');
            $table->string('ldu_qty')->nullable()->after('day');
            $table->string('foc_soh')->nullable()->after('day');
            $table->date('date_till')->nullable()->after('day');
            $table->date('date_from')->nullable()->after('day');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('surveys', function (Blueprint $table) {
            //
        });
    }
};
