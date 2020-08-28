<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendMorningPromotion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:morning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send morning promotions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
    $username   = "sandbox";
    $apiKey     = "22f5cb7036842f374fd13fbf2231dce7af5fb0e281d5440488db9d2966f414b1";
    
    // Initialize the SDK
    $AT         = new AfricasTalking($username, $apiKey);
    
    // Get the SMS service
    $sms        = $AT->sms();
    
    // Set the numbers you want to send to in international format
    $recipients = Contact::select('phone_number')->get();
    
    // Set your message
    $message    = "hey";
    $recipients = "0728127290,0797295632";
    
    // Set your shortCode or senderId
    // $from       = "";
    
    try {
        // Thats it, hit send and we'll take care of the rest
        $result = $sms->send([
            'to'      => $recipients,
            'message' => $message,
            // 'from'    => $from
        ]);
    
        dd($result);
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
        }
    }

