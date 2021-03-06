@extends('layouts.admin_body')
@section('title')
@endsection

@section('body')

    <style>



    </style>
    <div class="container">
        
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
                        {!! Form::model($cities,['route'=>['city.update',$cities->id],'method'=>'patch','class' => 'form','novalidate' => 'novalidate', 'files' => true,'id'=>'edit-city-form']) !!}

                        <div class="row">
                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('State') !!}<span class="red">*</span>
                                    <select class="form-control js-example-basic-multiple"  name="state" id="state">
                                        <option value=''>Select State</option>
                                        @foreach($states as $state)

                                            <option value='{{$state->id}}' @if($cities->state_id==$state->id){{'selected'}} @endif>{{$state->name}}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('City') !!}<span class="red">*</span>
                                    {!! Form::text('city_name',$cities->name,["id"=>'city',"class"=>"form-control" ]) !!}

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
            var _URL = window.URL || window.webkitURL;
           
            $(document).ready(function () {

                
                $("#edit-city-form").validate({
                    rules: {


                        state: {
                            required: true
                        },
                        city_name: {
                            required: true,
                            minlength: 2
                        }
                    },
                    messages: {
                        city_name: "Enter city name min 2 character",
                        state: "Please select state"

                    },
                    

                });



            });



    </script>


    @endsection