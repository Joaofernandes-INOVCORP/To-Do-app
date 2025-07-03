<?php

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('garante o acesso à página index', function () {
    Tarefa::factory()->count(2)->create();

    $response = $this->get('/tarefas');

    $response->assertStatus(200);
});