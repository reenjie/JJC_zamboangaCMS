<button class="btn btn-primary mt-5" id="printpagevolunteer"><i class="fas fa-print"></i></button>
<div class="table-responsive " id="printvolunteer">
    <table class="table" id="volunteer">
        <thead>
          <tr class="table-info">
            <th scope="col">#</th>
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
                <td><span style="font-size:11px">{{$item->email}}</span><br>
                    {{$item->firstname.' '.$item->middlename.' '.$item->lastname}}</td>
                <td>{{date('F j,Y',strtotime($item->dateofbirth))}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->religion}}</td>
                <td>{{$item->age}}</td>
                <td>{{$item->placeofbirth}}</td>
                <td>{{$item->address}}</td>
            </tr>
    @endforeach
        </tbody>
      </table>
</div>

<script>
  $('#printpagevolunteer').click(function(){
      var printcontent = $('#printvolunteer').clone();
var popup = window.open("", "Print Preview", "width=800,height=600");
popup.document.open();
popup.document.write("<html><head><title>Print Preview</title></head><body> <h4>JJC - VOLUNTEERS</h4>" + printcontent.html() + "</body></html>");
popup.document.close();
popup.print();
  })
</script>