<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 
  <!-- iCheck for checkboxes and radio inputs -->
  {!! Html::style('assets/admin/css/select2.min.css') !!}
  {!! Html::style('assets/admin/css/adminlte.min.css') !!}
  {!! Html::style('assets/admin/css/custom.css') !!}
  
 

  @yield('stylecss')
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
     
    </ul>
   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
       
          <a href="{{ url('/logout') }}">Logout</a>
        
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa-th-large"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('dashboard')}}" class="brand-link">
      <!-- <img src="{!! URL::asset('assets/admin/img/logo.png') !!}"
           alt="VLCC"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light">Aneja Realty</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="javascript:" class="d-block" style="color: aquamarine">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('dashboard')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li>
            </ul>
          </li>          
          
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Forms
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('property.create')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add Property</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('property?type=residence')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Residential Property</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('property?type=commercial')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Commercial Property</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link active">
                  <i class="nav-icon fa fa-edit"></i>
                  <p>
                      Settings
                      <i class="fa fa-angle-left right"></i>
                  </p>
              </a>
             {{-- <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{url('department')}}" class="nav-link">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>Departments</p>
                          </a>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{url('designations')}}" class="nav-link">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>Designation</p>
                          </a>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item">
                      <a href="{{url('centers')}}" class="nav-link">
                              <i class="fa fa-circle-o nav-icon"></i>
                              <p>Centers</p>
                          </a>
                  </li>
              </ul>--}}
          </li>

          <li class="nav-item has-treeview">
            
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="../examples/profile.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
             
            </ul>
          </li>
          <!--li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plus-square-o"></i>
              <p>
                Extras
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">             "{{url('dashboard')}}"
              <li class="nav-item">
                <a href="../examples/404.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
             
            </ul>
          </li-->
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('body')
    <input type="hidden" id="token-value" value="{{ csrf_token() }}">
  </div>
  <!-- /.content-wrapper -->
  <!--footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0-alpha
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script>
  var baseUrl = '{!!URL::to("/")!!}';
  var assetsUrl = '{!!URL::asset("images")!!}';
</script>
{!! Html::script('assets/admin/js/jquery.min.js') !!}
{!! Html::script('assets/admin/js/adminlte.min.js') !!}
{!! Html::script('assets/admin/js/jquery.validate.min.js') !!}




@yield('script')

<script>

    var base_host = window.location.origin;
    //var base_url = base_host;
    var base_url=base_host+'/aneja_realty/public';

    /*$(function() {
        var date = new Date();
        var currentMonth = date.getMonth();
        var currentDate = date.getDate();
        var currentYear = date.getFullYear();

        $('#datetimepicker8').datetimepicker({
            format: 'YYYY/MM/DD',
            useCurrent: false,
            minDate: new Date(currentYear, currentMonth, currentDate)
        });
        $('#datetimepicker7').datetimepicker({
            format: 'YYYY/MM/DD',
            useCurrent: false,
            minDate: new Date(currentYear, currentMonth, currentDate)
        });
        $("#datetimepicker8").on("dp.change", function(e) {
//			alert(e.date+1);
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function(e) {
            $('#datetimepicker8').data("DateTimePicker").maxDate(e.date);
        });
    });*/

    function getData(val,tableName,mapTable,appendId,joinColumn,selectColumn,whereColumn,secondJoinColumn,err,selectedOption=0) {

        var token=$("#token-value").val();

        $.ajax({

            url: base_url+'/ajax/gatData',
            type: "POST",
            data: {'value':val, 'table':tableName,'maptable':mapTable,'joincolumn':joinColumn,'selectcolumn':selectColumn,
                'wherecolumn':whereColumn,'secondjoincolumn':secondJoinColumn,'selectedOption':selectedOption,'_token':token},

            success: function (data) {

                $('#'+appendId).html(data);

            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });

    }


    /*jQuery(document).ready(function() {
        Main.init();
        Index.init();
    });*/
</script>


</body>
</html>
