# Testes Unitários com Pest

Este diretório contém testes unitários escritos para a aplicação utilizando o Pest.

## Testes disponíveis

- `ConcluirTarefaTest.php` –  permite ao utilizador concluir uma tarefa.
- `CreateTarefaTest.php` – verifica que uma nova tarefa pode ser criada e persistida na base de dados.
- `DeleteTarefaTest.php` – garante que uma tarefa pode ser eliminada.
- `EditPaginaTest.php` – garante o retorno da página de edição da tarefa.
- `ErroTarefaInexistente.php` – garante que retorna o erro HTTP 404 quando om utilizador tenta aceder a uma tarefa inexistente.
- `IndexTest.php` - garante o acesso à página index.
- `PrioridadeValidaTest.php` – apenas permite a submissão de um prioridade válida.
- `TituloTarefaTest.php` – valida que é necessário um título ao criar uma tarefa.
- `TarefaNaoConcluidaTest.php` – verifica que as novas tarefas são marcadas como não concluídas por defeito.
- `UpdateTarefaTest.php` – testa a atualização dos dados de uma tarefa existente.
- `ExampleTest.php` – um exemplo simples que assegura que `true` é `true`.

## Executar os testes

Para executar os testes, abre o terminal no diretório da TODO-APP e executa o seguinte comando:

```bash
php artisan test

```

Este comando inicia o ambiente de teste do Laravel e corre automaticamente todas as suites de teste (PHPUnit/Pest) na pasta tests/ apresentando um relatório formatado dos resultados.