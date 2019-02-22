@extends('layouts.admin_body')
@section('title')
{{--
  @if($status == 1) {{'Active Employee'}} @else {{'Inactive Employee'}} @endif
--}}

@endsection

@section('stylecss')
<!-- iCheck for checkboxes and radio inputs -->
  {!! Html::style('assets/admin/css/dataTables.bootstrap4.css') !!}
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
                   <h3>Employee Database Table</h3>
                    </div>
                    <div class="col-sm-6"><br>
                      <ol class="breadcrumb float-sm-right">
{{--
                      <a href="{{url('employee-data-download',$status)}}" target="_blank" style="font-size:17px" class="fa">&#xf019; Download Excel</a>
--}}
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
                  <th align="center">Tilte</th>
                  <th align="center">Bedrooms</th>
                  <th align="center">Available For</th>
                  <th align="center">Rent Price</th>
                  <th align="center">Total Floors</th>
                  <th align="center">Create Date</th>
                  <th align="center">Short Address</th>
                  <th align="center">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($properties as $property)

                  <tr>
                    <td><a href="{{url('property/'.$property->id)}} "title="View Profile"> {{ucfirst($property->title)}} </td></td>
                    <td><?php if ($property->available_for==1) {
                            if ($property->bedrooms==0) {
                                echo '1 Room Set';
                            }
                            else{
                                echo $property->bedrooms.' BHK';
                            }
                        }
                        else{
                            echo '';
                        } ?></td>
                  <!-- <td>@if($property->available_for==1) {{$property->bedrooms}} BHK  @elseif($property->bedrooms==0) {{'1 Room Set'}} @else {{''}}@endif</td> -->
                    <td>{{ucfirst($property->getType->name)}}</td>
                    <td>{{number_format($property->rent_price)}}</td>
                    <td>{{$property->total_floors}}</td>
                    <td>{{$property->created_at}}</td>
                    <td>{{ucfirst($property->getLocation->name)}}</td>

                    <td align="center">
                        <a href="{{URL :: asset('property/'.$property->id)}}/edit" class="btn btn-edit"   title="Edit"><i class="fa fa-pencil"></i></a>
                      <a href="{{url('property/'.$property->id)}}/destroy" title="Delete" onclick="return confirm('Are you sure to delete user')" class="btn btn-bricky "><i class="fa fa-trash fa fa-white"></i></a>

                    </td>



                  </tr>
                @endforeach

                </tfoot>
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
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->




  </div>

@endsection

@section('script')
<!-- jQuery -->


{!! Html::script('assets/admin/js/jquery.dataTables.js') !!}
{!! Html::script('assets/admin/js/dataTables.bootstrap4.js') !!}
{{--{!! Html::script('assets/admin/js/bootstrap.min.js') !!}
{!! Html::script('assets/admin/js/demo.js') !!}
{!! Html::script('assets/admin/js/employee.js') !!}
{!! Html::script('assets/admin/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}--}}




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







