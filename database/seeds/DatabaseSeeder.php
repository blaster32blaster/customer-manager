<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CustomerSeeder::class);
        $this->call(WidgetSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(EmailAddressSeeder::class);
    }
}
