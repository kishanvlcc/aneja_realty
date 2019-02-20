<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $totalResidence = Property::where('available_for','1')->count();
        $totalCommercial = Property::where('available_for','2')->count();
    	return view('dashboard',compact('totalResidence','totalCommercial'));
    }

    public function getData(Request $request)
    {
        if($request) {
            $table=$request->table;
            $mappingTable=$request->maptable;
            $cond=$request->value;
            $joinColumn=$request->joincolumn;
            $selectColumn=$request->selectcolumn;
            $whereColumn=$request->wherecolumn;
            $secondjoin=$request->secondjoincolumn;
            $selectedOption=$request->selectedOption;

            $values= DB::table($table)
                ->join($mappingTable, $table.'.'.$joinColumn, '=', $mappingTable.'.'.$secondjoin)
                ->select($mappingTable.'.'.'id',$mappingTable.'.'.$selectColumn)
                ->where($table.'.'.$whereColumn,$cond)
                ->get();

            $option='<option value="">Select</option>';

            foreach ($values as $value ) {
                $option .='<option value="'.$value->id.'" '.(($selectedOption==$value->id)?'selected':'').'>'.$value->$selectColumn.'</option>';
            }
            echo $option;
        }
    }
}
