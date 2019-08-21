<?php

namespace App\Http\Controllers;

use Validator;
use Exception;
use App\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Retorna todos os usuários cadastrados no banco de dados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Buscando os usuários cadastrados ordenando pela última data de atualização.
        $dados = Usuario::orderBy('updated_at', 'desc')->get();

        return response()->json($dados, 200);
    }

    /**
     * Mostra os detalhes de um determinado usuário.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        // Buscando o usuário solicitado.
        $dados = Usuario::find($usuario);

        return response()->json($dados, 200);
    }

    /**
     * Cadastra um novo usuário.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Usuario $usuario, Request $request)
    {
        // Regras de validação.
        $validator = Validator::make($request->all(), [
            'usu_nome'            => 'required|max:80',
            'usu_cpf'             => 'required',
            'usu_email'           => 'required|email',
            'usu_mae'             => 'max:60',
            'usu_pai'             => 'max:60',
            'usu_data_nascimento' => 'required|date',
            'usu_telefone'        => 'numeric',
            'usu_cep'             => 'required|numeric',
            'usu_logradouro'      => 'required|max:60',
            'usu_numero'          => 'max:20',
            'usu_complemento'     => 'max:20',
            'usu_bairro'          => 'required|max:20',
            'usu_cidade'          => 'required|max:35',
        ]);

        // Realiza a validação das regras.
        if ($validator->fails())
            return response()->json(['mensagem' => 'Problemas na validação das informações recebidas.', 'erros' => $validator->errors()], 409);

        // Cadastro no banco de dados.
        $usuario->create($request->all());

        return response()->json(['mensagem' => 'Usuário criado com sucesso.'], 200);
    }

    /**
     * Atualiza informações de um usuário cadastrado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Usuario $usuario, Request $request)
    {
        // Regras de validação.
        $validator = Validator::make($request->all(), [
            'usu_codigo'          => 'required|numeric',
            'usu_nome'            => 'required|max:80',
            'usu_cpf'             => 'required',
            'usu_email'           => 'required|email',
            'usu_mae'             => 'max:60',
            'usu_pai'             => 'max:60',
            'usu_data_nascimento' => 'required|date',
            'usu_telefone'        => 'numeric',
            'usu_cep'             => 'required|numeric',
            'usu_logradouro'      => 'required|max:60',
            'usu_numero'          => 'max:20',
            'usu_complemento'     => 'max:20',
            'usu_bairro'          => 'required|max:20',
            'usu_cidade'          => 'required|max:35',
        ]);

        // Realiza a validação das regras.
        if ($validator->fails())
            return response()->json(['mensagem' => 'Problemas na validação das informações recebidas.', 'erros' => $validator->errors()], 409);

        // Buscando o usuário e salvando as alterações.
        $usuario = Usuario::find($request->usu_codigo);
        $usuario->fill($request->all());
        $usuario->save();

        return response()->json(['mensagem' => 'Usuário alterado.'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        // Buscando um usuário cadastrado.
        if ($usuario->destroy($usuario->usu_codigo))
            return response()->json(['mensagem' => 'Usuário excluído.'], 200);
    }
}
