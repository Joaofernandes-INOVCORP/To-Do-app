<template>
  <div class="max-w-2xl mx-auto p-4 bg-orange-100 rounded-2xl mt-5">
    <h1 class="text-2xl font-bold mb-4">Nova Tarefa</h1>

    <form @submit.prevent="submit">
      <div class="mb-2">
        <label class="block text-sm font-medium">Título da tarefa</label>
        <input v-model="form.titulo" type="text" class="w-full border rounded p-2" />
        <div v-if="form.errors.titulo" class="text-red-500 text-sm">{{ form.errors.titulo }}</div>
      </div>

      <div class="mb-2">
        <label class="block text-sm font-medium">Descrição (opcional)</label>
        <textarea v-model="form.descricao" class="w-full border rounded p-2"></textarea>
      </div>

      <div class="mb-2">
        <label class="block text-sm font-medium">Data de Vencimento (opcional)</label>
        <input v-model="form.data_vencimento" type="date" class="w-full border rounded p-2" />
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium">Prioridade</label>
        <select v-model="form.prioridade" class="w-full border rounded p-2">
          <option value="alta">Alta</option>
          <option value="media">Média</option>
          <option value="baixa">Baixa</option>
        </select>
      </div>

      <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
      <Link href="/tarefas" class="ml-2 text-gray-600">Cancelar</Link>
    </form>
  </div>
</template>

<script setup lang="ts">
import { useForm, Link } from '@inertiajs/vue3';

const form = useForm({
  titulo: '',
  descricao: '',
  data_vencimento: '',
  prioridade: 'media',
});

function submit() {
  form.post('/tarefas');
}
</script>
