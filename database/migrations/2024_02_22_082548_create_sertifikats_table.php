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
        Schema::create('sertifikats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string("classification");
            $table->string("level");
            $table->string("role");
            $table->string("description");
            $table->string("achievement");
            $table->text("event_name");
            $table->string("event_field");
            $table->string("event_type");
            $table->date("certificate_date");
            $table->text("event_link")->nullable();
            $table->string("event_date");
            $table->string("country");
            $table->string("state")->nullable();
            $table->string("city")->nullable();
            $table->text("award");
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
        Schema::dropIfExists('sertifikats');
    }
};
