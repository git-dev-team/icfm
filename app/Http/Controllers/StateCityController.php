<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StateModel;
use App\Models\CityModel;
class StateCityController extends Controller
{
    public function get_state(){
        $states = new StateModel();
        $data = $states->all();
        return response()->json($data);
    }
    public function get_city(Request $request){
        $city = new CityModel();
        if(isset($request->state_id)){
            $data = $city->where('state_id',$request->state_id)->get();
            return response()->json($data);
        }else{
            $data = $city->all();
            return response()->json($data);
        }
    }
}
