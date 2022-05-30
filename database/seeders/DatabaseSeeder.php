<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Role::create ([
            'role_name' => 'SuperAdmin'
        ]);

        Role::create ([
            'role_name' => 'Admin'
        ]);

        Store::create ([
            'store_name' => 'Anggrek',
            'store_address' => 'Jl. Kebon Jeruk Raya No. 27, Kebon Jeruk Jakarta Barat 11530',
            'store_telephone' => '(62-21) 123 1111',
            'slug' => 'anggrek'
        ]);

        Store::create ([
            'store_name' => 'Kijang',
            'store_address' => 'Jl. Kebon Jeruk Raya No. 27, Kebon Jeruk Jakarta Barat 11530',
            'store_telephone' => '(62-21) 123 1111',
            'slug' => 'kijang'
        ]);

        User::create ([
            'role_id' => '1',
            'store_id' => '0',
            'name' => 'SuperAdmin',
            'slug' => 'superadmin',
            'email' => 'leonard.zonaphan@binus.ac.id',
            'phone_number' => '0',
            'password' => bcrypt('asd')
        ]);

        User::create ([
            'role_id' => '1',
            'store_id' => '0',
            'name' => 'Leo',
            'slug' => 'leo',
            'email' => 'lezon@gmail.com',
            'phone_number' => '081290558001',
            'password' => bcrypt('asd')
        ]);

        User::create ([
            'role_id' => '2',
            'store_id' => '1',
            'name' => 'Jojo',
            'slug' => 'jojo',
            'email' => 'jojo@gmail.com',
            'phone_number' => '085129394831',
            'password' => bcrypt('asd')
        ]);

        User::create ([
            'role_id' => '2',
            'store_id' => '2',
            'name' => 'Karin',
            'slug' => 'karin',
            'email' => 'karin@gmail.com',
            'phone_number' => '085129394834',
            'password' => bcrypt('asd')
        ]);

        // $table->string('store_name')->unique();
        //     $table->string('store_address');
        //     $table->string('store_telephone');


    }
}
