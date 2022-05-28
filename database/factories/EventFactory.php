<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $deviceValueArray = [
            ['Tunylek Husova', 'husova'],
            ['Gorazdova', 'gorazdova']
        ];

        $deviceValue = $this->faker->randomElement($deviceValueArray);

        return [
            'datetime' => $this->faker->dateTimeInInterval('-1 week', '+1 week'),
            'server' => 'KamerySP02',
            'device' => $deviceValue[0],
            'event_type' => 'GenericEvent',
            'value' => $deviceValue[1],
        ];
    }
}
