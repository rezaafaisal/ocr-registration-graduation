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
        Schema::create('archive_registrars', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->enum('status', ['create', 'validate', 'revision', 'revalidate', 'validated'])->default('create');
            $table->longText('comment')->nullable();

            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('nim')->nullable();
            $table->string('nik')->nullable();
            $table->string('pob')->nullable();
            $table->date('dob')->nullable();
            // date of entry
            $table->date('doe')->nullable();
            // date of pass or graduate date
            $table->date('dop')->nullable();
            $table->string('faculty')->nullable();
            $table->string('study_program')->nullable();
            $table->double('ipk')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();

            $table->string('munaqasyah')->nullable();
            $table->string('school_certificate')->nullable();
            $table->string('ktp')->nullable();
            // $table->string('kk')->nullable();
            $table->string('spukt')->nullable();

            $table->foreignId('archive_quota_id')->constrained('archive_quotas')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('students')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archive_registrars');
    }
};
