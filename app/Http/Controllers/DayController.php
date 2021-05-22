<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Day;
use App\Models\User;

class DayController extends Controller
{
    public function show(){
        $array = ['error'=>''];
        $allDay = Day::all();
       // var_dump($depositUser);exit;
        if($allDay) {
            $array['allday'] = $allDay;
        
        } else {
       $array['error']='Nem um dia encontrado';  }
        return $array;
    }

    

    public function store(Request $request){
        $array = ['error'=> ''];
        
        $validator = Validator::make($request->all(),[
 
            'user_name'=> 'required',
            'description'=> 'required',
            'created_at'=> 'required' 
        
        ]);

        if(!$validator->fails()) {
            $user_name = $request->input('user_name');
            $description = $request->input('description');
            $created_at =  $request->input('created_at');

            $newDay = new Day();
            $newDay->user_name = $user_name;
            $newDay->description = $description;
            $newDay->created_at = $created_at;
            $newDay->save();
            return response()
            ->json(array(
                'success' => true, 'last_insert_id' => $newDay->id,'user' => $newDay->user_name, 
            ), 200);;
            
        } else {

           $array['error'] = $validator->errors()->first();
           return $array;
        } 
    }

    public function update(Request $request, $id) {
        $array = ['error'=>''];
        $user_name = $request->input('user_name');
        $description = $request->input('description');
        $created_at =  $request->input('created_at');
        
        $day = day::find($id);
        $day->user_name = $user_name;
        $day->description = $description;
        $day->created_at = $created_at;
        
        $day->save();
       return   $array['day'] = $day;
}

    public function destroy($id) {
        $array = ['error'=>''];
        $dayUser = Day::find($id);
        if($dayUser){
            $array ['day'] = 'Deletado dia';
            $dayUser->delete();
        } else {
            $array['error'] = 'Id não encontrado';
        }
      return $array;
    }
}
