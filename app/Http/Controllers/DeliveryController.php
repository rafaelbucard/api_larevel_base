<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    public function show(){
        $array = ['error'=>''];
        $allDelivery = Delivery::all();
    
        if($allDelivery) {
            $array['alldelivery'] = $allDelivery;
        
        } else {
       $array['error']='Nem um delivery encontrado';  }
        return $array;
    }

    

    public function store(Request $request){
        $array = ['error'=> ''];
        
        $validator = Validator::make($request->all(),[
 
            'id_day'=> 'required',
            'type_delivery'=> 'required',
            'user_name'=> 'required',
            'client'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'created_at'=> 'required',
            'delivery_data'=> 'required',
            'status'=> 'required'
            
        ]);

        if(!$validator->fails()) {
            $id_day = $request->input('id_day');
            $type_delivery = $request->input('type_delivery');
            $user_name = $request->input('user_name');
            $client = $request->input('client');
            $description = $request->input('description');
            $price =  $request->input('price');
            $created_at =  $request->input('created_at');
            $delivery_data = $request->input('delivery_data');
            $status = $request->input('status');
          


            $newDelivery = new Delivery();
            $newDelivery->id_day = $id_day;
            $newDelivery->description = $description;
            $newDelivery->created_at = $created_at;
            $newDelivery->user_name = $user_name;
            $newDelivery->type_delivery = $type_delivery;
            $newDelivery->client = $client;
            $newDelivery->price = $price;
            $newDelivery->delivery_data = $delivery_data;
            $newDelivery->status = $status;
            $newDelivery->save();
            return response()
            ->json(array(
                'success' => true, 'last_insert_id' => $newDelivery->id,'user' => $newDelivery->delivery_data, 
            ), 200);;
            
        } else {

           $array['error'] = $validator->errors()->first();
           return $array;
        } 
    }

    public function update(Request $request, $id) {

        $array = ['error'=>''];

        $validator = Validator::make($request->all(),[
 
            'id_day'=> 'required',
            'type_delivery'=> 'required',
            'user_name'=> 'required',
            'client'=> 'required',
            'description'=> 'required',
            'price'=> 'required',
            'created_at'=> 'required',
            'delivery_data'=> 'required',
            'status'=> 'required'
            
        ]);
        
        if(!$validator->fails() && Delivery::find($id)) {
            $id_day = $request->input('id_day');
            $type_delivery = $request->input('type_delivery');
            $user_name = $request->input('user_name');
            $client = $request->input('client');
            $description = $request->input('description');
            $price =  $request->input('price');
            $created_at =  $request->input('created_at');
            $delivery_data = $request->input('delivery_data');
            $status = $request->input('status');

            

        
            
            $delivery = Delivery::find($id);
            $delivery->id_day = $id_day;
            $delivery->description = $description;
            $delivery->created_at = $created_at;
            $delivery->user_name = $user_name;
            $delivery->type_delivery = $type_delivery;
            $delivery->client = $client;
            $delivery->price = $price;
            $delivery->delivery_data = $delivery_data;
            $delivery->status = $status;
            $delivery->save();
            
        
            return   $array['delivery'] = $delivery;
        } else {
            return $array['error'] = "id não encontrado";
        }    
}

    public function destroy($id) {
        $array = ['error'=>''];
        $deliveryUser = Delivery::find($id);
        if($deliveryUser){
            $array ['delivery'] = 'Deletado delivery';
            $deliveryUser->delete();
        } else {
            $array['error'] = 'Id não encontrado';
        }
      return $array;
    }
}
