<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(users::class);
        $this->call(listas::class);
        //$this->call(bitacoras::class);
    }
}
