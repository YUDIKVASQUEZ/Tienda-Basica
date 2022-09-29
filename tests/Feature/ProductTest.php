<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    // /**@test */
    public function test_guardar_product(){
        $response = $this->post('/api/products', [
            'name' => 'arroz',
            'price' => 2000
        ]);

        //vamos a retornar una estructura del producto en formato Json
        $response->assertJsonStructure(["name", "price"])
        ->assertJson(['name'=>'arroz'])
        ->assertStatus(201);//creado

        $this->assertDatabaseHas('products', ['name'=>'arroz', 'price'=>2000]);
    }
}
