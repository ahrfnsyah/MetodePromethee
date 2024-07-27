<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKriteriaTable extends Migration
{
    public function up()
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id();
            $table->string('kriteria');
            $table->string('fungsi_preferensi');
            $table->enum('min_max', ['min', 'max']);
            $table->decimal('bobot', 5, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kriteria');
    }
}
