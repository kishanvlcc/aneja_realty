@extends('layouts.admin_body')
@section('title')

@endsection

@section('stylecss')
<!-- iCheck for checkboxes and radio inputs -->
  {!! Html::style('assets/admin/css/dataTables.bootstrap4.css') !!}
  {!! Html::style('assets/admin/css/bootstrap.min.css') !!}
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
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
                   <h3>Property Database Table</h3>
                    </div>
                    <div class="col-sm-6"><br>
                      <ol class="breadcrumb float-sm-right">
{{--
                      <a href="{{url('employee-data-download',$status)}}" target="_blank" style="font-size:17px" class="fa">&#xf019; Download Excel</a>
--}}
                       </ol>
                       <!-- <p><a class="btn-modal" href="#ex1" rel="modal:open">Search Property</a></p> -->
                       <button type="button" class="btn btn-info btn-lg" id="test-modal" data-toggle="modal" data-target="#myModal">Click To Search</button>
                    
                    </div>                    
                 </div>
               <div class="card-header p-2"></div>
              </div>
           
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th align="center">Property Code</th>
                  <th align="center">Client Name</th>
                  <th align="center">Client Mobile</th>
                  <th align="center">Complete Address</th>
                  <th align="center">Floor Number</th>
                  <th align="center">Price</th>
                  <th align="center">Type Of Property</th>
                  <th align="center">Publish Date</th>
                  <th align="center">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($properties as $property)

                  <tr>
                    <td><a href="{{url('property/'.$property->id)}} "title="View Profile"> {{ucfirst($property->property_code)}} </td></td>
                    <td>{{ucfirst($property->client_name)}}</td>
                    <td>{{ucfirst($property->client_mobile_number)}}</td>
                     <!-- <td>{{substr($property->complete_address,0,10)}}</td> -->
                     <td>{{$property->complete_address}}</td>
                    <td>{{($property->floor_number)}}</td> 
                    <td>{{number_format($property->rent_price)}}</td>
                    <td>@if($property->property_type==1) {{'Sell'}} @else {{'Rent'}} @endif</td>
                    <td>{{$property->created_at}}</td>

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

