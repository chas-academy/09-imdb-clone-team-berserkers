<?php

use App\Person;
use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::create(array(
            'id' => 1,
            'first_name' => 'Kit',
            'last_name' => 'Harrington'
        ));

        Person::create(array(
            'id' => 2,
            'first_name' => 'Arnold',
            'last_name' => 'Schwarzenegger'
        ));

        Person::create(array(
            'id' => 3,
            'first_name' => 'James',
            'last_name' => 'Cameron'
        ));
    }
}
