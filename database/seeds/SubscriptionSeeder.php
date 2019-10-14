<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Faker $faker
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $customer = \App\Models\Customer::all()->random(1)->first();
            $widget = \App\Models\Widget::all()->random(1)->first();
            $address = $customer->addresses()->first();

            $sub = new \App\Models\Subscription();
            $sub->expiration_date = $faker->date();
            $sub->frequency = 'weekly';
            $sub->day = 'Monday';
            $sub->day_interval = null;
            $sub->address_id = $address->id;
            $sub->widget_id = $widget->id;
            $sub->customer_id = $customer->id;

            $sub->save();
        }
    }
}
