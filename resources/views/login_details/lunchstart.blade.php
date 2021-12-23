<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div>
    </div>
</div>
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