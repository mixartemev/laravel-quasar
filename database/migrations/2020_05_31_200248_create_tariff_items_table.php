<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tariff_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('level')->nullable();
            $table->unsignedDecimal('percent', 4, 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tariff_items');
    }
}
