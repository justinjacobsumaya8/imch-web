<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('birthday')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('occupation')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('philhealth_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('permanent_house_number')->nullable();
            $table->string('permanent_street_address')->nullable();
            $table->string('permanent_municipality')->nullable();
            $table->string('permanent_province')->nullable();
            $table->string('permanent_region')->nullable();
            $table->string('permanent_home_phone_number')->nullable();
            $table->string('permanent_cellphone_number')->nullable();
            $table->string('permanent_email_address')->nullable();
            $table->string('current_house_number')->nullable();
            $table->string('current_street_address')->nullable();
            $table->string('current_municipality')->nullable();
            $table->string('current_province')->nullable();
            $table->string('current_region')->nullable();
            $table->string('current_home_phone_number')->nullable();
            $table->string('current_cellphone_number')->nullable();
            $table->string('current_other_email_address')->nullable();
            $table->string('overseas_employer_name')->nullable();
            $table->string('overseas_occupation')->nullable();
            $table->string('overseas_place_of_work')->nullable();
            $table->string('overseas_house_number')->nullable();
            $table->string('overseas_street_address')->nullable();
            $table->string('overseas_city')->nullable();
            $table->string('overseas_province')->nullable();
            $table->string('overseas_country')->nullable();
            $table->string('overseas_office_phone_number')->nullable();
            $table->string('overseas_cellphone_number')->nullable();
            $table->boolean('is_history_of_travel_symptom')->default(0)->nullable();
            $table->string('port_of_exit')->nullable();
            $table->string('airline_sea_vessel')->nullable();
            $table->string('flight_vessel_number')->nullable();
            $table->date('departure_date')->nullable();
            $table->date('philippine_arrival_date')->nullable();
            $table->boolean('is_returning_ofw')->default(0)->nullable();
            $table->boolean('is_locally_stranded_lsi')->default(0)->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->unsignedInteger('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('entries');
    }
}
