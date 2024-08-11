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
    Schema::create('pictures', function (Blueprint $table) {
        $table->id();
        $table->string('namePic');
        $table->string('conditionPic');
        $table->string('sidePic');
        $table->string('textKey');
        $table->text('selectfilePic');
        $table->string('dicraption');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('pictures');
}

};
