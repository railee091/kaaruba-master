<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_profiles', function (Blueprint $table) {
            $table->id();
            $table->date('date_accepted')->nullable();
            $table->string('resolution_number')->nullable();
            $table->integer('membership_type')->nullable();
            $table->double('shares_subscribed')->nullable();
            $table->double('amount_subscribed')->nullable();
            $table->double('initial_paid_up')->nullable();
            $table->unsignedBigInteger('member_id');
            $table->timestamps();

            $table->foreign('member_id')->references('id')->on('members');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membership_profiles');
    }
}
