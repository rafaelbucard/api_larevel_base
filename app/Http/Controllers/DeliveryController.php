<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use App\Models\Delivery;
use App\Models\User;

class DeliveryController extends Controller
{
    public function balanceUser($id){
        $array = ['error'=>''];
        $balanceUser = Delivery::where('id_user',$id)->get();
       //var_dump($balanceUser);exit;
        if($balanceUser) {
            $array['balance'] = $balanceUser;
        
        } else {
       $array['error']='Id não encontrado';  }
        return $array;
    }

    public function getId($id, $id_balance) {
        $array = ['error'=>''];
        $balanceUser = Delivery::find($id_balance);
        $user = User::find($id);
       
        if($balanceUser->id_user == $user->id) {
            $array['balance'] = $balanceUser;
        
        } else {
       $array['error']='Id e usuário não batem';  }

        return $array;

    }

    public function insert(Request $request, $id){
        $array = ['error'=> ''];

        $user = User::find($id)->count();
        if($user>0){
        $validator = Validator::make($request->all(),[
 
            'values' =>'required'
        
        ]);

        if(!$validator->fails()) {
            $id_user = $id;
            $value = $request->input('values');
           


            $newBalance = new Delivery();
            $newBalance->id_user = $id_user;
            $newBalance->values = $value;
            $newBalance->save();
            return response()
            ->json(array(
                'success' => true, 'last_insert_id' => $newBalance->id,'user' => $newBalance->id_user, 'value'=>$newBalance->values
            ), 200);;
           
           
        } else {

           $array['error'] = $validator->errors()->first();
           return $array;
        }
    
        return  $array['error'] = 'Deposito não encontrado';
      }  
        
      
    }

    public function sumsId($id){
        $array = ['error'=>''];
        $sums = 0;
        $balanceUser = Delivery::where('id_user',$id)->get();
       //var_dump($balanceUser);exit;
        if($balanceUser) {
            foreach($balanceUser as $item) {

                $sums += floatval($item->values);
                
            }
          
            
            $array['balancesums'] = $sums;
        
        } else {
       $array['error']='Id não encontrado';  }
        return $array;
    }

    public function delete($id) {
        $array = ['error'=>''];
        $balanceUser = Delivery::find($id);
        if($balanceUser){
            $array ['balance'] = 'Deletado balanço';
            $balanceUser->delete();
        } else {
            $array['error'] = 'Id não encontrado';
        }
      return $array;
    }
}
