<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Listing;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);

        
        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

    //     Listing::create([
    //         'user_id' => $user->id,
    //         'title' => 'Laravel Senior Developer', 
    //         'tags' => 'laravel,javascript',
    //         'company' => 'Acme Corp',
    //         'location' => 'Boston, MA',
    //         'email' => 'email1@email.com',
    //         'website' => 'https://www.acme.com',
    //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
    //     ]);

    //     Listing::create([
    //         'title' => 'Full-Stack Engineer',
    //         'tags' => 'laravel,backend,api',
    //         'company' => 'Wyane Department',
    //         'location' => 'South Africa, ZA',
    //         'email' => 'email2@email.com',
    //         'website' => 'https://www.wyane.com',
    //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
    //     ]);
    //     Listing::create([
    //         'title' => 'Backend Developer',
    //         'tags' => 'PHP,backend,api',
    //         'company' => 'Stark Industries',
    //         'location' => 'Nigeria, NG',
    //         'email' => 'email2@email.com',
    //         'website' => 'https://www.starkindustries.com',
    //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
    //     ]);
    //     Listing::create([
    //         'title' => 'Frontend Developer',
    //         'tags' => 'angular,frontend,vue',
    //         'company' => 'Smoke Up',
    //         'location' => 'South Africa, SA',
    //         'email' => 'email2@email.com',
    //         'website' => 'https://www.smokeup.com',
    //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
    //     ]);
    //     Listing::create([
    //         'title' => 'Mobile App Developer',
    //         'tags' => 'mobile,flutter',
    //         'company' => 'Cholatrek Institute',
    //         'location' => 'Nigeria, NG',
    //         'email' => 'email2@email.com',
    //         'website' => 'https://www.cholatrek.com',
    //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
    //     ]);
    //     Listing::create([
    //         'title' => 'UI/UX Designer',
    //         'tags' => 'UI/UX,figma,adobe',
    //         'company' => 'Adobe',
    //         'location' => 'New York, NY',
    //         'email' => 'email2@email.com',
    //         'website' => 'https://www.adobe.com',
    //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam minima et illo reprehenderit quas possimus voluptas repudiandae cum expedita, eveniet aliquid, quam illum quaerat consequatur! Expedita ab consectetur tenetur delensiti?'
    //     ]);
     }
}
