@extends('layouts.admin_body')
@section('title')
@endsection

@section('body')

    <div class="container">
        <!-- start: PAGE HEADER -->
        <div class="row">
            <div class="col-sm-12">

                <div class="page-header">
                    <h1>Property <small>Update </small></h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>
        <!-- end: PAGE HEADER -->
        <!-- start: PAGE CONTENT -->

        <div class="row">
            <div class="col-sm-12">
                <!-- start: TEXT FIELDS PANEL -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-external-link-square"></i> Text Fields
                        <div class="panel-tools">

                            <a href="#" class="btn btn-xs btn-link panel-collapse collapses">
                            </a>

                            <a href="#" class="btn btn-xs btn-link panel-refresh">
                                <i class="fa fa-refresh"></i>

                            </a>
                            <a href="#" class="btn btn-xs btn-link panel-expand">
                                <i class="fa fa-resize-full"></i>
                            </a>

                        </div>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger ">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="panel-body">
                        <!--form class="form-horizontal" role="form"-->
                        {!! Form::model($properties,['route'=>['property.update',$properties->id],'method'=>'patch','class' => 'form','novalidate' => 'novalidate', 'files' => true,'id'=>'update-property-form']) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Title') !!}<span class="red">*</span>
                                    {!! Form::text('title',$properties->title,["id"=>'firstname',"class"=>"form-control" ]) !!}
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Commercial/Residential') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="available_for" id="available_for" onchange="getData(this.value,'property_types','property_type_areas','available_type','id','type_name','id','property_type_id')">
                                        <option value=''>Select Avaibility</option>
                                        @foreach($types as $type)

                                            <option value='{{$type->id}}' @if($properties->available_for==$type->id){{'selected'}} @endif>{{$type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Total Floors In Building/Kothi') !!}<span class="red">*</span>

                                    <select class="form-control js-example-basic-multiple"  name="total_floors" id="total_floors" >
                                        <option value=''>Select Total Floor</option>
                                        <?php for($i=1;$i<=100;$i++) { ?>
                                        <option value='<?php echo $i ?>' @if($i==$properties->total_floors) {{'selected'}} @endif><?php echo $i; ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Floor Number') !!}<select class="form-control js-example-basic-multiple"  name="floor_number" id="floor_number" >
                                        <option value=''>Select Floors</option>
                                        <option value='basement' @if($properties->floor_number=='basement') {{'selected'}} @endif>Basement</option>
                                        <option value='lower ground floor' @if($properties->floor_number=='lower ground floor') {{'selected'}} @endif>Lower Ground Floor</option>
                                        <option value='ground floor' @if($properties->floor_number=='ground floor') {{'selected'}} @endif>Ground Floor</option>
                                        <?php
                                        for ($i=1;$i<100;$i++){
                                        if ($i==1)
                                        {$title= 'st';} else if($i==2){$title = 'nd';} else if($i==3){$title = 'rd';} else{$title = 'th';}

                                        ?>
                                        <option value='<?php echo $i; ?>' @if($i==$properties->floor_number) {{'selected'}} @endif><?php echo $i.$title.' Floor'; ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Client Name') !!}<span class="red">*</span>
                                    {!! Form::text('client_name',$properties->client_name,["id"=>'client_name',"class"=>"form-control" ]) !!}
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Client Mobile') !!}<span class="red">*</span>
                                    {!! Form::text('client_mobile',$properties->client_mobile_number,["id"=>'client_mobile',"class"=>"form-control" ]) !!}
                                </div>
                            </div>



                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Client Email') !!}<span class="red"></span>
                                    {!! Form::text('client_email',$properties->client_email,["id"=>'client_email',"class"=>"form-control" ]) !!}
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Building Stage') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="building_stage" id="building_stage" >
                                        <option value=''>Select Stage</option>
                                        <option value='UC' @if($properties->building_stage=='UC'){{'selected'}} @endif>Under Construction</option>
                                        <option value='CMPLT' @if($properties->building_stage=='CMPLT'){{'selected'}} @endif>Complete</option>
                                        <option value='BOOK' @if($properties->building_stage=='BOOK'){{'selected'}} @endif>Booking</option>
                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Built Up Area') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="built_area_type" id="built_area_type" >
                                        <option value=''>Select Built Up Type</option>
                                        @foreach($builtUpAreas as $builtUpArea)

                                            <option value='{{$builtUpArea->id}}' @if($properties->area_type_id==$builtUpArea->id){{'selected'}} @endif>{{$builtUpArea->name}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Built Up Size') !!}<span class="red">*</span>
                                    {!! Form::text('built_up_size',$properties->built_up_size,["id"=>'built_up_size',"class"=>"form-control","placeholder"=>"Enter Built Up Size" ]) !!}

                                </div>
                            </div>

                        </div>



                        <div class="row">

                            
                            <?php
                            if ($properties->available_for==1){

                                $display = 'block';
                            }
                            else{
                                $display = 'none';
                            }

                            ?>
                            <div class="col-md-6" id="bedrooms" style="display:<?php echo $display ?>">
                                <div class="form-group">
                                    {!! Form::label('Bedrooms') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="bedrroms" id="bedroom" >
                                        <option value=''>Select Bedrooms</option>
                                        <option value='0' <?php if ($properties->bedrooms=='0') {echo 'selected';} ?>>1 Room Set</option>
                                        <?php
                                        for ($i=1;$i<100;$i++){ ?>
                                        <option value='<?php echo $i; ?>' @if($i==$properties->bedrooms) {{'selected'}} @endif ><?php echo $i; ?> BHK</option>
                                       <?php } ?>

                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Commercial/Residential') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="available_type" id="available_type" >
                                        <option value=''>Select Avaibility</option>
                                        @foreach($PropertyAreaTypes as $PropertyAreaType)

                                            <option value='{{$PropertyAreaType->id}}' @if($properties->property_type_area_id==$PropertyAreaType->id){{'selected'}} @endif>{{$PropertyAreaType->type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Rent Price') !!}<span class="red">*</span>
                                    {!! Form::text('rent_price',$properties->rent_price,["id"=>'rent_price',"class"=>"form-control","placeholder"=>"Enter Price For Rent" ]) !!}

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Flat Facing') !!}<span class="red"></span>

                                    <select class="form-control js-example-basic-multiple"  name="flat_face" id="flat_face" >
                                        <option value=''>Select Facing</option>
                                        <option value='East Facing' @if($properties->buiilding_face=='East Facing'){{'selected'}} @endif>East Facing</option>
                                        <option value='South Facing' @if($properties->buiilding_face=='South Facing'){{'selected'}} @endif>South Facing</option>
                                        <option value='West Facing' @if($properties->buiilding_face=='West Facing'){{'selected'}} @endif>West Facing</option>
                                        <option value='North Facing' @if($properties->buiilding_face=='North Facing'){{'selected'}} @endif>North Facing</option>
                                        <option value='North East Facing' @if($properties->buiilding_face=='North East Facing'){{'selected'}} @endif>North East Facing</option>
                                        <option value='South East Facing' @if($properties->buiilding_face=='South East Facing'){{'selected'}} @endif>South East Facing</option>
                                        <option value='South West Facing' @if($properties->buiilding_face=='South West'){{'selected'}} @endif>South West Facing</option>
                                        <option value='North West Facing' @if($properties->buiilding_face=='North West Facing'){{'selected'}} @endif>North West Facing</option>

                                    </select>

                                 </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Property Age') !!}

                                    <select class="form-control js-example-basic-multiple"  name="property_age" id="property_age" >
                                        <option value=''>Select Age</option>
                                        <option value='Under Construction' @if($properties->property_age=='Under Construction'){{'selected'}} @endif>Under Construction</option>
                                        <option value='New Construction' @if($properties->property_age=='New Construction'){{'selected'}} @endif>New Construction</option>
                                        <?php for($i=1;$i<100;$i++) { ?>
                                        <option value='<?php echo $i ?>' @if($properties->property_age==$i){{'selected'}} @endif><?php echo $i; ?> Year Old Constructions</option>

                                        <?php } ?>
                                    </select>
                              </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Location') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="short_address" id="short_address" >
                                        <option value=''>Select Location</option>
                                        @foreach($locations as $location)
                                            <option value='{{$location->id}}' @if($properties->short_address==$location->id) {{'selected'}} @endif>{{$location->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Flooring') !!}
                                    {!! Form::text('flooring',$properties->flooring,["id"=>'flooring',"class"=>"form-control","placeholder"=>"Like : Marble" ]) !!}

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('No Of Toilet') !!}

                                    <select class="form-control js-example-basic-multiple"  name="flat_cofiguration" id="flat_cofiguration" >
                                        <option value=''>Select Toilet</option>
                                        <?php for($i=1;$i<=10;$i++) { ?>
                                        <option value='<?php echo $i ?>' @if($properties->flat_configuration==$i){{'selected'}} @endif><?php echo $i; ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Form::label('Total Parking') !!}

                                <select class="form-control js-example-basic-multiple"  name="total_park" id="total_park" >
                                    <option value=''>Select Parking</option>
                                    <?php for($i=1;$i<=20;$i++) { ?>
                                    <option value='<?php echo $i ?>' @if($properties->total_parking==$i){{'selected'}} @endif><?php echo $i; ?></option>
                                    <?php } ?>

                                </select>

                                </div>
                                <div class="col-md-6">
                                {!! Form::label('Property Type') !!}

                                <select class="form-control js-example-basic-multiple"  name="property_type" id="property_type" >
                                    <option value=''>Select Type</option>
                                    <option value='1' @if($properties->property_type==1){{'selected'}} @endif>Sell</option>
                                    <option value='2' @if($properties->property_type==2){{'selected'}} @endif>Rent</option>
                                </select>

                            </div>


                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Description') !!}<span class="red">*</span>
                                    {!! Form::textarea('description',$properties->description,["id"=>'description',"class"=>"form-control","placeholder"=>"Enter Description About Property" ]) !!}

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Complete Address') !!}
                                    {!! Form::textarea('complete_address',$properties->complete_address,["id"=>'complete_address',"class"=>"form-control","placeholder"=>"Enter Complete Address" ]) !!}
                                </div>
                            </div>

                        </div>


                        <div class="form-group margin-top">
                            {!! Form :: submit("Update",["class"=>"btn btn-primary ","name"=>"submit"]) !!}
                            <hr>
                            <p><span class="red">*</span> - Required Fields.</p>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                    </div>
                </div>
                <!-- end: TEXT FIELDS PANEL -->
            </div>
        </div>

@endsection

@section('script')
    <script>

            $(document).ready(function () {

                $("#available_for").change(function () {

                    if($(this).val()=='2'){

                        $("#bedrooms").attr('style','display:none;');

                    }
                    else {

                        $("#bedrooms").attr('style','display:block;');
                    }

                });



                $("#update-property-form").validate({
                    rules: {


                        title: {
                            required: true,
                            minlength: 2
                        },
                        bedrroms: {
                            required: true,
                        },
                        client_name: {
                            required: true,
                        },
                        client_mobile: {
                            required: true,
                            digits :true,
                            minlength: 10
                        },
                        client_email: {
                            email: true,
                        },
                        building_stage: {
                            required: true
                        },

                        total_floors: {
                            required: true,

                        },
                        available_for: {
                            required: true

                        },
                        available_type:{
                            required:true
                        },
                        rent_price: {
                            required: true,
                            digits :true

                        },
                        short_address: {
                            required: true
                        },
                        description: {
                            required: true,
                            minlength: 10
                        }


                    },
                    /*messages: {
                     title: "Enter property title min 2 character",
                     bedrroms: "Please select bedrooms",
                     total_floors: "Please select total bedrooms",
                     available_for: "Please select residential/commercial",
                     available_type: "Please select residential/commercial type",
                     /!*rent_price: "Enter rent amount",*!/
                     short_address: "Select property location",
                     description: "Enter desccription in min 10 character"


                     },*/
                    /*errorPlacement: function (error, element) {
                     if (element.attr("type") == "checkbox") {
                     error.insertAfter($('.question'));
                     } else {
                     error.insertAfter(element);
                     //error.insertBefore(element);
                     }
                     }*/

                });



            });




    </script>


    @endsection