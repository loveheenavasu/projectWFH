@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button type="button" id="start"> Click to Login </button>
                    <button type="button" id="start_lunch"> Lunch Begins </button>
                    <button type="button" id="stop_lunch"> Lunch Ends </button>
                    <button type="button" id="stop"> Logout </button>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $("#start").click(function(){
            var start_time= moment().format("hh:mm:ss");
            $.ajax({
                url: "/start_login",
                data:{start_time:start_time},
                success: function(result){
                }

            });
        });
        $("#start_lunch").click(function(){
            var start_lunch= moment().format("hh:mm:ss");
            $.ajax({
                url: "/start_lunch",
                data:{start_lunch:start_lunch},
                success: function(result){
                }

            });
        });
        $("#stop_lunch").click(function(){
            var stop_lunch= moment().format("hh:mm:ss");
            $.ajax({
                url: "/stop_lunch",
                data:{stop_lunch:stop_lunch},
                success: function(result){
                }

            });
        });
        $("#stop").click(function(){
            var stop_time= moment().format("hh:mm:ss");
            $.ajax({
                url: "/stop_login",
                data:{stop_time:stop_time},
                success: function(result){
                }

            });
        });
        
    });
</script>
