<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('nao permite a submissão de um prioridade inválida', function () {
    $response = $this->post('/tarefas', [
        'titulo' => 'Tarefa invalida',
        'prioridade' => 'invalida',
    ]);

    $response->assertSessionHasErrors('prioridade');
});