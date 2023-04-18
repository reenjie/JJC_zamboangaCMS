<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\Google;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\OAuth;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use App\Models\User;
use App\Models\Partners;
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

    public function sendConfirm(Request $request)
    {
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

            $mail->setFrom('capstone0223@gmail.com', 'NoReply@JJCZamboanga');
            $mail->addAddress($receiver, 'Notice');
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
            if ($mail->send()) {
                return redirect()->back()->with('success', 'Thank you for Subscribing!');
            } else {
                echo 'not send';
                //  return redirect()->back()->with('error', 'Unable to send email.');
            }
        } catch (Exception $e) {
            return $e;
            //   return redirect()->back()->with('error', 'Exception: ' . $e->getMessage());
        }
    }

    public function notify(Request $request)
    {
        $receiver = $request->email;
        $approve = $request->approve;
        

        $getuser = Partners::where('email',$receiver)->get();
        $msgBody = '';
        if ($approve == true) {
            $msgBody = '
                Welcome User' . date('Ymd') . ' @' . $getuser[0]->firstname.' '.$getuser[0]->lastname . ' , Congratulations! We are thrilled to inform you that your application has been approved. We are excited to have you on board and look forward to working with you. Thank you for your interest in our organization, and we are confident that you will make a valuable contribution to our team. Welcome aboard!

                <br/>
                <br/>
                Your New Login Credentials is <br/>

                email : '.$getuser[0]->email.' <br/>
                password : jjc_'.$getuser[0]->lastname.' <br/>


                <br/>

                Please login to View more info about us.



                . 
            ';
        } else {
            $msgBody = '
                Greetings User' . date('Ymd') . ' @' . $user[0]->fname.' '.$user[0]->lname . ' , We regret to inform you that your application has not been approved at this time. However, we encourage you to consider revising your application and applying again in the future. Thank you for your interest and we wish you the best of luck in your future endeavors. 
            ';
        }

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

            $mail->setFrom('capstone0223@gmail.com', 'NoReply@JJCZamboanga');
            $mail->addAddress($receiver, 'Notice');
            $mail->Subject = 'JJC NOTICE';
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
                Hi Subscriber,
                  <br/>
                 ' . $msgBody . '
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
            if ($mail->send()) {
                return redirect()->back()->with('success', 'Action saved successfully! and The system has sent a response through email!');
            } else {
                echo 'not send';
                //  return redirect()->back()->with('error', 'Unable to send email.');
            }
        } catch (Exception $e) {
            return $e;
            //   return redirect()->back()->with('error', 'Exception: ' . $e->getMessage());
        }
    }


    public function mailResetcode(Request $request)
    {
        $subject = "RESET CODE";
        $email = '';
       
        if($request->vercode){
            $subject = "VERIFICATION CODE";
            $email =  session()->get('pledges')['email'];
            
        }else {
            $subject = "RESET CODE";
            $email = $request->email;
        }

        $validate = User::where('email',$email );
        $resetCode = rand(100000, 999999);
        if (count($validate->get()) >= 1) {
            $validate->update([
                'resetcode' => $resetCode
            ]);

       



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

                $mail->setFrom('capstone0223@gmail.com', 'jjcZamboanga_Website');
                $mail->addAddress($email, 'resetter');
                $mail->Subject = $subject;
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
               
               
                       <h4>Your '.strtolower($subject).'  is</h4>
               
               
                           
                            <h1>' .  $resetCode . '</h1>
                    
                       <br>
                       <h5>
                           Do not share this to anyone.
                           <br>
               
                           All rights Reserved &middot; 2022
               
                       </h5>
                       <p><br><br><br></p>
               
               </body>
               
               </html>
               
               ';
                $mail->msgHTML($body);
                $mail->AltBody = 'This is a plain text message body';
                if ($mail->send()) {
                    if($request->vercode){
                        session(['emailResetcode' => true]);
                        session(['sessioncode' =>$resetCode]);
                        return redirect()->route('verification_code')->with('success', 'verification code Sent Successfully');
                    }else {
                        session(['emailsend' => true]);
                        session(['useremail' => $request->email]);
                        return redirect()->back()->with('success', 'ResetCode Sent Successfully');
                    }   
                  
                } else {
                    echo 'not send';
                    //  return redirect()->back()->with('error', 'Unable to send email.');
                }
            } catch (Exception $e) {
                return $e;
                //   return redirect()->back()->with('error', 'Exception: ' . $e->getMessage());
            }
        }


        return redirect()->back()->with('error', 'Email does not match our records.');
    }

    public function NotifyALLUsers(Request $request){
       $alluser = User::whereNotIn('id',[Auth::user()->id])->get();
       
       foreach($alluser as $row){
    
                    if($request->types == 'blogs'){
                        $html = ' Good Day! '.$row->name.'! , <br/> New Blog has posted and published. login to view more information about our post.   ';
                    } 
                    
                    if($request->types == 'events'){
                        $html = ' Good Day! '.$row->name.'! , <br/> New Event has been published. login to view more information about our post.   ';
                    } 

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
            
                        $mail->setFrom('capstone0223@gmail.com', 'NoReply@JJCZamboanga');
                        $mail->addAddress($row->email, $row->name);
                        $mail->Subject = 'JJC_Notifications';
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
                       
                       
                              '.$html.'
                              
                               
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
                        if ($mail->send()) {
                         
                        } else {
                         
                            //  return redirect()->back()->with('error', 'Unable to send email.');
                        }
                    } catch (Exception $e) {
                        return $e;
                        //   return redirect()->back()->with('error', 'Exception: ' . $e->getMessage());
                    }
                    
                
       }

       return redirect()->back()->with('success', strtoupper($request->types).' has been published | All user has been notified');
    }
}
