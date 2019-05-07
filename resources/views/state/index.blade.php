@extends('layouts.admin_body')
@section('title')

@endsection

@section('stylecss')
<!-- iCheck for checkboxes and radio inputs -->
  {!! Html::style('assets/admin/css/dataTables.bootstrap4.css') !!}
  {!! Html::style('assets/admin/css/bootstrap.min.css') !!}
@endsection

@section('body')

    <!-- Content Header (Page header) -->
  @if (Session::has('success'))
    <span style="color: green">{!! Session::get('success') !!}</span>
  @elseif(Session::has('error'))
    <span style="color: red">{!! Session::get('error') !!}</span>
  @endif
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('dashboard')}}">Home</a></li>              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
               <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                   <h3>State Database Table</h3>
                    </div>
                    <div class="col-sm-6"><br>
                      <ol class="breadcrumb float-sm-right">
                      <!-- <a href="{{route('city.create')}}" style="font-size:17px" class="btn btn-info btn-lg">&#xf019; Add New State</a> -->

                       </ol>
                    
                    </div>                    
                 </div>
               <div class="card-header p-2"></div>
              </div>
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th align="center">State</th>

                </tr>
                </thead>
                <tbody>
                @foreach($states as $state)

                  <tr>
                   
                    <td>{{ucfirst($state->name)}}</td>
                    

                  </tr>
                @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->

@endsection

@section('script')
<!-- jQuery -->


{!! Html::script('assets/admin/js/bootstrap.min.js') !!}
{!! Html::script('assets/admin/js/jquery.dataTables.js') !!}
{!! Html::script('assets/admin/js/dataTables.bootstrap4.js') !!}
{!! Html::script('assets/admin/js/bootstrap.min.js') !!}
{!! Html::script('assets/admin/js/demo.js') !!}
{!! Html::script('assets/admin/js/employee.js') !!}
{!! Html::script('assets/admin/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->




<!-- Page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });


  });

</script>
@endsection







