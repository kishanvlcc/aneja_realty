@extends('layouts.admin_body')
@section('title')
Details
@endsection



@section('body')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Property Detail </h1>
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  {{--<img class="profile-user-img img-fluid img-circle"
                       src="../../dist/img/user4-128x128.jpg"
                       alt="User profile picture">--}}
                </div>

                <h3 class="profile-username text-center">{{$details->user_name}}</h3>

               
              </div>
              <!-- /.card-body -->
            </div>
          
          </div>
          <!-- /.col -->
         <div class="col-md-9">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">     
                  <div class="container-fluid">
              </div>
                        <div class="row">
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                    <label class="col-xs-5 control-label">Title : </label>
                                  <div class="col-xs-7 controls">{{$details->title}}</div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Property Type :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Total Floors :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>  
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Floor Number :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Built Up Area :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Built Up Size :</label>
                                  <div class="col-xs-7 controls"> </div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                            <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Bedrooms :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Commercial/Residential Type :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Rent Price :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                           <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Flat Facing :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                            <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Property Age :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                            <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Location :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          
                        </div>
                        <div class="card-header p-2"></div><br>

                      {{--  <h3>BANK DETAILS</h3><br>
                        <div class="row">
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Pan No  :</label>
                                  <div class="col-xs-7 controls"> </div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Pf No  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Pf Uan  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Esi No  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Aadhar No  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Bank  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Bank Account No  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Ifsc Code  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                             <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Beneficery Name(as per bank detail)  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                        </div>--}}
                        <div class="card-header p-2"></div><br>
                        {{--<h3>OFFICE DETAILS</h3><br>
                        <div class="row">
                             <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Employee Type  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Business Unit  :</label>
                                  <div class="col-xs-7 controls"> </div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Center  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Department  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Reporting Manager  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Date Of Joining  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Salary*(In CTC per annum)  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                           <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Salary(Fixed per annum)  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Salary(Variable per annum)  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>                          
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">State  :</label>
                                 <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Location  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Band  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Level  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Official Email  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>  
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Parmanent Address  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                          <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Parmanent City :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                           <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Parmanent State  :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div>
                           <div class="col-sm-6">
                                <div class="row mgbt-xs-0">
                                  <label class="col-xs-5 control-label">Parmanent Pin Code :</label>
                                  <div class="col-xs-7 controls"></div>
                                  <!-- col-sm-10 --> 
                                </div>
                          </div> 
                        </div>--}}
                         
                  </div>
                
                 
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
   
@endsection