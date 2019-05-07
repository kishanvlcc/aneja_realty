<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Auth;
use DB;
use Session;
use App\State;

class StateController extends Controller
{
    public function index(){
    	$data['states'] = State::where('status',1)->orderBy('name')->get();
        return view('state/index')->with($data);

    }

    public function create(){
    	
    }

    public function store(Request $request){
    	
    }

    public function edit($id){
    	
    }

    public function update(Request $request, $id){
    	
    }

    public function show($id){

    }
}
