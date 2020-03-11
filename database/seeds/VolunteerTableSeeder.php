<?php

use Illuminate\Database\Seeder;

class VolunteerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Models\Volunteer::class,100)->create();
    }
}
