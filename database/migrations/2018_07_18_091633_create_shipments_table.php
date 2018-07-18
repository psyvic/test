<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reference');
            $table->char('carrier', 3);
            $table->string('serviceLevelTime', 32);
            $table->string('description', 255)->nullable();
            $table->string('instruction', 255)->nullable();
            $table->string('costCenter', 255)->nullable();
            $table->integer('mailType')->nullable();
            $table->string('language', 2)->nullable();
            $table->decimal('value', 10, 2)->nullable();
            $table->string('valueCurrency', 3)->nullable();
            $table->decimal('spotPrice', 10, 2)->nullable();
            $table->string('spotPriceCurrency', 3)->nullable();
            $table->date('pickupDate')->nullable();
            $table->date('requestedDeliveryDate')->nullable();
            $table->string('service', 16)->nullable();
            $table->string('incoterms', 16)->nullable();
            $table->decimal('loadmeters', 10, 2)->nullable();
            $table->string('serviceLevelOther', 32)->nullable();
            $table->string('deliveryNoteId', 64)->nullable();
            $table->string('deliveryNoteCurrency', 3)->nullable();
            $table->decimal('deliveryNotePrice', 10, 2)->nullable();
            $table->decimal('lenght', 10, 2)->nullable();
            $table->decimal('width', 10, 2)->nullable();
            $table->decimal('height', 10, 2)->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->integer('lineNo')->nullable();
            $table->string('shipmentLineId', 255)->nullable();
            $table->string('packageType', 255);
            $table->string('packageDescription', 255)->nullable();
            $table->integer('quantity');
            $table->integer('stackable')->nullable();

            $table->index('reference', 'reference');

            

        });

        

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
