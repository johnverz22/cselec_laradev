<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Job;
use Illuminate\Database\Seeder;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user= \App\Models\User::factory()->create([
            'name' =>' John Doe',
            'email'=>'john@gmail.com'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*Job::create(
            [
                'id' => 1,
                'title' => 'Japanese Software Bridge Developer',
                'tags' => 'MySQL, Javascript, Angular JS, Bootstrap',
                'company'  => 'J-K Network Services',
                'location' => 'Makati, Philippines',
                'email' => 'careers@jkns.com',
                'website' => 'jkns.com',
                'description' => 'This Japanese company has been operating in Manila 
                since 2011 and has expanded their operations in Cebu. 
                They specialise in offsite development, web-based system, 
                cloud computing and mobile application development'
              ]
        );*/
        Job::factory(10)->create([
            'user_id'=>$user->id
        ]);

        //table - (plural) jobs, listings, persons
        //model - (singular) job, listing, person
    }
}
