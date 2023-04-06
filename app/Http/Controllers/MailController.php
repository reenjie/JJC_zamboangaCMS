<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class MailController extends Controller
{
    private $email;
    private $name;
    private $client_id;
    private $client_secret;
    private $token;
    private $provider;

    public function __construct()
    {
       
     
        $this->client_id        = env('GOOGLE_API_CLIENT_ID');
        $this->client_secret    = env('GOOGLE_API_CLIENT_SECRET');
        $this->provider         = new Google(
            [
                'clientId'      => $this->client_id,
                'clientSecret'  => $this->client_secret
            ]
        );

    }

    public function sendConfirm(Request $request){
        $receiver = $request->email;
       
        $this->token = '1//0e35DqS4PoQcQCgYIARAAGA4SNwF-L9IrNMkS7-eOy0BfmD7vJGfEokDDLgKRbJemH82uz6P9_k6EbfhBVvFi4YW0-KcB85_hKew';
        $mail = new PHPMailer(true);

       try {
           $mail->isSMTP();
           $mail->SMTPDebug = SMTP::DEBUG_OFF;
           $mail->Host = 'smtp.gmail.com';
           $mail->Port = 465;
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
           $mail->SMTPAuth = true;
           $mail->AuthType = 'XOAUTH2';
           $mail->setOAuth(
               new OAuth(
                   [
                       'provider'          => $this->provider,
                       'clientId'          => $this->client_id,
                       'clientSecret'      => $this->client_secret,
                       'refreshToken'      => '1//0e35DqS4PoQcQCgYIARAAGA4SNwF-L9IrNMkS7-eOy0BfmD7vJGfEokDDLgKRbJemH82uz6P9_k6EbfhBVvFi4YW0-KcB85_hKew',
                       'userName'          => 'capstone0223@gmail.com'
                   ]
               )
           );

           $mail->setFrom('capstone0223@gmail.com','NoReply@JJCZamboanga');
           $mail->addAddress($receiver,'Notice');
           $mail->Subject = 'THANK YOU!';
           $mail->CharSet = PHPMailer::CHARSET_UTF8;
           $body = '<!DOCTYPE html>
           <html lang="en">
           
           <head>
               <meta charset="UTF-8">
               <meta name="viewport" content="width=device-width, initial-scale=1.0">
               <meta http-equiv="X-UA-Compatible" content="ie=edge">
               <title></title>
           </head>
           
           <body >
           
           
                   <h4>
                   Dear Subscriber,
                   <br/>

                   On behalf of the entire team at JJczamboanga, I wanted to take a moment to express our sincere gratitude for subscribing to our email list. We appreciate the trust and confidence you have shown in us.
                   
                   Your subscription will allow us to keep you updated on our latest news, products,  <br/> and services, as well as any upcoming events or promotions that may be of interest to you. We promise to deliver valuable and relevant content that will help you stay informed and engaged.
                   
                   <br/>  <br/>Once again, thank you for joining the JJczamboanga community. We look forward to providing you with valuable information and being a reliable source of support.
                   <br/>  <br/>
                   Best regards,
                   
                  
                   
                   JJczamboanga Team
                   
                   
                   
                   
                   
                   
                   
                   </h4>
           
           
                       
                      
                
                
                   <h5>
                    
                      JJC Zamboanga | All rights Reserved &middot; 2022
           
                   </h5>
                   <p><br><br><br></p>
           
           </body>
           
           </html>
           
           ';
           $mail->msgHTML($body);
           $mail->AltBody = 'This is a plain text message body';
           if( $mail->send() ) {
            return redirect()->back()->with('success','Thank you for Subscribing!');
           } else {
            echo 'not send';
             //  return redirect()->back()->with('error', 'Unable to send email.');
           }
       } catch(Exception $e) {
        return $e;
        //   return redirect()->back()->with('error', 'Exception: ' . $e->getMessage());
       }  

    }

}
