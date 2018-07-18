<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
//use GuzzleHttp\Exception\RequestException;
//use GuzzleHttp\Psr7\Response;

class TranssmartClient
{
//
//    /**
//     * @var TranssmartLogger
//     */
//    protected $logger;

    private $username;

    private $password;

    private $token;

//    private $apiLocation = 'https://connect.api.transwise.eu/Api';
    private $apiLocation = 'https://api.transsmart.com';

//    private $apiTestLocation = 'https://connect.test.api.transwise.eu/Api';
    private $apiTestLocation = 'https://accept-api.transsmart.com';

    /**
     * @var Client
     */
//    private $client;

//
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        // token for token veryfication needed with every request to the API
        $this->setToken($username, $password);


    }
//
    public function setToken($username, $password)
    {
        $remote_url = 'https://accept-api.transsmart.com/login';
        // Create the options array for the context
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'header' => "Authorization: Basic " . base64_encode("$username:$password")
            )
        );
        // Create the context to recover and store the token
        $context = stream_context_create($opts);
        // Open the file using the HTTP headers set above
        $file = file_get_contents($remote_url, false, $context);
        $file = json_decode($file,true);
        $this->token = $file['token'];
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

//
//    public function labelDocument()
//    {
//        $order = 1;
//        while ($order != NULL){
//
//            echo 'Please type the order number you wish to print : ';
//            $order = readline();
//
//            if ($order == NULL){
//                echo 'No order number was provided, quitting...' . PHP_EOL;
//                die;
//            }
//
//            $curl = curl_init();
//
//            curl_setopt_array($curl, array(
//                CURLOPT_URL => "https://accept-api.transsmart.com/v2/prints/GOCUSTOM/" . $order . "?rawJob=true",
//                CURLOPT_RETURNTRANSFER => true,
//                CURLOPT_ENCODING => "",
//                CURLOPT_MAXREDIRS => 10,
//                CURLOPT_TIMEOUT => 30,
//                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//                CURLOPT_CUSTOMREQUEST => "GET",
//                CURLOPT_HTTPHEADER => array(
//                    "authorization: Bearer " . $this->getToken(),
//                ),
//            ));
//
//            $response = curl_exec($curl);
//            $err = curl_error($curl);
//            $response = json_decode($response, true);
//            curl_close($curl);
//
//            if ($response == NULL){
//                echo 'Error authentificating user token' . PHP_EOL;
//                die;
//            }
//            if ($err) {
//                echo "cURL Error #:" . $err;
//            } else if ($response['status'] != NULL){
//                echo ($response['status'] . ' ' . $response['description'] . '. ' . $response['message'] . PHP_EOL);
//            }
//            else {
//                $response = $response[0]['packageDocs'];
//                $response = base64_decode($response[0]['data']);
//
//                $curl = curl_init();
//                curl_setopt($curl, CURLOPT_URL, "http://api.labelary.com/v1/printers/8dpmm/labels/4x6/0/");
//                curl_setopt($curl, CURLOPT_POST, TRUE);
//                curl_setopt($curl, CURLOPT_POSTFIELDS, $response);
//                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
//                curl_setopt($curl, CURLOPT_HTTPHEADER, array("Accept: application/pdf"));
//                $result = curl_exec($curl);
//
//                if (curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200) {
//                    $file = fopen(($order . ".pdf"), "w");
//                    fwrite($file, $result);
//                    fclose($file);
//                    echo 'Label created succesfully' . PHP_EOL;
//                } else {
//                    print_r("Error: $result" . PHP_EOL);
//                }
//
//                curl_close($curl);
//            }
//
//        }
}