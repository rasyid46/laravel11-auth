<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Todo;
class TodoTest extends TestCase
{
    /**
     * test create todo
     *
     * @return void
     */
    public function testCreateTodo()
    {
        $token = 'bearer '.auth()->tokenById(1);
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->post('/api/todo', [
            'name' => 'Testing Feature Test',
            'description' => 'Todo Feature Test Description',
            'due_date' => '2024-05-05',
        ]);
        $response->assertStatus(201);
    }

    /**
     * testing get all todo data
     *
     * @return void
     */
    public function testListTodo()
    {
        $token = 'bearer '.auth()->tokenById(1);
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->get('/api/todo');
        $response->assertStatus(200);
    }

    /**
     * testing detail todo data
     *
     * @return void
     */
    public function testDetailTodo()
    {
        $id = Todo::select('id')->orderBy('created_at', 'desc')->limit(1)->first()->id;
        $token = 'bearer '.auth()->tokenById(1);
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->get('/api/todo/'.$id);
        $response->assertStatus(200);
    }

    /**
     * testing update todo data
     *
     * @return void
     */
    public function testUpdateTodo()
    {
        $id = Todo::select('id')->orderBy('created_at', 'desc')->limit(1)->first()->id;
        $token = 'bearer '.auth()->tokenById(1);
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->put('/api/todo/'.$id, [
            "name"=>"update feature api",
            "description"=>"create basic api",
            "due_date"=>"2024-05-05",
            "status"=> true

         ]);
        $response->assertStatus(200);
    }

    /**
     * feature delete todo data
     *
     * @return void
     */
    public function testDeleteTodo()
    {
        $id = Todo::select('id')->orderBy('created_at', 'desc')->limit(1)->first()->id;
        $token = 'bearer '.auth()->tokenById(1);
        $response = $this->withHeaders([
            'Authorization' => $token,
        ])->delete('/api/todo/'.$id);
        $response->assertStatus(200);
    }
}
