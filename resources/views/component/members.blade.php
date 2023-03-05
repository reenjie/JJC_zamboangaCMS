
<div class="table-responsive">
    <table class="table">
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
               $members = DB::select('SELECT * FROM `partners`');
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