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
                            
                              @if($result[0]['login_time'] == '' && $result[0]['login_date'] == date('Y-m-d') ) 
                              
                                  <button type="button" id="start_login" class="btn btn-primary btn-lg"> Click to Login </button>
                              @endif
                              @if($result[0]['lunch_time_start'] == '' && $result[0]['login_date'] == date('Y-m-d'))
                              
                                  <button type="button" id="start_lunch" class="btn btn-primary btn-lg"> Lunch Begins </button>
                              
                              @endif
                              @if($result[0]['lunch_time_end'] == '' && $result[0]['login_date'] == date('Y-m-d'))     
                                  <button type="button" id="stop_lunch" class="btn btn-primary btn-lg"> Lunch Ends </button>
                              @endif
                              @if($result[0]['logout_time'] == '' && $result[0]['login_date'] == date('Y-m-d'))   
                                  <button type="button" id="logout_button" class="btn btn-primary btn-lg"> Logout </button>
                              @endif
                              @if($result[0]['logout_time'] != '' && $result[0]['login_time'] != '')
                                <button type="button" id="start_login" class="btn btn-primary btn-lg"> Click to Login </button>
                              @endif
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
        
        
        $('#start_login').click(function(){
            var start_time= moment().format("hh:mm:ss");
            $.ajax({
                url: "/start_login",
                data:{start_time:start_time},
                success: function(result){
                if(result == 0){
                  swal({ 
                        title: "OK",
                        text: "Login Time Entered! successfully!", 
                        icon: "success",
                         }).then(function(){
                      window.location.reload();
                  });
                }
                else{
                  swal("Here!", "You have already entered your login time!", "success");
                }
              }
            });
        });
        $("#start_lunch").click(function(){
            var start_lunch= moment().format("hh:mm:ss");
            $.ajax({
                url: "/start_lunch",
                data:{start_lunch:start_lunch},
                success: function(result){
                  if(result == 0){
                    swal({ 
                          title: "OK",
                          text: "Lunch Break started!", 
                          icon: "success"
                        
                       }).then(function(){
                          window.location.reload();
                      });
                  
                  }
                }

            });
        });
        $("#stop_lunch").click(function(){
            var stop_lunch= moment().format("hh:mm:ss");
            $.ajax({
                url: "/stop_lunch",
                data:{stop_lunch:stop_lunch},
                success: function(result){
                  if(result == 0){
                    swal({ 
                          title: "Done",
                          text: "Lunch Break Ended!", 
                          icon: "success"
                         }).then(function(){
                          window.location.reload();
                      }
                    );
                  }
                }

            });
        });

        $("#logout_button").click(function(){
        var stop_time= moment().format("hh:mm:ss");
            $.ajax({
                url: "/stop_login",
                data:{stop_time:stop_time},
                success: function(result){
                  if(result == 0){
                  swal({ 
                          title: "OK",
                          text: "Logout Time Entered successfully!", 
                          icon: "Alert"
                        }).then(function(){
                          window.location.reload();
                      }
                    );
                  } 
                }

            });
    });
        
    });
</script>