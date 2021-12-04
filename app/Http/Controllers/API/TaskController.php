<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tarefas = Task::get();
        return response()->json(['data' => $tarefas ,'message' => "Tasks retrivied succefully"], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        $tarefa = new Task();
        $tarefa->nome = $request->nome;
        $tarefa->descricao = $request->descricao;

        $tarefa->save();

        $data = [
            'id' => $tarefa->id,
            'nome' => $tarefa->nome,
            'descricao' => $tarefa->descricao
        ];

        return response()->json(['data' => $data ,'message' => "Tarefa criada com sucesso"], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tarefa = Task::find($id);
        return response()->json(['data' => $tarefa ,'message' => "Tasks retrivied succefully"], 200);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required'
        ]);

        $tarefa = Task::find($id);
        $tarefa->nome = $request->nome;
        $tarefa->descricao = $request->descricao;

        $tarefa->save();

        $data = [
            'id' => $tarefa->id,
            'nome' => $tarefa->nome,
            'descricao' => $tarefa->descricao
        ];

        return response()->json(['data' => $data ,'message' => "Tarefa actualizada com sucesso"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tarefa = Task::find($id);

        $tarefa->delete();
        return response()->json(['message' => "Tarefa removida com sucesso"], 200);
    }
}
