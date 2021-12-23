<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Of Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered datatable table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(!empty($data))
                      @foreach($data as $user)
                  <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['designation'] }}</td>
                    
                    <td>
                      <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-info btn-sm edit_record_d" data-id="{{$user->id}}"><i class="fas fa-pencil-alt"></i>Edit</button>
                        
                      </div>
                      <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-danger btn-sm delete_record_d" data-id="{{$user->id}}"><i class="fas fa-trash"></i>Delete</button>
                      </div>
                    </td>
                    
                  </tr>
                  @endforeach
                  @endif
                  </tbody>
                </table>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </section>
  </div>

  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
  $(document).ready(function(){
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    }); 

    $('.edit_record_d').click(function() {
          var id = $(this).attr('data-id');
        $.ajax({
                type: 'post', 
                url: '/userEdit',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data:{id:id},
                success : function (result) {
                $(".content-wrapper").html(result);
            }
            });
      });

    $('.delete_record_d').click(function() {
          var id = $(this).attr('data-id');
          
          SwalDelete(id);
      });
  });
  function SwalDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "It will be deleted permanently!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        $.ajax({
                                url: '/deleteUser',
                                data:{id:id},
                                dataType: 'json'
                            })
                            .done(function(response) {

                                Swal.fire('Deleted!', 'Your file has been deleted.', 'success');
                                window.location.reload();
                            })
                            .fail(function() {
                                Swal.fire('Oops...', 'Something went wrong with ajax !', 'error')
                            });
                    });
                },   
  });
}

</script>