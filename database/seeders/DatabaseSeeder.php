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
            'title' => 'No One Is Talking About This',
            'store_id' => '1',
            'slug' => 'no-one-is-talking-about-this',
            'price' => '39000',
            'author' => 'Patricia Lockwood',
            'image' => "https://res.cloudinary.com/lezon/image/upload/v1656358267/book-a-book/1_igwbh5.png",
            'description' => 'Fragmentary and omniscient, incisive and sincere, No One Is Talking About This is at once a love letter to the endless scroll and a profound, modern meditation on love, language, and human connection from a singular voice in American literature.',
            'pages' => '222',
            'weight' => '0.4',
            'publisher' => 'SABAK GRIP',
            'stock' => '27',
            'publish_date' => '2021-02-16 19:01:31'
        ]);

        Book::create([
            'title' => 'Falling',
            'store_id' => '1',
            'slug' => 'falling',
            'price' => '135000',
            'author' => 'T.J Newman',
            'image' => "https://res.cloudinary.com/lezon/image/upload/v1656358267/book-a-book/2_o9ujzx.png",
            'description' => 'You just boarded a flight to New York. There are one hundred and forty-three other passengers onboard. What you don’t know is that thirty minutes before the flight your pilot’s family was kidnapped. For his family to live, everyone on your plane must die. The only way the family will survive is if the pilot follows his orders and crashes the plane. Enjoy the flight.',
            'pages' => '303',
            'weight' => '0.8',
            'publisher' => 'SABAK GRIP',
            'stock' => '30',
            'publish_date' => '2021-07-06 19:01:31'
        ]);

        Book::create([
            'title' => 'I Love You But I’ve Chosen Darkness',
            'store_id' => '2',
            'slug' => 'i-love-you-but-ive-chosen-darkness',
            'price' => '180000',
            'author' => 'Claire Vaye Watkins',
            'image' =>"https://res.cloudinary.com/lezon/image/upload/v1656358266/book-a-book/3_behjse.png",
            'description' => 'A darkly funny, soul-rending novel of love in an epoch of collapse - one woman’s furious revisiting of family, marriage, work, sex, and motherhood.',
            'pages' => '150',
            'weight' => '0.4',
            'publisher' => 'SABAK GRIP',
            'stock' => '20',
            'publish_date' => '2021-10-05 19:01:31'
        ]);

         Book::create([
            'title' => 'Virtue',
            'store_id' => '1',
            'slug' => 'virtue',
            'price' => '169000',
            'author' => 'Herminoe Hobby',
            'image' => "https://res.cloudinary.com/lezon/image/upload/v1656358266/book-a-book/4_po5nmi.png",
            'description' => 'In language at once lyrical and incisive, Virtue offers a clear-eyed, unsettling story of the allure of privilege and the costs of complacency, from a writer of astonishing acuity and vision.',
            'pages' => '317',
            'weight' => '0.5',
            'publisher' => 'SABAK GRIP',
            'stock' => '25',
            'publish_date' => '2021-07-20 19:01:31'
        ]);

        Book::create([
            'title' => 'The 1619 Project',
            'store_id' => '1',
            'slug' => 'the-1619-project',
            'price' => '144000',
            'author' => 'Nikole Hannah Jonas',
            'image' => "https://res.cloudinary.com/lezon/image/upload/v1656358266/book-a-book/5_ymqb1z.png",
            'description' => 'This is a book that speaks directly to our current moment, contextualizing the systems of race and caste within which we operate today. It reveals long-glossed-over truths around our nation’s founding and construction—and the way that the legacy of slavery did not end with emancipation, but continues to shape contemporary American life.',
            'pages' => '539',
            'weight' => '0.2',
            'publisher' => 'SABAK GRIP',
            'stock' => '45',
            'publish_date' => '2021-11-16 22:22:22'
        ]);

        Book::create([
            'title' => 'The Other Black Girl',
            'store_id' => '1',
            'slug' => 'the-other-black-girl',
            'price' => '156000',
            'author' => 'Zakiya Dalila Harris',
            'image' => "https://res.cloudinary.com/lezon/image/upload/v1656358266/book-a-book/6_s7in4p.png",
            'description' => 'A whip-smart and dynamic thriller and sly social commentary that is perfect for anyone who has ever felt manipulated, threatened, or overlooked in the workplace, The Other Black Girl will keep you on the edge of your seat until the very last twist.',
            'pages' => '120',
            'weight' => '0.3',
            'publisher' => 'SABAK GRIP',
            'stock' => '21',
            'publish_date' => '2021-06-01 19:01:31'
        ]);

        Book::create([
            'title' => 'Billy Summers',
            'store_id' => '1',
            'slug' => 'billy-summers',
            'price' => '175000',
            'author' => 'Stephen King',
            'image' => "https://res.cloudinary.com/lezon/image/upload/v1656358266/book-a-book/7_aobhcd.png",
            'description' => 'Billy Summers is a man in a room with a gun. He’s a killer for hire and the best in the business. But he’ll do the job only if the target is a truly bad guy. And now Billy wants out. But first there is one last hit. Billy is among the best snipers in the world, a decorated Iraq war vet, a Houdini when it comes to vanishing after the job is done. So what could possibly go wrong?',
            'pages' => '231',
            'weight' => '1.2',
            'publisher' => 'SABAK GRIP',
            'stock' => '70',
            'publish_date' => '2021-08-03 19:01:31'
        ]);

        Book::create([
            'title' => 'Everything And Less',
            'store_id' => '1',
            'slug' => 'everything-and-less',
            'price' => '130000',
            'author' => 'Mark McGURL',
            'image' => "https://res.cloudinary.com/lezon/image/upload/v1656358266/book-a-book/8_xelhwv.png",
            'description' => 'Everything and Less is a hilarious and insightful map of both the commanding heights and sordid depths of fiction, past and present, that opens up an arresting conversation about why it is we read and write fiction in the first place.',
            'pages' => '120',
            'weight' => '0.3',
            'publisher' => 'VERSO',
            'stock' => '19',
            'publish_date' => '2021-10-19 19:01:31'
        ]);

        Book::create([
            'title' => 'Reprieve',
            'store_id' => '1',
            'slug' => 'reprieve',
            'price' => '156000',
            'author' => 'James Hann Matson',
            'image' => "https://res.cloudinary.com/lezon/image/upload/v1656358267/book-a-book/9_lnuv5i.png",
            'description' => 'An astonishingly soulful exploration of complicity and masquerade, Reprieve combines the psychological tension of classic horror with searing social criticism to present an unsettling portrait of this tangled American life.',
            'pages' => '110',
            'weight' => '0.5',
            'publisher' => 'SABAK GRIP',
            'stock' => '7',
            'publish_date' => '2021-10-05 19:01:31'
        ]);

        Book::create([
            'title' => 'A Calling for Charlie Barnes',
            'store_id' => '2',
            'slug' => 'a-calling-for-charlie-barnes',
            'price' => '180000',
            'author' => 'Joshua Ferris',
            'image' => "https://res.cloudinary.com/lezon/image/upload/v1656358266/book-a-book/10_lwvaus.png",
            'description' => 'abcd',
            'pages' => '100',
            'weight' => '0.4',
            'publisher' => 'SABAK GRIP',
            'stock' => '65',
            'publish_date' => '2021-09-28 19:01:31'
        ]);
    }
}
