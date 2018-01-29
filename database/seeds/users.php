<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Miguel',
            'email' => 'mm@gmail.com',
            'password' => bcrypt('rockstars'),
            'unidad' => 'implementación',
            'usuario' => 'mmorei01',
            'telefono' => 4265186451,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $roles = [
            [1,'admin','admin','admin'],
            [2,'supervisor','supervisor','supervisor']
        ];

        foreach($roles as $rol){
            Db::table('roles')->insert([
                'id' => $rol[0],
                'name' => $rol[1],
                'display_name' => $rol[2],
                'description' => $rol[3],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);    
        };

        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
