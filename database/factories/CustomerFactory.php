<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        $firstName = $this->faker->firstName($gender);
        $lastName = $this->faker->lastName;
        $middleName = $this->faker->optional()->firstName($gender);
        $type = $this->faker->randomElement(['residential', 'commercial']);
        $barangay=$this->faker->randomElement(['Agay-ay',
        'Basak',
        'Bobon A',
        'Bobon B',
        'Dayanog',
        'Garrido',
        'Minoyho',
        'Osao',
        'Pong-oy',
        'San Jose',
        'San Roque',
        'San Vicente',
        'Santa Cruz',
        'Santa Filomena',
        'Santo Niño',
        'Somoje',
        'Sua',
        'Timba']);
        $establishment_name=null;
        if($type=='commercial'){
            $establishment_name= $this->faker->optional()->company;
        }

        return [
            'account_number' => $this->faker->unique()->numerify('####'),
            'firstname' => $firstName,
            'middlename' => $middleName,
            'lastname' => $lastName,
            'civil_status' => $this->faker->randomElement(['single', 'married', 'widowed']),
            'purok' => $this->faker->numerify('Purok ##'),
            'setio' => $this->faker->numerify('Setio ##'),
            'barangay' => $barangay,
            'contact_number' => $this->faker->numerify('09#########'),
            'type' =>$type,
            'status' => $this->faker->randomElement(['active', 'disconnected', 'cut']),
            'establishment_name' =>$establishment_name,
            'latitude' =>$this->faker->latitude(10.2645300, 10.26457600),
            'longitude' =>$this->faker->longitude(125.1707716, 125.1751918),
            'meter_number' => $this->faker->numerify('M####'),
        ];
    }  
}
