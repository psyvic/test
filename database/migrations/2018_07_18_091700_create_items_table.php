<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('shipment_reference')->nullable();
            $table->string('articleId', 255);
            $table->string('currency', 3)->nullable();
            $table->string('description', 255)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('netPrice', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('weight', 10, 2)->nullable();
            $table->decimal('quantityBackOrder', 10, 0)->nullable();
            $table->integer('quantityOrder')->nullable();
            $table->string('serialNumber', 255)->nullable();
            $table->string('countryOfOrigin', 3)->nullable();
            $table->string('hsCode', 255)->nullable();
            $table->string('articleName', 255)->nullable();
            $table->string('reasonOfExport', 255)->nullable();
            $table->string('proformaInvoiceDate', 255)->nullable();
            $table->integer('quantityUom')->nullable();
            $table->string('assemblyInstructions', 255)->nullable();

            $table->index('shipment_reference', 'shipment_reference');

            $table->foreign('shipment_reference', 'itemShipmentReferenceFK')->references('reference')->on('shipments')->onDelete('CASCADE
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
        Schema::dropIfExists('items');
    }
}
