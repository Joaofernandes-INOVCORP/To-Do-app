<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('consegue criar tarefa', function () {
    $data = [
        'titulo' => 'Nova tarefa',
        'descricao' => 'Descricao teste',
        'data_vencimento' => now()->toDateString(),
        'prioridade' => 'alta',
    ];

    $response = $this->post('/tarefas', $data);

    $response->assertSessionHasNoErrors();
    $this->assertDatabaseHas('tarefas', [
        'titulo' => 'Nova tarefa',
    ]);
});