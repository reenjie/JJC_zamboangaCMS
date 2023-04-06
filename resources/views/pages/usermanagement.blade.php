@extends('layouts.app', ['activePage' => 'usermanagement', 'title' => '', 'navName' => 'User management', 'activeButton' => 'laravel'])

@section('content')

    <div class="container mt-5">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus-circle"></i> Add 
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{route('addadmin')}}" method="post">
                      @csrf
                  <div class="modal-body">
                      <h6>Name</h6>
                     <input type="text" name="username" class="form-control mb-2" required>

                     <h6>Email</h6>
                     <input type="email" name="useremail" class="form-control mb-2" required>

                     <h6>Role</h6>
                  <select name="userrole" class="form-control mb-2" id="" required>
                    <option value="">Select Role</option>
                    <option value="0">Admin</option>
                    <option value="1">President</option>
                    <option value="2">Officer</option>
                  </select>

                     <h6>Password</h6>
                     <input type="password" name="userpass" class="form-control" required>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
              </form>
                </div>
              </div>
            </div>
    <div class="table-responsive">
        <table class="table" id="table0" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $user = DB::select('select * from users ');
                @endphp
                @foreach ($user as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><textarea name="" data-table="users" style="width: 300px" data-entity="name" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->name}}</textarea></td>
                  
                        <td><textarea name="" data-table="users" style="width: 300px" data-entity="email" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->email}}</textarea></td>
                        <td>
                            @switch($item->role)
                                @case(0)
                                    Admin
                                    @break
                                @case(1)
                                    President
                                    @break
                                    @case(2)
                                    Officer
                                    @break
                             
                            @endswitch

                        </td>
                        <td>
                            @if (Auth::user()->id == $item->id)
                                <i class="fas fa-id-badge text-primary" style="font-size:20px;"></i>
                            @else
                                <div class="btn-group">
                                  
                                    <button class="btn btn-light text-danger delete"
                                        data-id="{{ $item->id }}" data-table="users" ><i class="fas fa-trash-can"></i></button> 
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session()->has('success'))
    <script>
         Swal.fire(
        'Added Successfully!',
        '{{session()->get("success")}}',
        'success'
        )
    </script>
    @endif

    @if(session()->has('error'))
    <script>
         Swal.fire(
        'Request Failed!',
        '{{session()->get("error")}}',
        'error'
        )
    </script>
    @endif
    <script>
            $('.delete').click(function(){
        var id = $(this).data('id');
        var table = $(this).data('table');

       
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
         window.location.href="{{route('deleteall')}}?id="+id+"&table="+table;
        }
        })
    })
           $('.updateonmove').focusout(function(){
   var  val = $(this).val();
   var id   = $(this).data('id');
   var table = $(this).data('table');
   var entity = $(this).data('entity');
   $.ajax({
    url: "{{route('updateentities')}}",
    method: "GET",
    data: { id: id, table: table,entity:entity,value:val },
    success: function(response) {
    
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus);
    }
    });

 
   })
    </script>
@endsection