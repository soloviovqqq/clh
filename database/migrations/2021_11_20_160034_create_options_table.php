<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOptionsTable
 */
class CreateOptionsTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('sale');
            $table->string('text');
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
}
