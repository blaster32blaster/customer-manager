<?php

use Illuminate\Database\Seeder;

class EmailAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\EmailAddress::class, 50)->create();
    }
}
