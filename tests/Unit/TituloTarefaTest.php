<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('precisa de título', function () {
    $response = $this->post('/tarefas', [
        'titulo' => '',
    ]);

    $response->assertSessionHasErrors('titulo');
});