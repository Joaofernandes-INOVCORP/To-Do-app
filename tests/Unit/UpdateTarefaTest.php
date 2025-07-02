<?php

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('faz update à tarefa', function () {
    $tarefa = Tarefa::factory()->create(['titulo' => 'Old title']);

    $response = $this->put('/tarefas/' . $tarefa->id, [
        'titulo' => 'Updated title',
    ]);

    $response->assertSessionHasNoErrors();
    $this->assertDatabaseHas('tarefas', [
        'id' => $tarefa->id,
        'titulo' => 'Updated title',
    ]);
});

