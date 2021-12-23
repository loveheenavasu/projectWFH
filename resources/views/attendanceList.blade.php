<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Attendance List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Attendance List</li>
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
                <h3 class="card-title">Attendance List Of Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Login Date</th>
                    <th>Login Time</th>
                    <th>Lunch Time</th>
                    <th>Logout Time</th>
                  </tr>
                  </thead>
                  <tbody>
                    @if(!empty($result))
                      @foreach($result as $user)
                  <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['login_date'] }}</td>
                    <td>{{ $user['login_time'] }}</td>
                    <td>{{ $user['lunch_time_start'] }} - {{ $user['lunch_time_end'] }}</td>
                    <td>{{ $user['logout_time'] }}</td>
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
  });
</script>