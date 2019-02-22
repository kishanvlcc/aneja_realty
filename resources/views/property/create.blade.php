@extends('layouts.admin_body')
@section('title')
@endsection

@section('body')

    <style>



    </style>
    <div class="container">
        <!-- start: PAGE HEADER -->
        {{--<div class="row">
            <div class="col-sm-12">
                <!-- start: STYLE SELECTOR BOX -->

                <!-- end: STYLE SELECTOR BOX -->
                <!-- start: PAGE TITLE & BREADCRUMB -->
                <ol class="breadcrumb">
                    <li>
                        <i class="clip-home-3"></i>
                        <a href="">
                            Home
                        </a>
                    </li>

                    <li >
                        <a href="">
                            Property List
                        </a>
                    </li>

                    <li class="active">
                        Add Property
                    </li>

                </ol>

                <div class="page-header">
                    <h1>Property <small>Add </small></h1>
                </div>
                <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
        </div>--}}
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
                        {!! Form::open(array('route'=>'property.store','id'=>'add-broker-form','class' => 'form','novalidate' => 'novalidate', 'files' => true)) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Title') !!}<span class="red">*</span>
                                    {!! Form::text('title','',["id"=>'firstname',"class"=>"form-control" ]) !!}

                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Commercial/Residential') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="available_for" id="available_for" onchange="getData(this.value,'property_types','property_type_areas','available_type','id','type_name','id','property_type_id')">
                                        <option value=''>Select Avaibility</option>
                                        @foreach($types as $type)

                                            <option value='{{$type->id}}'>{{$type->name}}</option>
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
                                        <option value='<?php echo $i ?>'><?php echo $i; ?></option>
                                        <?php } ?>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Floor Number') !!}
                                    <select class="form-control js-example-basic-multiple"  name="floor_number" id="total_floors" >
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
                                </div>
                            </div>


                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Client Name') !!}<span class="red">*</span>
                                    {!! Form::text('client_name','',["id"=>'client_name',"class"=>"form-control" ]) !!}
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Client Mobile') !!}<span class="red">*</span>
                                    {!! Form::text('client_mobile','',["id"=>'client_mobile',"class"=>"form-control" ]) !!}
                                </div>
                            </div>



                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Client Email') !!}<span class="red"></span>
                                    {!! Form::text('client_email','',["id"=>'client_email',"class"=>"form-control" ]) !!}
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Building Stage') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="building_stage" id="building_stage" >
                                        <option value=''>Select Stage</option>
                                        <option value='UC'>Under Construction</option>
                                        <option value='CMPLT'>Complete</option>
                                        <option value='BOOK'>Booking</option>
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

                                            <option value='{{$builtUpArea->id}}'>{{$builtUpArea->name}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Built Up Size') !!}<span class="red">*</span>
                                    {!! Form::text('built_up_size','',["id"=>'built_up_size',"class"=>"form-control","placeholder"=>"Enter Built Up Size" ]) !!}

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            
                            <div class="col-md-6" id="bedrooms">
                                <div class="form-group">
                                    {!! Form::label('Bedrooms') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="bedrroms" id="bedroom" >
                                        <option value=''>Select Bedrooms</option>
                                        <option value='0'>1 Room Set</option>
                                        <?php
                                        for ($i=1;$i<100;$i++){ ?>
                                        <option value='<?php echo $i; ?>' @if (old('i') == $i) selected="selected" @endif><?php echo $i; ?> BHK</option>
                                       <?php } ?>

                                    </select>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Commercial/Residential Type') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="available_type" id="available_type" >
                                        <option value=''>Select Type</option>
                                    </select>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Rent Price') !!}<span class="red">*</span>
                                    {!! Form::text('rent_price','',["id"=>'rent_price',"class"=>"form-control","placeholder"=>"Enter Price For Rent" ]) !!}

                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Flat Facing') !!}<span class="red"></span>

                                    <select class="form-control js-example-basic-multiple"  name="flat_face" id="flat_face" >
                                        <option value=''>Select Facing</option>
                                        <option value='East Facing'>East Facing</option>
                                        <option value='South Facing'>South Facing</option>
                                        <option value='West Facing'>West Facing</option>
                                        <option value='North Facing'>North Facing</option>
                                        <option value='North East Facing'>North East Facing</option>
                                        <option value='South East Facing'>South East Facing</option>
                                        <option value='South West Facing'>South West Facing</option>
                                        <option value='North West Facing'>North West Facing</option>

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
                                        <option value='Under Construction'>Under Construction</option>
                                        <option value='New Construction'>New Construction</option>
                                        <?php for($i=1;$i<100;$i++) { ?>
                                        <option value='<?php echo $i ?>'><?php echo $i; ?> Year Old Constructions</option>
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
                                            <option value='{{$location->id}}'>{{$location->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Flooring') !!}
                                    {!! Form::text('flooring','',["id"=>'flooring',"class"=>"form-control","placeholder"=>"Like : Marble" ]) !!}

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('No Of Toilet') !!}
                                    <select class="form-control js-example-basic-multiple"  name="flat_cofiguration" id="flat_cofiguration" >
                                        <option value=''>Select Toilet</option>
                                        <?php for($i=1;$i<=10;$i++) { ?>
                                        <option value='<?php echo $i ?>'><?php echo $i; ?></option>
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
                                    <option value='<?php echo $i ?>'><?php echo $i; ?></option>
                                    <?php } ?>

                                </select>

                            </div>

                            <div class="col-md-6">
                                {!! Form::label('Property Type') !!}

                                <select class="form-control js-example-basic-multiple"  name="property_type" id="property_type" >
                                    <option value=''>Select Type</option>
                                    <option value='1'>Sell</option>
                                    <option value='2'>Rent</option>
                                </select>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Description') !!}<span class="red">*</span>
                                    {!! Form::textarea('description','',["id"=>'description',"class"=>"form-control","placeholder"=>"Enter Description About Property" ]) !!}

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('Complete Address') !!}
                                    {!! Form::textarea('complete_address','',["id"=>'complete_address',"class"=>"form-control","placeholder"=>"Enter Complete Address" ]) !!}
                                </div>
                            </div>

                        </div>
                        <div class="form-group margin-top">
                            {!! Form :: submit("Save",["class"=>"btn btn-primary ","name"=>"submit"]) !!}
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
            var _URL = window.URL || window.webkitURL;
            $("#file-es").change(function (e) {

            var file, img;
            if ((file = this.files[0])) {
            img = new Image();
            img.onload = function () {

            width = this.width;
            height = this.height;
            var token=$("#token-value").val();

            var file_data = document.getElementById("file-es");
            var initial_file_total=$("#total-file").val();
            var  len=  file_data.files.length;
            $("#total-file").val(parseInt(len)+parseInt(initial_file_total));
            var new_file_total=parseInt($("#total-file").val());
            var img_name=$("#image-name").val();

            if(parseInt(new_file_total) > parseInt(5)){
            alert('Image size should not be more than five');
            $("#total-file").val(parseInt(new_file_total)-parseInt(len));
            }
            else{

            var formdata = new FormData();
            var   i=0,file = new Array();
            for (i=0; i < len; i++)
            {
            file[i] = file_data.files[i];
            formdata.append("files["+i+"]", file[i]);
            }
            formdata.append("_token",token);



            $.ajax({
            url: "{{ url('fileUpload') }}",
            type: "POST",
            dataType:'json',
            data: formdata,
            processData: false,
            contentType: false,

            beforeSend: function() {
            $("#ajax-loader").show();
            },
            success: function(res) {
            //alert(res)
            $.each(res,function(i,item)
            {
            var k=Math.floor((Math.random() * 10000000000000) + 1);
            $('#uploadimage').append('<div class="item"><img class="uploadimage item" id="image-item-'+k+'" src="{{url('public/property/')}}'+'/'+item+'" style="width:60px;height:60px;margin:2px;"><a href="javascript:void(0)" class="close"  onclick="removeimage('+k+')">X</a></div>');
            img_name=img_name+','+item;
            });
            $("#image-name").val(img_name);
            if($("#total-file").val()>0){

            $("#choose-file").attr('style','display:none;');
            $("#add-more-file").attr('style','display:inline-block;');
            }

            },

            complete:function(data){

            $("#ajax-loader").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
            });

            }

            //}
            };
            img.src = _URL.createObjectURL(file);
            }
            });


            function removeimage(id)
            {
            var img=$('#image-item-'+id).attr('src').split('/').pop();
            var edit=$('#image-item-'+id).attr('rel');
            var image_name= $("#image-name").val();
            var token=$("#token-value").val();


            /*var id1=0;
            if(edit=="edit"){
            id1=$('#hiddenvalue').val();
            }*/
            $.ajax({
            url:"{{ url('fileDelete') }}",
            type:"post",
            data:{img:img,'_token':token},
            dataType:"json",
            success:function(res){
            if(res.success)
            $('#image-item-'+id).parent().remove();
            $("#total-file").val(parseInt($("#total-file").val())-parseInt(1));
            var new_img_name=image_name.replace(","+img, "");
            $("#image-name").val(new_img_name);
            var new_total=$("#total-file").val();
            //alert(new_total);
            if(new_total==0 || new_total=='0'){
            $("#file-es").val('');
            $("#add-more-file").attr('style','display:none;');
            $("#choose-file").attr('style','display:inline-block;');


            }

            }
            });
            }


            $(document).ready(function () {

                $("#available_for").change(function () {

                    if($(this).val()=='2'){

                        $("#bedrooms").attr('style','display:none;');

                    }
                    else {

                        $("#bedrooms").attr('style','display:block;');
                    }

                });



                $("#add-broker-form").validate({
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