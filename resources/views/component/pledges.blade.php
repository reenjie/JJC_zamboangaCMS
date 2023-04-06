<button class="btn btn-primary mt-5" id="printpagepledges"><i class="fas fa-print"></i></button>
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
           @php
               $members = DB::select('SELECT * FROM `partners` where email in (select email from pledges ) ');
           @endphp
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
                                    <span style="font-size:13px;float:right">{{date('F j,Y',strtotime($row->created_at))}}</span>
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

<script>
    $('#printpagepledges').click(function(){
        var printcontent = $('#printpledges').clone();
  var popup = window.open("", "Print Preview", "width=800,height=600");
  popup.document.open();
  popup.document.write("<html><head><title>Print Preview</title></head><body> <h4>JJC - PLEDGERS</h4> " + printcontent.html() + "</body></html>");
  popup.document.close();
  popup.print();
    })
  </script>
  