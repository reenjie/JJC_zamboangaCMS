@extends('layouts.app', ['activePage' => 'teams', 'title' => '', 'navName' => 'Teams', 'activeButton' => 'laravel'])

@section('content')
<div class="content">

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
          <div class="card-header ">
            <h4 class="card-title">Teams</h4>
            <p class="card-category">Manage Informations</p>
          </div>
          <div class="card-body ">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Add
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Blogs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{route('addall')}}" method="post" enctype="multipart/form-data">@csrf

                    <div class="modal-body">
                      <input type="hidden" name="table" value="teams">
                      <h6>Photo</h6>
                      <input type="file" required name="photofile" class="form-control" accept="image/*" />

                      <br>
                      <h6>Name</h6>
                      <textarea name="name" required class="form-control" id="" cols="30" rows="10"></textarea>
                      <br>
                      <h6>Description</h6>
                      <textarea name="desc" required class="form-control" id="" cols="30" rows="10"></textarea>
                      <br>
                      <h5 style="font-weight:bold">Social Media Links</h5>
                      <hr>

                      <h6>Facebook</h6>
                      <textarea name="facebook" required class="form-control" id="" cols="30" rows="10"></textarea>
                      <br>
                      <h6>twitter</h6>
                      <textarea name="twitter" required class="form-control" id="" cols="30" rows="10"></textarea>
                      <br>
                      <h6>instagram</h6>
                      <textarea name="instagram" required class="form-control" id="" cols="30" rows="10"></textarea>
                      <br>
                      <h6>linkedin</h6>
                      <textarea name="linkedin" required class="form-control" id="" cols="30" rows="10"></textarea>
                      <br>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @if(session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{session()->get('success')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

            @php
            $activeteam = DB::select('SELECT * FROM `teams` where dump = 0');
            $inactiveteam = DB::select('SELECT * FROM `teams` where dump = 1');
            @endphp

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Current <i class="fas fa-check-circle"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Previous <i class="fas fa-clock"></i></a>
              </li>

            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                @if(count($activeteam)>=1)


                <form action="{{route('deactivate')}}" method="post" id="deact">
                  @csrf
                  <input type="hidden" name="upt" value="1">
                  <button type="button" class="btn btn-primary btn-sm px-4 mt-3" id="selectall">SELECT ALL</button>
                  <button type="submit" class="btn btn-danger bg-danger text-light btn-sm px-4 mt-3">DEACTIVATE</button>
                  <div id="error" class="d-none">
                    <span class="text-danger">Please select one or more to proceed</span>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped" id="active">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">status</th>
                          <th scope="col">photo</th>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Links</th>
                          <th scope="col"></th>

                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($activeteam as $key=> $item)
                        <tr>
                          <td>
                            <input type="checkbox" style="width: 30px;padding:50px" class="selection" name="selectIDS[]" value="{{$item->id}}" /> {{$key + 1}}
                          </td>
                          <td>
                            <span class="badge bg-success">Active</span>
                          </td>
                          <td>
                            <img src="assets/img/{{$item->photo}}" style="width:200px;height:200px" alt="">
                          </td>

                          <td><textarea name="" data-table="teams" data-entity="name" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->name}}</textarea></td>
                          <td><textarea name="" data-table="teams" data-entity="desc" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->desc}}</textarea></td>
                          <td>
                            <span style="font-size:12px">facebook</span>
                            <textarea name="" data-table="teams" data-entity="facebook" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->facebook}}</textarea>
                            <span style="font-size:12px">twitter</span>
                            <textarea name="" data-table="teams" data-entity="twitter" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->twitter}}</textarea>
                            <span style="font-size:12px">instagram</span>
                            <textarea name="" data-table="teams" data-entity="instagram" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->instagram}}</textarea>
                            <span style="font-size:12px">linkedin</span>
                            <textarea name="" data-table="teams" data-entity="linkedin" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->linkedin}}</textarea>

                          </td>
                          <td><button data-id="{{$item->id}}" type="button" data-table="teams" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-can"></i></button></td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </form>

                @else
                <h5 style="text-align:center;margin-top:50px;padding:50px">
                  <img src="https://th.bing.com/th/id/OIP.QJGMW3smJcel9z16xRbCQgHaEO?pid=ImgDet&rs=1" alt="">

                </h5>
                @endif
              </div>
              <div class="tab fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @if(count($inactiveteam)>=1)
                <form action="{{route('deactivate')}}" method="post" id="deact1">
                  @csrf
                  <input type="hidden" name="upt" value="0">
                  <button type="button" class="btn btn-primary btn-sm px-4 mt-3" id="selectall1">SELECT ALL</button>
                  <button type="submit" class="btn btn-success bg-success text-light btn-sm px-4 mt-3">ACTIVATE</button>
                  <div id="error1" class="d-none">
                    <span class="text-danger">Please select one or more to proceed</span>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped" id="inactive">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">status</th>
                          <th scope="col">photo</th>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Links</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($inactiveteam as $key=> $item)
                        <tr>
                          <td> <input type="checkbox" style="width: 30px;padding:50px" class="selection1" name="selectIDS[]" value="{{$item->id}}" /> {{$key + 1}}</td>
                          <td>
                            <span class="badge bg-danger">Inactive</span>
                          </td>
                          <td>
                            <img src="assets/img/{{$item->photo}}" style="width:200px;height:200px" alt="">
                          </td>

                          <td><textarea name="" data-table="teams" data-entity="name" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->name}}</textarea></td>
                          <td><textarea name="" data-table="teams" data-entity="desc" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->desc}}</textarea></td>
                          <td>
                            <span style="font-size:12px">facebook</span>
                            <textarea name="" data-table="teams" data-entity="facebook" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->facebook}}</textarea>
                            <span style="font-size:12px">twitter</span>
                            <textarea name="" data-table="teams" data-entity="twitter" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->twitter}}</textarea>
                            <span style="font-size:12px">instagram</span>
                            <textarea name="" data-table="teams" data-entity="instagram" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->instagram}}</textarea>
                            <span style="font-size:12px">linkedin</span>
                            <textarea name="" data-table="teams" data-entity="linkedin" data-id="{{$item->id}}" class="form-control updateonmove" id="" cols="30" rows="10">{{$item->linkedin}}</textarea>

                          </td>
                          <td><button type="button" data-id="{{$item->id}}" data-table="teams" class="btn btn-sm btn-danger delete"><i class="fas fa-trash-can"></i></button></td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </form>
                @else

                <h5 style="text-align:center;margin-top:50px;padding:50px">
                  <img src="https://th.bing.com/th/id/OIP.QJGMW3smJcel9z16xRbCQgHaEO?pid=ImgDet&rs=1" alt="">

                </h5>
                @endif
              </div>

            </div>




          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
