<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shipment_reference')->nullable();
            $table->char('type', 4);
            $table->string('name', 64);
            $table->string('addressLine1', 64);
            $table->string('addressLine2', 64)->nullable();
            $table->string('addressLine3', 64)->nullable();
            $table->string('houseNo', 16)->nullable();
            $table->string('city', 64);
            $table->string('zipCode', 16);
            $table->string('state', 16)->nullable();
            $table->string('country', 3);
            $table->string('contact', 64)->nullable();
            $table->string('telNo', 32)->nullable();
            $table->string('faxNo', 32)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('accountNumber', 32)->nullable();
            $table->string('customerNumber', 32)->nullable();
            $table->integer('residential')->nullable();

            $table->index('shipment_reference', 'shipment_reference');

            $table->foreign('shipment_reference', 'addressShipmentReferenceFK')->references('reference')->on('shipments')->onDelete('CASCADE
')->onUpdate('RESTRICT');

        });

        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
