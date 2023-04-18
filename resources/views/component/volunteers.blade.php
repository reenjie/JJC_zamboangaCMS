<button class="btn btn-primary mt-5" id="printpagevolunteer"><i class="fas fa-print"></i></button>
<div class="table-responsive " id="printvolunteer">
    <table class="table" id="volunteer">
        <thead>
          <tr class="table-info">
            <th scope="col">#</th>
            <th scope="col">Action</th>
            <th scope="col">Joined Events</th>
            <th scope="col">Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Gender</th>
            <th scope="col">Status</th>
            <th scope="col">Religion</th>
            <th scope="col">Age</th>
            <th scope="col">Place of Birth</th>
            <th scope="col">Address</th>
          </tr>
        </thead>
        <tbody>
           @php
               $members = DB::select('SELECT * FROM `partners` where volunteer = 1 ');
           @endphp
    @foreach ($members as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>
                  @if($item->approvedstate == 0 || $item->approvedstate == null)
                   <button class="btn btn-danger btn-sm bg-danger text-light px-4 btndecline" data-id="{{$item->id}}" data-email="{{$item->email}}">Decline  <i class="fas fa-ban"></i></button>
                   <button class="btn btn-primary btn-sm px-4 btnapprove" data-id="{{$item->id}}" data-email="{{$item->email}}">Approve <i class="fas fa-check-circle"></i></button>
                 @endif

                 @if($item->approvedstate == 1)
                  <span class="badge bg-success">Approved</span>
                 @elseif($item->approvedstate == 2) 
                 <span class="badge bg-danger">Declined</span>
                 @endif
                 </td>
                 <td>
                  @php
                      $joined = DB::select('select * from events where id in (select TableID from joinedevents where typeof ="events" and userID = '.$item->userID.' )');
                      $ev = DB::select('select * from joinedevents where typeof ="events" and userID = '.$item->userID.'');
                  @endphp
                  @foreach ($joined as $xx)
                  <div class="card">
                    <div class="card-body">
                        <h6 class="text-primary" style="font-weight: bold;text-transform:uppercase;font-size:13px">{!!$xx->title!!}</h6>
                        <span style="font-size:11px">Status : </span>
                        @foreach ($ev as $xe )
                            @if($xe->TableID == $xx->id)
                            @if($xe->typeofjoin == 1)
                            <span class="badge bg-success">Attendees</span>
                         
                            @else 
                            <span class="badge bg-success">Volunteer</span>
                           
                            @endif
                            @endif
                        @endforeach
                       
                    </div>
                  </div>
                  @endforeach
                 

                </td>
                <td><span style="font-size:11px">{{$item->email}}</span><br>
                    {{$item->firstname.' '.$item->middlename.' '.$item->lastname}}</td>

                   
                <td>{{date('F j,Y',strtotime($item->dateofbirth))}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->religion}}</td>
                <td>{{date('Y') - date('Y',strtotime($item->dateofbirth))}}</td>
                <td>{{$item->placeofbirth}}</td>
                <td>{{$item->address}}</td>
            </tr>
    @endforeach
        </tbody>
      </table>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $('.btndecline').click(function(){
    var id = $(this).data('id');
    var email = $(this).data('email');
     
    swal({
  title: "Are you sure?",
  text: "Once Declined, You will not be able to undone it. ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $(this).html('Declining  <i style="text-align:center" class="fas fa-spinner fa-spin"></i>').attr('style','pointer-events:none');
    window.location.href='{{route("approve")}}?id='+id+'&type=decline&email='+email;
  } 
});
  })

  $('.btnapprove').click(function(){
    var id = $(this).data('id');
    var email = $(this).data('email');

    swal({
  title: "Are you sure?",
  text: "Once Approved, You will not be able to undone it. ",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    $(this).html('Approving <i style="text-align:center" class="fas fa-spinner fa-spin"></i>').attr('style','pointer-events:none');
    window.location.href='{{route("approve")}}?id='+id+'&type=approve&email='+email;
  } 
});
  })
  $('#printpagevolunteer').click(function(){
      var printcontent = $('#printvolunteer').clone();
var popup = window.open("", "Print Preview", "width=800,height=600");
popup.document.open();
popup.document.write("<html><head><title>Print Preview</title></head><body> <h4>JJC - VOLUNTEERS</h4>" + printcontent.html() + "</body></html>");
popup.document.close();
popup.print();
  })
</script>