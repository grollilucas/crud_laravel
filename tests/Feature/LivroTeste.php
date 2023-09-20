<?php

namespace Tests\Feature;

use App\Models\Livros;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LivroTeste extends TestCase
{
    use RefreshDatabase;
    public function test_admin_can_store_new_product()
    {
        $admin = User::factory()->create(['is_admin' => 1]);
        $response = $this->actingAs($admin)->post('/livros', [
            'nome' => 'Apple',
            'autor' => 'Fruit',
            'registro_biblioteca' => 5
        ]);
        // dd($response->getContent());
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/livros');
        $this->assertCount(1, Livros::all());
        $this->assertDatabaseHas('livros', ['nome' => 'Apple', 'autor' => 'Fruit', 'registro_biblioteca' => 5]);
    }

     public function test_admin_can_see_the_edit_product_page()
    {
         $admin = User::factory()->create(['is_admin' => 1]);
         $product = Livros::factory()->create();
         $response = $this->actingAs($admin)->get('/livros/' . $product->id . '/edit');
         $response->assertStatus(200);
         $response->assertSee($product->name);
     }

     public function test_admin_can_update_product()
     {
         $admin = User::factory()->create(['is_admin' => 1]);
         Livros::factory()->create();
         $this->assertCount(1, Livros::all());
         $product = Livros::first();
         $response = $this->actingAs($admin)->put('/livros/' . $product->id, [
             'nome'  => 'Updated Product',
             'autor' => 'Test',
             'registro_biblioteca' => 5
         ]);
         $response->assertSessionHasNoErrors();
         $response->assertRedirect('/livros');
         $this->assertEquals('Updated Product', Livros::first()->name);
         $this->assertEquals('Test', Livros::first()->autor);
        $this->assertEquals(5, Livros::first()->registro_biblioteca);
     }

     public function test_admin_can_delete_product()
     {
        $admin = User::factory()->create(['is_admin' => 1]);
        $product =  Livros::factory()->create();
        $this->assertEquals(1, Livros::count());
         $response = $this->actingAs($admin)->delete('/livros/' . $product->id);
         $response->assertStatus(302);
         $this->assertEquals(0, Livros::count());
     }
}
