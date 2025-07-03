<?php

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('retorna a página de edit da tarefa', function () {
    $tarefa = Tarefa::factory()->create();

    $response = $this->get('/tarefas/' . $tarefa->id . '/edit');

    $response->assertStatus(200);
});