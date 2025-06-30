<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = Tarefa::orderBy('concluida')->get();
        return Inertia::render('tarefas/index', [
            'tarefas' => $tarefas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('tarefas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'data_vencimento' => 'nullable|date',
            'prioridade' => 'in:alta,media,baixa',
        ]);

        $tarefa = Tarefa::create($validated);
        //return response()->json($tarefa, 201);
        $tarefas = Tarefa::all();
        return Inertia::render('tarefas/index', [
            'tarefas' => $tarefas
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return $tarefa;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return Inertia::render('tarefas/edit', [
            'tarefa' => $tarefa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        $validated = $request->validate([
            'titulo' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'data_vencimento' => 'nullable|date',
            'prioridade' => 'sometimes|in:alta,media,baixa',
            'concluida' => 'sometimes|boolean'
        ]);
        
        $tarefa->update($validated);
        //return response()->json($tarefa);
        $tarefas = Tarefa::orderBy('concluida')->get();
        return Inertia::render('tarefas/index', [
            'tarefas' => $tarefas
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        //return response()->json(null, 204);
        $tarefas = Tarefa::all();
        return Inertia::render('tarefas/index', [
            'tarefas' => $tarefas
        ]);
    }
}
