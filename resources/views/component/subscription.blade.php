
<h6>Subscription</h6>
<div class="table-responsive " >
    <table class="table" id="subs">
        <thead>
          <tr class="table-info">
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Date of Subscription</th>    
          </tr>
        </thead>
        <tbody>
           @php
               $subs = DB::select('SELECT * FROM `subscriptions`');
           @endphp
           @foreach ($subs as $key => $item)
                <tr>
                  <td>{{$key + 1}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{date('F j,Y',strtotime($item->created_at))}}</td>
                </tr>
           @endforeach
        </tbody>
      </table>
</div>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>

<script>
   $('#subs').DataTable();
</script>
