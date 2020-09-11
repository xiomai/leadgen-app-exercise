<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id')->index();
            $table->unsignedBigInteger('page_version_id')->index();
            $table->string('email');
            $table->dateTime('email_sent_at')->nullable();
            $table->dateTime('email_opened_at')->nullable();
            $table->dateTime('attachment_opened_at')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('page_id')->references('id')
                ->on('pages')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('page_version_id')->references('id')
                ->on('page_versions')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['page_id', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
