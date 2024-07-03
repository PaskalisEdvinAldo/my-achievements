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
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text("company")->nullable();
            $table->text("position")->nullable();
            $table->integer("start_tenure")->nullable();
            $table->integer("end_tenure")->nullable();
            $table->text("job_desc")->nullable();
            $table->text("achievement_desc")->nullable();
            $table->text("tech")->nullable();
            $table->text("expertise_field")->nullable();
            $table->text("tools")->nullable();
            $table->text("other_skills")->nullable();
            $table->text("institution")->nullable();
            $table->text("degree")->nullable();
            $table->integer("start_period")->nullable();
            $table->integer("end_period")->nullable();
            $table->text("award_title")->nullable();
            $table->integer("award_year")->nullable();
            $table->text("award_desc")->nullable();
            $table->string("language")->nullable();
            $table->string("capability")->nullable();
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
        Schema::dropIfExists('resumes');
    }
};
