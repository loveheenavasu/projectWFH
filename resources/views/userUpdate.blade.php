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
              <form id="quickForm_update" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value = "{{ $data->name }}">
                    <input type="hidden" name="id" id="id" class="form-control" value = "{{ $data->id }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value = "{{ $data->email }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value = "{{ $data->password }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation" value = "{{ $data->designation }}">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary submit_btn" id="submit_form">Submit</button>
                </div>
              </form>
            </div>
            </div>
        </div>
      </div>
</section>

