<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Contact;
use App\Group;
use DB;
// require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;

class BulkSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function CallbackAT(Request $Request){

        
        $callback = $Request->getContent();

        file_put_contents('ATCallback.log',$callback,FILE_APPEND);

        return Response()->json(['responseCode'=>200,'responseMessage'=>'Reached']);

    }
//     public function sendSms(Request $request)
//     {
       
// $username   = "sandbox";
// $apiKey     = "22f5cb7036842f374fd13fbf2231dce7af5fb0e281d5440488db9d2966f414b1";

// // Initialize the SDK
// $AT         = new AfricasTalking($username, $apiKey);

// // Get the SMS service
// $sms        = $AT->sms();

// // Set the numbers you want to send to in international format
      
// // Set your message
// $message    = $request->input('message');
// // $message    = 'hey mati';
// // return $message;
    
//     $recipients = Contact::whereHas('groups',function($q) use(&$request){
//         $q->where('group_name', '=', $request->input('group_name'));
//     })->pluck('phone_number');
  
    
//     // return $recipients;
    



// // $recipients = "+254797295632";

// // Set your shortCode or senderId
// // $from       = "";
// foreach($recipients as $recipient) {
// try {
//     // Thats it, hit send and we'll take care of the rest

//     $result = $sms->send([
//         'to'      => $recipient,
//         'message' => $message,
//         // 'from'    => $from
//     ]);

//     // dd($result);
// // exit();
// } catch (Exception $e) {
//     echo "Error: ".$e->getMessage();
// }
//     }
// }   
public function getCredentials($message, $recipient)
    {
        try {
            $username   = "sandbox";
            $apiKey     = "22f5cb7036842f374fd13fbf2231dce7af5fb0e281d5440488db9d2966f414b1";

            // Initialize the SDK
            $AT         = new AfricasTalking($username, $apiKey);

            // Get the SMS service
            $sms        = $AT->sms();
            $result = $sms->send(['to'  => $recipient,'message' => $message]);
            print_r($result);
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage();
        }
            
    }
    public function sendSms(Request $request){
            $recipients = Contact::whereHas('groups',function($q) use(&$request){

                $q->where('group_name', '=', $request->input('group_name'));

            })->get();
            // $recipient = array();
            // array_push($recipient,$recipients->phone_number);


            $message    = $request->input('message');

            foreach($recipients as $recipient) {
  
                $phone = $recipient->phone_number;

                $result = $this->getCredentials($message,$phone);
                
                  return ($result);

                if(!$result){
                    
                }
        }
  
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
