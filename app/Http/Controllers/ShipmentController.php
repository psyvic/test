<?php

namespace App\Http\Controllers;

use App\Http\Resources\Shipment as ShipmentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Requests;
use App\Shipment;
use GuzzleHttp\Client;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get articles
        $shipments = Shipment::paginate(15);

        // Return collection of articles as a resource
        return ShipmentResource::collection($shipments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shipment = New Shipment;
        $shipment->id = $request->input('article_id');
        $shipment->title = $request->input('title');
        $shipment->body = $request->input('body');

        if ($article->save())
        {
            return new ArticleResource($article);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($reference)
    {
        // Get article
        $shipment = Shipment::findOrFail($reference);

        //To avoid the data {} wrapping the json object
        ShipmentResource::withoutWrapping();


        $shipment = new ShipmentResource($shipment);
        //Parse the shipment resource into a JSON string
        $shipment = json_encode($shipment);
//        return $shipment;

        //Create a Transsmart Client to obtain a security token
        $client = new TranssmartClient(Config::get('transsmart.USERNAME'), Config::get('transsmart.PASSWORD'));

        //Create a curl POST request
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL            => 'https://accept-api.transsmart.com/v2/shipments/GOCUSTOM/BOOK',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST           => true,
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer " . $client->getToken(),
                'Content-Type: application/json;charset=UTF-8',
                'Content-Length: ' . strlen($shipment)
            ),
            CURLOPT_POSTFIELDS     => $shipment,
            CURLOPT_CUSTOMREQUEST  => 'POST'
        ]);

        $curlResult = curl_exec($curl);
        print_r($curlResult);
        curl_close($curl);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
