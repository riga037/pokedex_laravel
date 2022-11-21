<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monsters_moves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('monster_id')->constrained()->onDelete('cascade');
            $table->foreignId('move_id')->constrained()->onDelete('cascade');
            $table->unique(['monster_id','move_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monsters_moves');
    }
};
