<template>
  <div class="max-w-3xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Tarefas</h1>

    <Link href="/tarefas/create" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nova Tarefa</Link>

    <div v-if="tarefas.length === 0">Sem tarefas ainda!</div>

    <ul class="bg-orange-100 rounded-2xl p-5">
      <li v-for="tarefa in tarefas" :key="tarefa.id" class="border-b py-2 px-3"
        :class="tarefa.concluida ? 'bg-emerald-200' : ''">
        <div class="flex justify-between items-center">
          <span :class="[tarefa.concluida ? 'line-through' : '', 'w-1/3']">
            {{ tarefa.titulo }}
          </span>
          <Link :href="'/tarefas/' + tarefa.id + '/edit'"
            class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block" v-show="!tarefa.concluida">edit</Link>
          <button class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block cursor-pointer"
            @click="deleteTask(tarefa.id)">delete</button>
          <button class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block cursor-pointer"
            v-show="!tarefa.concluida" @click="finishTask(tarefa.id)">finish</button>

          <span class="text-sm">Prioridade: {{ tarefa.prioridade }}</span>
        </div>
      </li>
    </ul>
  </div>
</template>

<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3';

defineProps<{
  tarefas: Array<{
    id: number,
    titulo: string,
    prioridade: string,
    concluida: boolean
  }>
}>();

const deleteTask = (id: number) => {
  const form = useForm({});
  form.delete('/tarefas/' + id)
}

const finishTask = (id: number) => {
  const form = useForm({
    concluida: true
  });
  form.put('/tarefas/' + id)
}
</script>
