@include('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<style type="text/css">
  
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <aside class="main-sidebar elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('dist/img/Z Logo.png') }}" alt="AdminLTE Logo" class="brand-image-logo img-rounded elevation-8">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user6-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                  <i class="fas fa-tachometer-alt nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          @if(Auth::user()->role == 'admin')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                User Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link" id="user_list">
                      <i class="fas fa-dot-circle nav-icon"></i>
                      <p>Users List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" id="new_user">
                       <i class="fas fa-dot-circle nav-icon"></i>
                      <p>Add New User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link" id="attendance_list">
                       <i class="fas fa-dot-circle nav-icon"></i>
                      <p>Attendance List</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript">
  
$(".nav-item a").on("click", function() {
  $(".nav-item a").removeClass("active");
  $(this).addClass("active");
});

$(document).ready(function(){
  
  $('#user_list').click(function(){
    $.ajax({
            type: 'GET', 
            url : "/userlist", 
            success : function (result) {
             
                $(".content-wrapper").html(result);
            }
        });

  });
  $('#new_user').click(function(){
    $.ajax({
            type: 'GET', 
            url : "/userAdd", 
            success : function (result) {
                $(".content-wrapper").html(result);
            }
        });

  });
  $('#attendance_list').click(function(){
    $.ajax({
            type: 'GET', 
            url : "/attendance_list", 
            success : function (result) {
                $(".content-wrapper").html(result);
            }
        });

  });
$(document).on('click','#submit_form',function(e) {
    e.preventDefault();
    let id = $('#id').val();
    let name = $('#name').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let designation = $('#designation').val();
     $.ajax({
        type:"POST",
        url : "/addUser", 
        data:{
        "_token": "{{ csrf_token() }}",
        id:id,
        name:name,
        email:email,
        password:password,
        designation:designation,
      },
        success : function (result) {
                $(".content-wrapper").html(result);
            }
       
    });
});
$(document).on('click','#new_user_add',function(e) {
  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
      },
      email: {
        required: true,
        email: true,
        remote: {
          url: "/check_email",
          type: "POST",
          data: {
              "_token": "{{ csrf_token() }}",
           data: {email: function() {return $('#exampleInputEmail1').val();}
         }
         }
     }
   },
      password: {
        required: true,
        minlength: 5
      },
      designation: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Please enter a name"
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address",
        remote: "Email already in use!"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      designation: {
        required: "Please provide a designation"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

    let id = '';
    let name = $('#exampleInputname').val();
    let email = $('#exampleInputEmail1').val();
    let password = $('#exampleInputPassword1').val();
    let designation = $('#exampleInputdesignation').val();
    console.log(password,name,email,designation);
     $.ajax({
        type:"POST",
        url : "/addUser", 
        data:{
        "_token": "{{ csrf_token() }}",
        id:id,
        name:name,
        email:email,
        password:password,
        designation:designation,
      },
        success : function (result) {
                $(".content-wrapper").html(result);
            }
       
    });
});
$("#generate").click(function(){
  $.ajax({
          url: "/generate_password",
          success: function(result){
            $('#exampleInputPassword1').val(result);
          }

      });
  });

});

  
</script>
  
