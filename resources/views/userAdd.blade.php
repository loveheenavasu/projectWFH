@include('header');
<div class="content-wrapper">
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New User</h3>
              </div>
              <!-- /.card-header -->
        <!--error ends-->
              <form id="quickForm" method="POST" action="{{ route('addUser') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputname" placeholder="Enter name" value="{{ old('name') }}" >
                     @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" value="{{ old('password') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                          <button type="button" name="generate" id="generate" class="btn btn-info .btn-lg">Generate Password</button>
                        </div>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" id="exampleInputdesignation" placeholder="Enter Designation" value="{{ old('designation') }}">
                  </div>
                  @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
@include('footer');
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script>
$(document).ready(function(){
  $("#generate").click(function(){
  $.ajax({
          url: "/generate_password",
          success: function(result){
            $('#exampleInputPassword1').val(result);
          }

      });
  });
//   $('#quickForm').validate({
//     rules: {
//       name: {
//         required: true,
//       },
//       email: {
//         required: true,
//         email: true,
//         remote: {
//           url: "/check_email",
//           type: "post",
//           email: function()
//               {
//                   return $('#quickForm :input[name="email"]').val();
//               }
//           }
//         },
     
//       password: {
//         required: true,
//         minlength: 5
//       },
//       designation: {
//         required: true
//       },
//     },
//     messages: {
//       name: {
//         required: "Please enter a name"
//       },
//       email: {
//         required: "Please enter a email address",
//         email: "Please enter a vaild email address"
//       },
//       password: {
//         required: "Please provide a password",
//         minlength: "Your password must be at least 5 characters long"
//       },
//       designation: {
//         required: "Please provide a designation"
//       }
//     },
//     errorElement: 'span',
//     errorPlacement: function (error, element) {
//       error.addClass('invalid-feedback');
//       element.closest('.form-group').append(error);
//     },
//     highlight: function (element, errorClass, validClass) {
//       $(element).addClass('is-invalid');
//     },
//     unhighlight: function (element, errorClass, validClass) {
//       $(element).removeClass('is-invalid');
//     }
//   });

  
 });
</script>