<div class="modal fade" id="myModal123" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          {!! Form::open(array('url'=>'property/search','id'=>'search-form','class' => 'form','novalidate' => 'novalidate', 'files' => true)) !!}
<ul class="form-style-1">
    <li><label>Amount Range <span class="required">*</span></label>
      <select class="field-divided" name="min_amt">
        <option value="">Min</option>
        <option value="0">< 5000</option>
        <option value="5000">5,000</option>
        <option value="10000">10,000</option>
        <option value="20000">20,000</option>
        <option value="30000">30,000</option>a>
        <option value="50000">50,000</option>
        <option value="75000">75,000</option>
        <option value="100000">1 Lac</option>
        <option value="150000">1.5 Lacs</option>
        <option value="200000">2 Lacs</option>
        <option value="500000">5 Lacs</option>
        <option value="1000000">10 Lacs</option>
        <option value="1500000">15 Lacs</option>
        <option value="2000000">20 Lacs</option>
        <option value="2500000">25 Lacs</option>
        <option value="3000000">30 Lacs</option>
        <option value="4000000">40 Lacs</option>
        <option value="5000000">50 Lacs</option>
        <option value="6000000">60 Lacs</option>
        <option value="7500000">75 Lacs</option>
        <option value="9000000">90 Lacs</option>
        <option value="10000000">1 Crore</option>
        <option value="15000000">1.5 Crores</option>
        <option value="20000000">2 Crores</option>
        <option value="30000000">3 Crores</option>
        <option value="30000000">5 Crores</option>
        <option value="100000000">10 Crores</option>
        <option value="200000000">20 Crores</option>
        <option value="300000000">30 Crores</option>
        <option value="400000000">40 Crores</option>
        <option value="500000000">50 Crores</option>
        <option value="600000000">60 Crores</option>
        <option value="700000000">70 Crores</option>
        <option value="800000000">80 Crores</option>
        <option value="900000000">90 Crores</option>
        <option value="1000000000">100 Crores</option>
        <option value="10000000000">100+ Crores</option>
      </select>
      <select class="field-divided" name="max_amt">
        <option value="">Max</option>
        <option value="0">< 5000</option>
        <option value="5000">5,000</option>
        <option value="10000">10,000</option>
        <option value="20000">20,000</option>
        <option value="30000">30,000</option>a>
        <option value="50000">50,000</option>
        <option value="75000">75,000</option>
        <option value="100000">1 Lac</option>
        <option value="150000">1.5 Lacs</option>
        <option value="200000">2 Lacs</option>
        <option value="500000">5 Lacs</option>
        <option value="1000000">10 Lacs</option>
        <option value="1500000">15 Lacs</option>
        <option value="2000000">20 Lacs</option>
        <option value="2500000">25 Lacs</option>
        <option value="3000000">30 Lacs</option>
        <option value="4000000">40 Lacs</option>
        <option value="5000000">50 Lacs</option>
        <option value="6000000">60 Lacs</option>
        <option value="7500000">75 Lacs</option>
        <option value="9000000">90 Lacs</option>
        <option value="10000000">1 Crore</option>
        <option value="15000000">1.5 Crores</option>
        <option value="20000000">2 Crores</option>
        <option value="30000000">3 Crores</option>
        <option value="30000000">5 Crores</option>
        <option value="100000000">10 Crores</option>
        <option value="200000000">20 Crores</option>
        <option value="300000000">30 Crores</option>
        <option value="400000000">40 Crores</option>
        <option value="500000000">50 Crores</option>
        <option value="600000000">60 Crores</option>
        <option value="700000000">70 Crores</option>
        <option value="800000000">80 Crores</option>
        <option value="900000000">90 Crores</option>
        <option value="1000000000">100 Crores</option>
        <option value="10000000000">100+ Crores</option>
      </select>
    </li>
    <li>
        <label>Location <span class="required">*</span></label>
        <select class="form-control js-example-basic-multiple"  name="short_address" id="short_address" >
            <option value=''>Select Location</option>
            @foreach($locations as $location)
                <option value='{{$location->id}}'>{{$location->name}}</option>
            @endforeach
        </select>
        <!-- <input type="email" name="field3" class="field-long" /> -->
    </li>
    <li>
        <label>Floor <span class="required">*</span></label>
        <select class="form-control js-example-basic-multiple"  name="floor_number" id="floor_number" >
            <option value=''>Select Floors</option>
            <option value='basement'>Basement</option>
            <option value='lower ground floor'>Lower Ground Floor</option>
            <option value='ground floor'>Ground Floor</option>
            <?php
            for ($i=1;$i<100;$i++){
            if ($i==1)
            {$title= 'st';} else if($i==2){$title = 'nd';} else if($i==3){$title = 'rd';} else{$title = 'th';}

                ?>
            <option value='<?php echo $i; ?>'><?php echo $i.$title.' Floor'; ?></option>
            <?php } ?>
        </select>
        <!-- <input type="email" name="field3" class="field-long" /> -->
    </li>
    <li>
        <label>Property Type <span class="required">*</span></label>
        <select class="form-control js-example-basic-multiple"  name="property_type" id="property_type" >
            <option value=''>Select Type</option>
            <option value='1'>Sell</option>
            <option value='2'>Rent</option>
        </select>
        <!-- <input type="email" name="field3" class="field-long" /> -->
    </li>
    <li>
        <label>Building Stage <span class="required">*</span></label>
        <select class="form-control js-example-basic-multiple"  name="building_stage" id="building_stage" >
            <option value=''>Select Stage</option>
            <option value='UC'>Under Construction</option>
            <option value='CMPLT'>Complete</option>
            <option value='BOOK'>Booking</option>
        </select>
        <!-- <input type="email" name="field3" class="field-long" /> -->
    </li>
    
    
    <li>
      <input type="hidden" name="type" value="<?php echo $type ?>">
        <input type="submit" value="Search" />
    </li>
</ul>
{!! Form::close() !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

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

  $("#test-modal").click(function(){
    $("#myModal123").modal('show');
  });
</script>
@endsection







