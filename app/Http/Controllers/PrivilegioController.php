<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sgbd;
use App\Privilegio;

class PrivilegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $privilegios = Privilegio::list();

        return view('privilegio.list', array('privilegios' => $privilegios));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sgbds = Sgbd::All();
        return view('privilegio.create', array('sgbds' => $sgbds));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $privilegio = Privilegio::where('NOME', $request->NOME)->get();
        
        if (count($privilegio) > 0) {
            return redirect('privilegios')->with('error', 'O privilégio '. $privilegio[0]->NOME  .' já está cadastrado!');
        } else {
            $ids = explode(',', $request->SGBD_ID);
            $i = 0;
            foreach ($ids as $id) {
                $sgbd = Sgbd::find($id);
                $i++;

                if ($i > 1) {
                    $privilegio = Privilegio::where('NOME', $request->NOME)->get();
                    $privilegio = $sgbd->privilegios()->attach($privilegio[0]->ID);
                } else {
                    $privilegio = $sgbd->privilegios()->create($request->all());
                }    
            }
            return redirect('privilegios')->with('status', 'Privilégio cadastrado com sucesso!');
        }   
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
        $privilegio = Privilegio::findPrivilege($id);
        $sgbds = Sgbd::All();
        $ids = explode(',', $privilegio[0]->SGBD_ID);
        return view('privilegio.edit')->with(array('privilegio' => $privilegio[0]))->with(array('sgbds' => $sgbds))->with(array('ids' => $ids));
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
        
        $privilegio = Privilegio::find($id);
        $privilegio->update($request->all());
        $ids = explode(',', $request->SGBD_ID);
        $privilegio = $privilegio->sgbds()->sync($ids);

        return redirect('privilegios')->with('status', 'Privilégio atualizado com sucesso!');
    }

    /**
     * Confirmação se pretende realmente alterar.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $privilegio = Privilegio::getDataToConfirm($id);

        $mensagem = 'Deseja realmente deletar o privilégio '. $privilegio["0"]->PRIV_NOME .'? ';
        
        if (!empty($privilegio['0']->BD_NOME)) {
            $mensagem .= 'Atualmente os SGBD\'s '. $privilegio["0"]->BD_NOME .' estão vinculados a esse privilégio! ';    
        } 
        if (!empty($privilegio['0']->MAP_NOME)) {
            $mensagem .= 'Juntamente com os mapeamentos '. $privilegio["0"]->MAP_NOME .'.';
        } 


        return view('privilegio.confirm', array('privilegio' => $privilegio['0']), array('mensagem' => $mensagem)); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $privilegio = Privilegio::find($id);
        $privilegio->sgbds()->detach();
        $privilegio->delete();

        return redirect('privilegios')->with('sucess', 'Privilégio {$privilegio->NOME} deletado com sucesso!');
    }
}
