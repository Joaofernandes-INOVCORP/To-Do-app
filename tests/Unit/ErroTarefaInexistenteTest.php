<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('returns 404 for a non-existent task', function () {
    $response = $this->get('/tarefas/999999');

    $response->assertStatus(404);
});