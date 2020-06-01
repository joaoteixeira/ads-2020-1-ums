<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GrupoUsuario;

class GrupoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = GrupoUsuario::list();

        return view('grupoUsuario.list', array('grupos' => $grupos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grupoUsuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grupos = GrupoUsuario::create($request->all());
        
        return redirect('gruposUsuarios')->with('status', 'Grupo de usuário cadastrado com sucesso!');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = GrupoUsuario::find($id);

        return view ('grupoUsuario.edit', array('grupo' => $grupo));
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
        $grupo = GrupoUsuario::find($id);
        $grupo->update($request->all());

        return redirect('gruposUsuarios')->with('status', 'Grupo de usuários atualizado com sucesso!');
    }

     /**
     * Confirmação se pretende realmente deletar um grupo de usuários.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $grupo = GrupoUsuario::getDataToConfirm($id);
        
        if ($grupo['0']->QTD_USUARIOS > 0) {
            $mensagem = 'Deseja realmente deletar o grupo de usuários '. $grupo['0']->NOME  .' ? Atualmente existem {{ $grupo["0"]->QTD_USUARIOS }} usuários nesse grupo!';    
        } else {
            $mensagem = 'Deseja realmente deletar o grupo de usuários '.  $grupo['0']->NOME  .' ?';
        }

        $grupo = GrupoUsuario::find($id);
        
        return view('grupoUsuario.confirm', array('grupo' => $grupo), array('mensagem' => $mensagem)); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $grupo = GrupoUsuario::find($id);
       $grupo->delete();

       return redirect('gruposUsuarios')->with('sucess', 'Grupo de usuários {$grupo->NOME} deletado com sucesso!');
    }
}
