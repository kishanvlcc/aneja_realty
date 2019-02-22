<?php

namespace App\Http\Controllers;

use App\PropertyLocation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\AreaType;
use App\PropertyType;
use App\Property;
use App\PropertyTypeArea;
use Input;
use Auth;
use DB;
use Session;

class PropertyController extends Controller
{
    public function index(Request $request){

        $type = $request->type;
        if ($type == 'residence'){
            $available_for = '1';
        } else {
            $available_for = '2';
        }
        $data['properties'] = Property::where('user_id',Auth::User()->id)->where('available_for',$available_for)->where('status','1')->orderBy('created_at','DESC')->get();
        return view('property/index')->with($data);
    }

    public function create(){

        $data['locations'] = PropertyLocation::where('status',1)->orderBy('name')->get();
        $data['builtUpAreas'] = AreaType::where('status',1)->get();
        $data['types'] = PropertyType::where('status',1)->get();
        return view('property/create')->with($data);
    }

    public function store(Request $request) {

        $this->set_validation('',$request);

        $propertyCode = $booking_id = 'PR' . time();

        $properties = new Property;

        $properties->user_id = Auth::User()->id;
        $properties->title = $request->title;
        $properties->property_code = $propertyCode;
        $properties->bedrooms = $request->bedrroms;
        $properties->total_floors = $request->total_floors;
        $properties->floor_number = $request->floor_number;
        $properties->client_name = $request->client_name;
        $properties->client_email = $request->client_email;
        $properties->client_mobile_number = $request->client_mobile;
        $properties->building_stage = $request->building_stage;
        $properties->available_for = $request->available_for;
        $properties->property_type_area_id = $request->available_type;
        $properties->area_type_id = $request->built_area_type;
        $properties->built_up_size = $request->built_up_size;
        $properties->rent_price = $request->rent_price;
        $properties->total_parking = $request->total_park;
        $properties->buiilding_face = $request->flat_face;
        $properties->property_age = $request->property_age;
        $properties->short_address = $request->short_address;
        $properties->flooring = $request->flooring;
        $properties->flat_configuration = $request->flat_cofiguration;
        $properties->description = $request->description;
        $properties->complete_address = $request->complete_address;
        $properties->property_type = $request->property_type;
        $properties->created_by = Auth::User()->id;
        $properties->updated_by = Auth::User()->id;


        $properties->save();

        if ($request->available_for==1){
            $type = 'residence';
        } else {
            $type = 'commercial';
        }

        return redirect(url('property?type='.$type));

    }

    public function edit($id)
    {
        $data['properties'] = Property::where('id',$id)->first();
        $data['locations'] = PropertyLocation::where('status',1)->orderBy('name')->get();
        $data['types'] = PropertyType::where('status',1)->get();
        $data['builtUpAreas'] = AreaType::where('status',1)->get();
        $data['PropertyAreaTypes'] = PropertyTypeArea::where('status',1)->where('property_type_id',$data['properties']['available_for'])->get();
        return view('property/edit')->with($data);

    }

    public function update(Request $request, $id)
    {
        $this->set_validation('',$request);

        $properties = Property::find($id);
        $properties->title = $request->title;
        $properties->bedrooms = $request->bedrroms;
        $properties->total_floors = $request->total_floors;
        $properties->floor_number = $request->floor_number;
        $properties->client_name = $request->client_name;
        $properties->client_email = $request->client_email;
        $properties->client_mobile_number = $request->client_mobile;
        $properties->building_stage = $request->building_stage;
        $properties->available_for = $request->available_for;
        $properties->property_type_area_id = $request->available_type;
        $properties->area_type_id = $request->built_area_type;
        $properties->built_up_size = $request->built_up_size;
        $properties->rent_price = $request->rent_price;
        $properties->total_parking = $request->total_park;
        $properties->buiilding_face = $request->flat_face;
        $properties->property_age = $request->property_age;
        $properties->short_address = $request->short_address;
        $properties->flooring = $request->flooring;
        $properties->flat_configuration = $request->flat_cofiguration;
        $properties->description = $request->description;
        $properties->complete_address = $request->complete_address;
        $properties->updated_by = Auth::User()->id;
        $properties->total_file = $request->total_file;

        $properties->save();

        if ($request->available_for==1){
            $type = 'residence';
        } else {
            $type = 'commercial';
        }

        return redirect(url('property?type='.$type));

    }

    public function show($id) {
        $details = DB::table('properties As pr')
            -> leftjoin ('property_types As pt','pt.id','=','pr.available_for')
            -> leftjoin ('property_type_areas As pta', 'pta.id','=', 'pr.property_type_area_id')
            -> leftjoin ('users As u', 'u.id', '=', 'pr.user_id')

            ->select('pr.*','pt.name As property_type','pta.type_name As property_type_area','u.name As user_name')
            ->where('pr.id','=',$id)->first();
        return view('property/show',compact('details'));
    }


    public function set_validation($id=null,$request)
    {
        $message=array(
            "title.required"=>"Title Name is required",
            "title.min"=>" Title name must be at least 2 characters.",
            //"bedrroms.required"=>" Bedrooms is required.",
            "total_floors.required"=>" Total floor is required.",
            "total_floors.numeric"=>" Total floor counting should be numeric.",
            "available_for.required"=>"Select the property avaibility",
            "rent_price.required"=>"Rent price is required.",
            "rent_price.numeric"=>"Rent price should be numeric",
            "short_address.required"=>"Short Address is required.",
            "description.required"=>"Description is required.",
            "description.min"=>"Description must be atleast ten character",


        );

        $this->validate($request,[
            'title'=> 'required|min:2',
            //'bedrroms'=> 'required',
            'total_floors'=> 'required|numeric',
            'available_for'=> 'required',
            'rent_price'=> 'required|numeric',
            'short_address'=> 'required',
            'description'=> 'required|min:10',
        ],$message);
    }
}
