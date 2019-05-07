<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Auth;
use DB;
use Session;
use App\City;
use App\State;

class CityController extends Controller
{
    public function index(){
    	$data['cities'] = City::where('status',1)->orderBy('name')->get();
        return view('city/index')->with($data);

    }

    public function create(){
    	$data['states'] = State::where('status',1)->orderBy('name')->get();
        return view('city/create')->with($data);
    	
    }

    public function store(Request $request){

        $this->set_validation('',$request);

        $cities = new City;

        $cities->state_id = $request->state;
        $cities->name = $request->city_name;
        $cities->save();

        return redirect(url('city'));
    	
    }

    public function edit($id){
    	$data['cities'] = City::where('id',$id)->first();
        $data['states'] = State::where('status',1)->orderBy('name')->get();
        return view('city/edit')->with($data);
    }

    public function update(Request $request, $id){
    	 $this->set_validation('',$request);

        $cities = City::find($id);
        $cities->state_id = $request->state;
        $cities->name = $request->city_name;
        $cities->save();

        return redirect(url('city'));
    }

    public function show($id){
    	
    }

    public function set_validation($id=null,$request)
    {
        $message=array(
            "city_name.required"=>"City is required",
            "city_name.min"=>" City must be at least 2 characters.",
            "state.required"=>"Select State",
            
        );

        $this->validate($request,[
            'city_name'=> 'required|min:2',
            'state'=> 'required',
        ],$message);
    }
}
