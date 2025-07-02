<?php

use App\Models\Tarefa;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('define o status por defeito como não concluído', function () {
    $task = Tarefa::factory()->create();

    expect($task->concluida)->toBeFalse();
});
