<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partners;
use App\Models\Team;
use App\Models\Pledges;
use App\Models\Events;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class actionController extends Controller
{
   public function approve(Request $request)
   {
      $id = $request->id;
      $email = $request->email;
      if ($request->type == 'decline') {

         Partners::findorFail($id)->update([
            'approvedstate' => 2
         ]);
         return redirect()->route('notify', ["email" => $email, "approve" => false]);
      }

      if ($request->type == 'approve') {
         Partners::findorFail($id)->update([
            'approvedstate' => 1
         ]);
         return redirect()->route('notify', ["email" => $email, "approve" => true]);
      }
   }


   public function deactivate(Request $request)
   {
      $selectIDS = $request->selectIDS;
      $upt = $request->upt;


      foreach ($selectIDS as $key => $value) {

         Team::findorFail($value)->update([
            'dump' => $upt
         ]);
      }

      return redirect()->back()->with('success', 'Status Changed Successfully!');
   }

   public function markreceived(Request $request){
      $id = $request->id;

      Pledges::findorFail($id)->update([
         'received'=>1 ,
         'receivedby'=>Auth::user()->name,
         'datereceived'=>date('Y-m-d H:i:s')
      ]);

      return redirect()->back()->with('success','Pledge Received Successfully!');
      
   }

   public function updateJson(Request $request){
      $ent = $request->entity;
      $val = $request->val;
      
      $jsonContent = file_get_contents(resource_path('json/config.json'));

      $jsonData = json_decode($jsonContent, true);

    $jsonData[$ent] = $val;

    $jsonContent = json_encode($jsonData, JSON_PRETTY_PRINT);
    file_put_contents(resource_path('json/config.json'), $jsonContent);
   }

   public function viewevents(Request $request){
      $id = $request->id;

      $allev = Events::findorFail($id);
      $allphoto = DB::select('SELECT * FROM `photos` where fkid = '.$allev->id.' and photo_type ="events" ');
      ?>
         <div class="container">
         <article>
          <div class="post-img">
            <div id="carousel-indicator" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel-indicator" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
              <div class="carousel-inner">
               <?php
                  foreach ($allphoto as $key => $pp){
                     if($key == 0){
                        echo '
                        <div class="carousel-item active">
                        <img class="d-block" style="width: 100%;height:300px" src="'.asset("assets/img/".$pp->photos).'" alt="First slide">
                      </div>
                        ';
                     }else{
                        echo '
                        <div class="carousel-item ">
                        <img class="d-block" style="width: 100%;height:300px" src="'.asset("assets/img/".$pp->photos).'" alt="Second slide">
                      </div>
                        ';
                     }
                  }
               
               ?>
             
                
            
              </div>

              <button class="carousel-control-prev" type="button" data-bs-target="#carousel-indicator" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carousel-indicator" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>

            </div>
          </div>
          <p class="post-date">
            <time datetime="2022-01-01"><?php echo date('F j,Y',strtotime($allev->startdate)).' - '.date('F j,Y',strtotime($allev->enddate))?></time>
          </p>
          <h3 class="title">
            <a href="javascript:void()"  data-id="{{$item->id}}" class="viewdata" ><?php echo $allev->title?></a>
       
          
          </h3>
          <p class="event-description"><?php echo $allev->desc?></p>
          <h6>Email</h6>
                  <form action="<?php echo route('Saveattend')?>" method="get">
                 
                  <input type="hidden" name="id" value="<?php echo $id?>">

                  <input type="email" class="form-control mb-2" required name="email">
          <button type="submit" class="btn btn-primary btn-sm mb-4 px-5">Attend <i class="fas fa-circle"></i></button>
                  </form>
         <div class="container">
                  <div class="row">
                     <div class="col-md-6">
                     <div class="card shadow">
                     <div class="card-body">
                     <h6 style="text-align:center">List of Volunteers</h6>
    <table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Date-Joined</th>
      
    </tr>
  </thead>
  <tbody>
      <?php 
      $joined = DB::select('select concat(p.firstname," ",p.lastname) as Name, je.joinedDate, je.status  from users u INNER join partners p on p.userID = u.id INNER JOIN joinedevents je on je.userID = u.id where je.TableID = '.$id.' and je.typeofjoin is null ');
      
      if(count($joined)>=1){
         foreach ($joined as $key => $value) {
            ?>
          <tr>
             <td><?php echo $key+1?></td>
             <td><?php echo $value->Name ?></td>
             <td><?php echo date('F j,Y',strtotime($value->joinedDate))?></td>
             
          </tr>
            <?php
          }
      }else {
         ?>
         <tr >
            <td colspan="3" style="text-align:center">
               No Data Found
            </td>
           
            
         </tr>
           <?php
      }
    
      ?>
 
  </tbody>
</table>
               </div>
               </div>
                   
                     </div>
                     <div class="col-md-6">
                  <div class="card shadow">
                     <div class="card-body">
                     <h6 style="text-align:center">List of Attendees</h6>
    <table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Date-Attended</th>
      
    </tr>
  </thead>
  <tbody>
      <?php 
      $joined = DB::select('select concat(p.firstname," ",p.lastname) as Name, je.joinedDate, je.status  from users u INNER join partners p on p.userID = u.id INNER JOIN joinedevents je on je.userID = u.id where je.TableID = '.$id.' and je.typeofjoin=1 ');
      
      if(count($joined)>=1){
         foreach ($joined as $key => $value) {
            ?>
          <tr>
             <td><?php echo $key+1?></td>
             <td><?php echo $value->Name ?></td>
             <td><?php echo date('F j,Y',strtotime($value->joinedDate))?></td>
             
          </tr>
            <?php
          }
      }else {
         ?>
         <tr >
            <td colspan="3" style="text-align:center">
               No Data Found
            </td>
           
            
         </tr>
           <?php
      }
    
      ?>
 
  </tbody>
</table>
                     </div>
                  </div>
                     </div>
                  </div>
         </div>
        </article>
         </div>


      <?php


   }

   public function Saveattend(Request $request){
        
         $validate =  User::where('email', $request->email)->where('role', 3);
         if (count($validate->get()) == 0) {
           $user =  User::create([
             'name' => $validate->get()[0]->fname . ' ' . $validate->get()[0]->lname,
             'email' => $validate->get()[0]->email,
             'password' => Hash::make('jjc_' . $validate->get()[0]->lname),
             'role' => 3,
             'resetcode' => ''
           ]);
         } else {
           $user = $validate->get()[0];
         }
     
       
      $pledge_data = [
         'email' => $request->email,
         'userID' => $user->id,
         'eventtojoin'=>$request->id 
        
       ];
       session(['pledges' =>$pledge_data]);
       session(['volunteer' =>1]);
       session(['attendonly' =>1]);

       return redirect()->route('mailResetcodes',["vercode"=>true]);
   }
}
