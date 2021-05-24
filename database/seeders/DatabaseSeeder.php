<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('day')->insert([
            'user_name'=> 'Rafael Buçard',
            'description'=> 'Sexta',
            'created_at'=> date('Y-m-d H:i:s') 
        ]);
        DB::table('day')->insert([
            'user_name'=> 'Buçard',
            'description'=> 'Natal',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('day')->insert([
            'user_name'=> 'Jorge Nunes',
            'description'=> 'Sábado',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('day')->insert([
            'user_name'=> 'Nunes',
            'description'=> 'Dia das mães',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        DB::table('day')->insert([
            'user_name'=> 'Rafael Buçard',
            'description'=> 'Quarta',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        

        
        DB::table('delivery')->insert([
            'id_day'=> 1,
            'type_delivery'=> 'prédio',
            'user_name'=> 'Rafael Buçard',
            'client'=> 'Jorge Nunes',
            'description'=> 'Endereço tal e tal / contato 9882345/ Deixar na portaría',
            'price'=> '000,00',
            'created_at'=> date('Y-m-d H:i:s'),
            'delivery_data'=> "2021-05-17 03:18:04",
            'status'=> 'n'
        ]);
        DB::table('delivery')->insert([
            'id_day'=> 1,
            'type_delivery'=> 'prédio',
            'user_name'=> 'Rafael Buçard',
            'client'=> 'Jorge Nunes',
            'description'=> 'Endereço tal e tal / contato 9882345/ Deixar na portaría',
            'price'=> '000,00',
            'created_at'=> date('Y-m-d H:i:s'),
            'delivery_data'=> "2021-05-17 03:18:04",
            'status'=> 'n'
        ]);
        DB::table('delivery')->insert([
            'id_day'=> 2,
            'type_delivery'=> 'prédio',
            'user_name'=> 'Rafael Buçard',
            'client'=> 'Jorge Nunes',
            'description'=> 'Endereço tal e tal / contato 9882345/ Deixar na portaría',
            'price'=> '000,00',
            'created_at'=> date('Y-m-d H:i:s'),
            'delivery_data'=> "2021-05-17 03:18:04",
            'status'=> 'n'
        ]);
        DB::table('delivery')->insert([
            'id_day'=> 2,
            'type_delivery'=> 'prédio',
            'user_name'=> 'Rafael Buçard',
            'client'=> 'Jorge Nunes',
            'description'=> 'Endereço tal e tal / contato 9882345/ Deixar na portaría',
            'price'=> '000,00',
            'created_at'=> date('Y-m-d H:i:s'),
            'delivery_data'=> "2021-05-17 03:18:04",
            'status'=> 'n'
        ]);
        DB::table('delivery')->insert([
            'id_day'=> 3,
            'type_delivery'=> 'prédio',
            'user_name'=> 'Rafael Buçard',
            'client'=> 'Jorge Nunes',
            'description'=> 'Endereço tal e tal / contato 9882345/ Deixar na portaría',
            'price'=> '000,00',
            'created_at'=> date('Y-m-d H:i:s'),
            'delivery_data'=> "2021-05-17 03:18:04",
            'status'=> 'n'
        ]);
        DB::table('delivery')->insert([
            'id_day'=> 3,
            'type_delivery'=> 'prédio',
            'user_name'=> 'Rafael Buçard',
            'client'=> 'Jorge Nunes',
            'description'=> 'Endereço tal e tal / contato 9882345/ Deixar na portaría',
            'price'=> '000,00',
            'created_at'=> date('Y-m-d H:i:s'),
            'delivery_data'=> "2021-05-17 03:18:04",
            'status'=> 'n'
        ]);

        

       



        
        
    }
}
