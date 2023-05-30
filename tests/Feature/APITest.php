<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class APITest extends TestCase
{
    public function test_api_product_returns_a_successful_response(): void
    {
        $response = $this->get('/api/product');

        $response->assertStatus(200);
    }

    public function test_api_customers_returns_a_successful_response(): void
    {
        $response = $this->get('/api/customers');

        $response->assertStatus(200);
    }

    public function test_api_orders_returns_a_successful_response(): void
    {
        $response = $this->get('/api/orders');

        $response->assertStatus(200);
    }
   
}
