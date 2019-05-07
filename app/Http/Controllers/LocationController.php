<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Auth;
use DB;
use Session;
use App\PropertyLocation;
use App\City;
use App\State;

class LocationController extends Controller
{
    public function index(){

    	$data['locations'] = PropertyLocation::where('status',1)->orderBy('name')->get();
        return view('location/index')->with($data);

    }

    public function create(){
    	$data['states'] = State::where('status',1)->orderBy('name')->get();
        return view('location/create')->with($data);
    	
    }

    public function store(Request $request){
    	$this->set_validation('',$request);

        $locations = new PropertyLocation;

        $locations->state_id = $request->state;
        $locations->city_id = $request->city;
        $locations->name = $request->location;
        $locations->save();

        return redirect(url('location'));
    }

    public function edit($id){
    	$data['locations'] = PropertyLocation::where('id',$id)->first();
        $data['states'] = State::where('status',1)->orderBy('name')->get();
        $data['cities'] = City::where('status',1)->where('state_id',$data['locations']->state_id)->orderBy('name')->get();
        return view('location/edit')->with($data);
    }

    public function update(Request $request, $id){
    	$this->set_validation('',$request);

        $locations = PropertyLocation::find($id);
        $locations->state_id = $request->state;
        $locations->city_id = $request->city;
        $locations->name = $request->location;
        $locations->save();

        return redirect(url('location'));
    }

    public function show($id){
    	
    }

    public function set_validation($id=null,$request)
    {
        $message=array(
            "location.required"=>"City is required",
            "location.min"=>" City must be at least 2 characters.",
            "state.required"=>"Select State",
            "city.required"=>"Select City",
            
        );

        $this->validate($request,[
            'location'=> 'required|min:2',
            'state'=> 'required',
            'city'=> 'required',
        ],$message);
    }
}
