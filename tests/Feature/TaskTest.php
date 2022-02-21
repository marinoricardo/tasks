<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;

class TaskTest extends TestCase
{

    /**
     * testar se ao  submeter um POST em /api/tarefas, junto de um array com nome e descricao de uma tarefa,
     * a tarefa é craida com sucesso
     * e a chamada retorna um array com a estrutura
     * [data => [id,nome,descricao],mesangem ]
     */
    public function test_successfully_create_task()
    {
        $faker = Factory::create();

        $dummyTask = [
            'nome' => $faker->name(),
            'descricao' => $faker->text(),
        ];

        $response = $this->json('POST', 'api/tarefas', $dummyTask);

        $response->assertStatus(200);
        $response->assertJsonPath('data.nome', $dummyTask['nome']);
        $response->assertJsonPath('data.descricao', $dummyTask['descricao']);
        $response->assertJsonStructure(['data' => ['id', 'nome', 'descricao'], 'message']);
    }

    /**
     * testar se ao  submeter um POST em /api/tarefas, SEM um array com nome e descricao de uma tarefa,
     * o servido retorna um erro
     */
    public function test_error_when_creating_task_without_name_and_description()
    {
        $response = $this->json('POST', 'api/tarefas');
        $response->assertStatus(422);
        $response->assertJsonStructure(['errors' => ['nome', 'descricao'], 'message']);
    }



}
