<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WaterRate;
use App\Models\Surcharge;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_redirect_to_login_if_the_user_is_unauthenticated_trying_to_access_the_water_rates(){
        $response = $this->get(route('admin.water-rate-get'));
        $response->assertRedirect(route('login'));
    }
    public function test_return_water_rates_if_the_user_is_authenticated(){
        $user = User::factory()->create();
        Artisan::call('migrate:refresh --seed');
        $response = $this->actingAs($user)->get(route('admin.water-rate-get'));

        $data1 = ["id" => 1, "type" => "Residential", "consumption_max_range" => 10, "min_rate" => 65, "excess_rate" => 10];
        $data2 = ["id" => 2, "type" => "Institutional", "consumption_max_range" => 10, "min_rate" => 65, "excess_rate" => 10];
        $data3 = ["id" => 3, "type" => "Commercial", "consumption_max_range" => 10, "min_rate" => 110, "excess_rate" => 15];

        $response->assertJson(['data' => array($data1, $data2,$data3)]);
    }




    public function test_redirect_to_login_if_the_user_is_unauthenticated_trying_to_access_the_surcharge_rates(){
        $response = $this->get(route('admin.surcharge-get'));
        $response->assertRedirect(route('login'));
    }
    public function test_return_surcharge_rate_if_the_user_is_authenticated(){
        $user = User::factory()->create();
        Artisan::call('migrate:refresh --seed');
        $response = $this->actingAs($user)->get(route('admin.surcharge-get'));
        $data = ["id" => 1, "rate" => 0.1];

        $response->assertJson(['data' => array($data)]);
    }
}
