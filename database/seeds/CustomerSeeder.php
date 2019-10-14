<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Customer::class, 50)->create()->each(function ($user) {
            $user->addresses()->save(factory(App\Models\Address::class)->make());
//            $user->emailAddresses()->save(factory(App\Models\EmailAddress::class)->make())
        });
    }
}
