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
                              <button type="button" id="start_lunch" class="btn btn-primary btn-lg"> Lunch Begins </button>
                              <button type="button" id="stop_lunch" class="btn btn-primary btn-lg"> Lunch Ends </button>
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
<script type="text/javascript">

    $(document).ready(function() {
        $("#start_lunch").click(function(){
            var start_lunch= moment().format("hh:mm:ss");
            $.ajax({
                url: "/start_lunch",
                data:{start_lunch:start_lunch},
                success: function(result){
                  $("#start_lunch").attr("disabled", true);
                }

            });
        });
        $("#stop_lunch").click(function(){
            var stop_lunch= moment().format("hh:mm:ss");
            $.ajax({
                url: "/stop_lunch",
                data:{stop_lunch:stop_lunch},
                success: function(result){
                  $("#stop_lunch").attr("disabled", true);
                }

            });
        });
        
    });
</script>