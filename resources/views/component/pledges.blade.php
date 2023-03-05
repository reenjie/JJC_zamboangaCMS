<div class="table-responsive">
    <table class="table">
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
                                    <h6>Amount:</h6>
                                  
                                    &#8369;{{$row->amount}}
                                    
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