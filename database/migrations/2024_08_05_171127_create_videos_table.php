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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('nameVid');
            $table->string('conditionVid');
            $table->string('sideVid');
            $table->string('textKey');
            $table->text('selectfileVid');
            $table->string('dicraption');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
        Schema::table('videos', function (Blueprint $table) {
            $table->string('selectfileVid', 255)->change();
        });
    }
};
