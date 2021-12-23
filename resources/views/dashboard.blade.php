<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-8">
                      <div class="card">
                          <div class="card-body">
                              @if (session('status'))
                                  <div class="alert alert-success" role="alert">
                                      {{ session('status') }}
                                  </div>
                              @endif
                              @php 
                              date_default_timezone_set('Asia/Kolkata');
                              
                              @endphp
                            @if(count($result)>0)
                                @foreach($result as $user_details)
                                  @if($user_details['login_time'] == '' && $user_details['login_date'] == date('Y-m-d')) 
                                      <button type="button" id="start_login" class="btn btn-primary btn-lg"> Click to Login </button>
                                  @endif
                                  @if($user_details['lunch_time_start'] == '' && $user_details['login_date'] == date('Y-m-d'))
                                      <button type="button" id="start_lunch" class="btn btn-primary btn-lg"> Lunch Begins </button>
                                  @endif
                                  @if($user_details['lunch_time_end'] == '' && $user_details['login_date'] == date('Y-m-d'))
                                      <button type="button" id="stop_lunch" class="btn btn-primary btn-lg"> Lunch Ends </button>
                                  @endif
                                  @if($user_details['logout_time'] == '' && $user_details['login_date'] == date('Y-m-d'))
                                      <button type="button" id="logout_button" class="btn btn-primary btn-lg"> Logout </button>
                                  @endif
                                  @if($user_details['logout_time'] != '' && $user_details['login_time'] != '')
                                    <button type="button" id="start_login" class="btn btn-primary btn-lg"> Click to Login </button>
                                  @endif

                                @endforeach

                            @else
                                <button type="button" id="start_login" class="btn btn-primary btn-lg"> Click to Login </button>
                            @endif
                            
                            
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $(document).on('click','#start_login',function(e) {
          e.preventDefault();
            var start_time= moment().format("hh:mm:ss");
            $.ajax({
                url: "/start_login",
                data:{start_time:start_time},
                success: function(result){
                if(result != 1){
                  swal({ 
                        title: "OK",
                        text: "Login Time Entered!", 
                        icon: "success",
                         }).then(function(){
                  });
                  $(".content-wrapper").html(result);
                }
                else{
                  swal("Here!", "You have already entered your login time!");
                }
              }
            });
        });
        $(document).on('click','#start_lunch',function(e) {
          e.preventDefault();
            var start_lunch= moment().format("hh:mm:ss");
            $.ajax({
                url: "/start_lunch",
                data:{start_lunch:start_lunch},
                success: function(result){
                  if(result != 1){
                    swal({ 
                          title: "OK",
                          text: "Lunch Break started!", 
                          icon: "success"
                        
                       }).then(function(){
                          
                      });
                    $(".content-wrapper").html(result);
                  }
                }

            });
        });
        $(document).on('click','#stop_lunch',function(e) {
          e.preventDefault();
            var stop_lunch= moment().format("hh:mm:ss");
            $.ajax({
                url: "/stop_lunch",
                data:{stop_lunch:stop_lunch},
                success: function(result){
                  if(result != 1){
                    swal({ 
                          title: "Done",
                          text: "Lunch Break Ended!", 
                          icon: "success"
                         })
                    $(".content-wrapper").html(result);
                    $("#start_lunch").hide();
                  }
                }
            });
        });

        $(document).on('click','#logout_button',function(e) {
          e.preventDefault(); 
          var stop_time= moment().format("hh:mm:ss");
            $.ajax({
                url: "/stop_login",
                data:{stop_time:stop_time},
                success: function(result){
                  if(result != 1){
                  swal({ 
                          title: "Done",
                          text: "Logout Time Entered successfully!", 
                        })
                  $(".content-wrapper").html(result);
                  $("#stop_lunch").hide();
                  $("#start_lunch").hide();
                  } 
                }

            });
    });
        
    });
</script>