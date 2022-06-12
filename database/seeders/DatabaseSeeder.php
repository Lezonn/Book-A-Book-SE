<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use App\Models\Store;
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

        Role::create ([
            'role_name' => 'Customer'
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

        User::create ([
            'role_id' => '3',
            'store_id' => '0',
            'name' => 'cus',
            'slug' => 'cus',
            'email' => 'cus@gmail.com',
            'phone_number' => '12312',
            'password' => bcrypt('asd')
        ]);

        Book::create([
            'title' => 'The 1619 Project',
            'store_id' => '1',
            'slug' => 'the-1619-project',
            'price' => '120000',
            'author' => 'Nikole Hannah Jonas',
            'image' => null,
            'description' => 'abcd',
            'pages' => '100',
            'weight' => '0.2',
            'publisher' => 'SABAK GRIP',
            'stock' => '5',
            'publish_date' => '2022-02-02 22:22:22'
        ]);

        Book::create([
            'title' => 'Everything And Less',
            'store_id' => '2',
            'slug' => 'everything-and-less',
            'price' => '92000',
            'author' => 'Mark McGURL',
            'image' => null,
            'description' => 'abcd',
            'pages' => '120',
            'weight' => '0.3',
            'publisher' => 'VERSO',
            'stock' => '9',
            'publish_date' => '2022-02-02 19:01:31'
        ]);

        Book::create([
            'title' => 'No One Is Talking About This',
            'store_id' => '1',
            'slug' => 'no-one-is-talking-about-this',
            'price' => '95000',
            'author' => 'Patricia Lockwood',
            'image' => null,
            'description' => 'abcd',
            'pages' => '150',
            'weight' => '0.4',
            'publisher' => 'SABAK GRIP',
            'stock' => '7',
            'publish_date' => '2022-02-02 19:01:31'
        ]);

        // $table->string('title');
        // $table->string('slug')->unique();
        // $table->int('price');
        // $table->string('author');
        // $table->string('image')->nullable();
        // $table->text('description');

        // $table->int('pages');
        // $table->string('publisher');
        // $table->string('weight');
        // $table->timestamp('publish_date');

        // $table->string('store_name')->unique();
        //     $table->string('store_address');
        //     $table->string('store_telephone');


    }
}
