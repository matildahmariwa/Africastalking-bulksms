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
    public function sendSms(Request $request)
    {
       
// $username   = "sandbox";
// $apiKey     = "22f5cb7036842f374fd13fbf2231dce7af5fb0e281d5440488db9d2966f414b1";

// Initialize the SDK
// $AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
// $sms        = $AT->sms();

// Set the numbers you want to send to in international format
      

    // $recipients = Contact::select('phone_number')->get();
    // dd($request);
    //     $recipients = Contact::whereHas('groups', function($q) {
    //     $q->where('group_name', '=', $request->input('group_name'));
    // })->get();
    $contacts = Contact::whereHas('groups', function($q) {
        $q->where('group_name', '=', $request->input('group_name'));
    })->get();
    // $recipients = Group::all();
    
    // $recipient = Group::find(1);

    return $request;
    


// Set your message
// $message    = "hey";
// $recipients = "0728127290,0797295632";

// Set your shortCode or senderId
// $from       = "";

// try {
//     // Thats it, hit send and we'll take care of the rest
//     $result = $sms->send([
//         'to'      => $recipients,
//         'message' => $message,
//         // 'from'    => $from
//     ]);

//     dd($result);
// } catch (Exception $e) {
//     echo "Error: ".$e->getMessage();
// }
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
