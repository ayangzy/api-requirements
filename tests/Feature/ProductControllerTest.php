<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    private $products;
    public function setUp(): void
    {
        parent::setUp();
        $this->products = Product::factory()->create()->toArray();
    }
   
    public function testFetchAllProducts()
    {
        $response = $this->get('/api/products', $this->products);
        $response->assertStatus(200);
    }

    public function testFilterProductByCategory()
    {
        $response = $this->get('/api/products?category=insurance', $this->products);
        $response->assertStatus(200);
    }
}
