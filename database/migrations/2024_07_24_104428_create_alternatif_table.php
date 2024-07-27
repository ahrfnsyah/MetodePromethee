<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifTable extends Migration
{
    public function up()
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kriteria_id')->constrained('kriteria')->onDelete('cascade');
            $table->decimal('a1', 8, 2);
            $table->decimal('a2', 8, 2);
            $table->decimal('a3', 8, 2);
            $table->decimal('a4', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alternatif');
    }
}
