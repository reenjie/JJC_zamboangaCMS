<button class="btn btn-primary mt-5"  id="printpagemember"><i class="fas fa-print"></i></button>
<div class="table-responsive " id="printmember">
    <table class="table" id="member">
        <thead>
          <tr class="table-info">
            <th scope="col">#</th>
            <th scope="col">FirstName</th>
            <th scope="col">MiddleName</th>
            <th scope="col">LastName</th>
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
               $members = DB::select('SELECT * FROM `partners` where members = 1 ');
           @endphp
    @foreach ($members as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->firstname}}</td>
                <td>{{$item->middlename}}</td>
                <td>{{$item->lastname}}</td>
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
  $('#printpagemember').click(function(){
    var printcontent = $('#printmember').clone();
  var popup = window.open("", "Print Preview", "width=800,height=600");
  popup.document.open();
  popup.document.write("<html><head><title>Print Preview</title></head><body> <h4>JJC - MEMBERS</h4> " + printcontent.html() + "</body></html>");
  popup.document.close();
  popup.print();
  })
</script>