<script>
  $('#active').DataTable();

  $('#inactive').DataTable();
  $('#deact').on('submit', function() {
    var selection = $('.selection:checked').length;
    if (selection == 0) {
      $('#error').removeClass('d-none');
      return false;
    }
  })
  $('#selectall').click(function() {
    var bhtml = $(this).html();
    if (bhtml == 'SELECT ALL') {
      $(this).html('DESELECT').addClass('text-danger');
      $('.selection').prop('checked', true);
      $('#error').addClass('d-none');
    } else {
      $(this).html('SELECT ALL').removeClass('text-danger');
      $('.selection').prop('checked', false);
      $('#error').addClass('d-none');
    }
  })

  $('.selection').click(function() {
    $('#selectall').html('DESELECT').addClass('text-danger');
    $('.selection').removeAttr('required');
    $('#error').addClass('d-none');
  })

  $('#deact1').on('submit', function() {
    var selection = $('.selection1:checked').length;
    if (selection == 0) {
      $('#error1').removeClass('d-none');
      return false;
    }
  })
  $('#selectall1').click(function() {
    var bhtml = $(this).html();
    if (bhtml == 'SELECT ALL') {
      $(this).html('DESELECT').addClass('text-danger');
      $('.selection1').prop('checked', true);
      $('#error1').addClass('d-none');
    } else {
      $(this).html('SELECT ALL').removeClass('text-danger');
      $('.selection1').prop('checked', false);
      $('#error1').addClass('d-none');
    }
  })

  $('.selection1').click(function() {
    $('#selectall1').html('DESELECT').addClass('text-danger');
    $('.selection1').removeAttr('required');
    $('#error1').addClass('d-none');
  })

  $('.delete').click(function() {
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
        window.location.href = "{{route('deleteall')}}?id=" + id + "&table=" + table;
      }
    })
  })

  $('.updateonmove').focusout(function() {
    var val = $(this).val();
    var id = $(this).data('id');
    var table = $(this).data('table');
    var entity = $(this).data('entity');

    $.ajax({
      url: "{{route('updateentities')}}",
      method: "GET",
      data: {
        id: id,
        table: table,
        entity: entity,
        value: val
      },
      success: function(response) {

      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus);
      }
    });


  })
</script>
@endsection