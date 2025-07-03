<?php

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('permite concluir uma tarefa', function () {
    $tarefa = Tarefa::factory()->create(['concluida' => false]);

    $response = $this->put('/tarefas/' . $tarefa->id, [
        'concluida' => true,
    ]);

    $response->assertSessionHasNoErrors();
    $this->assertDatabaseHas('tarefas', [
        'id' => $tarefa->id,
        'concluida' => true,
    ]);
});