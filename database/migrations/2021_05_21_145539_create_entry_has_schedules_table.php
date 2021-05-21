<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryHasSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_has_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('entry_id');
            $table->unsignedInteger('schedule_id');
            $table->date('schedule_date');
            $table->boolean('is_approved')->default(0);
            $table->unsignedInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->boolean('is_cancelled')->default(0);
            $table->unsignedInteger('cancelled_by')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->boolean('is_resched')->default(0);
            $table->unsignedInteger('resched_by')->nullable();
            $table->timestamp('resched_at')->nullable();
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
        Schema::dropIfExists('entry_has_schedules');
    }
}
