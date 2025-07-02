<?php

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('faz delete de uma tarefa', function () {
    $tarefa = Tarefa::factory()->create();

    $response = $this->delete('/tarefas/' . $tarefa->id);

    $response->assertSessionHasNoErrors();
    $this->assertDatabaseMissing('tarefas', [
        'id' => $tarefa->id,
    ]);
});