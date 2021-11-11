@include('header')
<div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" method="POST" action="{{ route('addUser') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputname" placeholder="Enter name" value = "{{ $data->name }}">
                    <input type="hidden" name="id" class="form-control" value = "{{ $data->id }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value = "{{ $data->email }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value = "{{ $data->password }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <input type="text" name="designation" class="form-control" id="exampleInputdesignation" placeholder="Enter Designation" value = "{{ $data->designation }}">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@include('footer')
