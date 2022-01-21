<?php

namespace Database\Seeders;

use App\Models\Repartidore;
use Illuminate\Database\Seeder;

class RepartidoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Repartidore::create([
            'name' => 'Jose',
            'user' => 'diego03',
            'email' => 'jose@gmail.com',
            'password' => bcrypt('123456')
        ]);

        Repartidore::create([
            'name' => 'Pelon',
            'user' => 'pelon03',
            'email' => 'pelon@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
