<button class="btn btn-primary mt-5" id="printpagepledges"><i class="fas fa-print"></i></button>

@php
$members = DB::select('SELECT * FROM `partners` where email in (select email from pledges ) ');
$total = DB::select('select max(amount) as total from `pledges` ');

@endphp

<h5 style="float: right; margin-top:10px">TOTAL Amount Pledges : <span style="font-size:35px;font-weight:Bold" > &#8369;  {{$total[0]->total ?? 0}}
   
</span> </h5>

@if(session()->has('success'))

    <script>
        swal("Success", "{{session()->get('success')}}", "success");
    </script>
@endif
<div class="table-responsive " id="printpledges">
    <table class="table" id="pledges">
        <thead>
          <tr class="table-info">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Gender</th>
        
            <th scope="col">Address</th>
            <th scope="col">Pledges</th>
          </tr>
        </thead>
        <tbody>
        
    @foreach ($members as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td><span style="font-size:11px">{{$item->email}}</span><br>
                    {{$item->firstname.' '.$item->middlename.' '.$item->lastname}}</td>
                <td>{{date('F j,Y',strtotime($item->dateofbirth))}}</td>
                <td>{{$item->gender}}</td>
                
                <td>{{$item->address}}</td>
                <td>
                    @php
                        $pledges = DB::select('select * from pledges where email = "'.$item->email.'" ');
                    @endphp

                  
                        <div class="row">
                         
                            @foreach ($pledges as $row)
                            <div class="col-md-12">
                                <div class="card shadow mb-2">
                                    <div class="card-body">
                                        <span style="font-size:13px;float:right">{{date('F j,Y',strtotime($row->pledgedate))}}</span>
                                        <br>
                                        @if($row->amount)
                                        <h6>Amount:</h6>
                                      
                                        &#8369;{{$row->amount}}

                                  
                                        @endif
                                    
                                        @if($row->goods)
                                        <h5>Goods</h5>
                                        <h6>{{$row->goods}}
                                        <br/>
                                        <span style="font-size:10px">qty: {{$row->qty}}</span>
                                        </h6>
                                        <p>Note: {{$row->notes}}</p>
                                        @endif

                                        <br>
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewinfo{{$row->id}}">View Info</button>

                                    <div class="modal fade" id="viewinfo{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body p-5">
                                                @if($row->receivedby)
                                                <h6 style="float: right;" class="text-secondary">DateTime - Received : {{date('h:i a F j,Y' , strtotime($row->datereceived))}}</h6>
                                                <h5>Received By : <span style="font-weight: bold">{{$row->receivedby}}</span></h5>
                                                @else 
                                                <h6 style="float: right;" class="text-secondary">DateTime - Received : No data</h6>
                                                <h5>Received By : <span style="font-weight: bold"> No data</span></h5>
                                                @endif
                                               <br>
                                                <h5 >
                                                    Addressed to :
                                                </h5>
                                                <p class="text-secondary">
                                                    {{$row->receiver}}
                                                </p>


                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                          
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    @if(date('Y-m-d') > date('Y-m-d',strtotime($row->pledgedate)))
                                    <span class="badge bg-danger">Past Due</span>

                                    @elseif($row->received == 0)
                                    <span class="badge bg-primary">Pending</span>
                                    @else
                                    <span class="badge bg-success">Received</span>
                                    @endif


                                    @if($row->received == 0)
                                    @if(date('Y-m-d') > date('Y-m-d',strtotime($row->pledgedate)))
                                    @else
                                    <div style="float:right">
                                        <button class="btn btn-success btn-sm markasreceived" data-id="{{$row->id}}">Mark as Received <i class="fas fa-check-circle"></i></button>

                                    </div>
                                    @endif
                                    @endif
                                        {{-- <span class="badge bg-success">Received</span> --}}
                                    </div>
                                  </div>
                            </div>
                        
                      @endforeach
                      
                    </div>

                </td>
            </tr>
    @endforeach
        </tbody>
      </table>
      
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.markasreceived').click(function(){
        var id = $(this).data('id');
 swal({
  title: "Are you sure?",
  text: "Once marked as received. you cannot undo it",
  icon: "warning",
  buttons: true,
  dangerMode: false,
})
.then((willDelete) => {
  if (willDelete) {
  window.location.href='{{route("markreceived")}}?id='+id;
  }
});
    })
  
    $('#printpagepledges').click(function(){
        var printcontent = $('#printpledges').clone();
  var popup = window.open("", "Print Preview", "width=800,height=600");
  popup.document.open();
  popup.document.write("<html><head><title>Print Preview</title></head><body> <h4>JJC - PLEDGERS</h4> " + printcontent.html() + "</body></html>");
  popup.document.close();
  popup.print();
    })
  </script>
  