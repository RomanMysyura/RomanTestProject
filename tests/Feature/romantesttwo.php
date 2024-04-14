<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\Crud;

class GetCrudDataTest extends TestCase
{

    public function test_get_crud_data(): void
    {

        DB::beginTransaction();

        try {

            $response = $this->get('/getData');

            $response->assertOk();

          
            DB::commit();
        } catch (\Exception $e) {

            DB::rollback();
            throw $e;
        }
    }
}
