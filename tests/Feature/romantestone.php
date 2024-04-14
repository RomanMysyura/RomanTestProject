<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\Crud;

class CreateCrudTest extends TestCase
{
    public function test_create_crud(): void
    {
        
        DB::beginTransaction();

        try {
           
            $response = $this->post('/crear-crud', ['name' => 'Text prueba']);

            $response->assertRedirect('/');

            $this->assertDatabaseHas('cruds_table', ['name' => 'Text prueba']);

            DB::commit();
        } catch (\Exception $e) {
            
            DB::rollback();
            throw $e;
        }
    }
}
