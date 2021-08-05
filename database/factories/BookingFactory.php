<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Parking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeThisYear('+1 month');
        $endingDate = strtotime('+1 Week', $startDate->getTimestamp());
        return [
            'auto_brand' => '',
            'parking_number_id' => Parking::factory()->create()->id,
            'checkin_date' => $startDate->format('Y-m-d H:i:s'),
            'checkout_date' => date('Y-m-d H:i:s', $endingDate),
            'customer_id' => Customer::factory()->create()->id,
            'price' => $this->faker->numberBetween(200, 500)
        ];
    }
}
