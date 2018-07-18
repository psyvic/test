<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Shipment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            [
                'reference' => $this->reference,
                'carrier' => $this->carrier,
                'costCenter' => $this->costCenter,
                'mailType' => $this->mailType,
                'language' => $this->language,
                'description' => $this->description,
                'instruction' => $this->instruction,
                'value' => $this->value,
                'valueCurrency' => $this->valueCurrency,
                'spotPrice' => $this->spotPrice,
                'spotPriceCurrency' => $this->spotPriceCurrency,
                'pickupDate' => $this->pickupDate,
                'pickupTime' => '',
                'pickupTimeTo' => '',
                'requestedDeliveryDate' => $this->requestedDeliveryDate,
                'requestedDeliveryTime' => '',
                'requestedDeliveryTimeTo' => '',
                'service' => $this->service,
                'serviceLevelTime' => $this->serviceLevelTime,
                'serviceLevelOther' => $this->serviceLevelOther,
                'incoterms' => $this->incoterms,
                'inbound' => $this->inbound,
                'loadmeters' => $this->loadmeters,
//                'deliveryNoteInfo' => [
//                    'deliveryNoteId' => $this->deliveryNoteId,
//                    'currency' => $this->deliveryNoteCurrency,
//                    'price' => $this->deliveryNotePrice,
//                    'deliveryNoteLines' =>
//                        Item::collection($this->items)
//                ],
                'addresses' => Address::collection($this->addresses),
                'packages' => [[
                    //TODO fill with the real DB info
                    'lineNo' => $this->lineNo,
                    'shipmentLineId' => $this->shipmentLineId,
                    'packageType' => $this->packageType,
                    'description' => $this->packageDescription,
                    'quantity' => $this->quantity,
                    'stackable' => $this->stackable,
//                    'stackHeight' => 1,
//                    'additionalReferences' => [[
//                        'type' => 'ORDER',
//                        'value' => 'example'
//                    ]],
                    'deliveryNoteInfo' => [
                        'deliveryNoteId' => $this->deliveryNoteId,
                        'currency' => $this->deliveryNoteCurrency,
                        'price' => $this->deliveryNotePrice,
                        'deliveryNoteLines' =>
                            Item::collection($this->items)
                    ],
                    'measurements' => [
                        'length' => $this->lenght,
                        'width' => $this->width,
                        'height' => $this->height,
                        'weight' => $this->weight,
                    ],
                ]],
            ]
        ];
    }

}
