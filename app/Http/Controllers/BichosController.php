<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bichos;
use Illuminate\Support\Facades\Input;


class BichosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $linhas = Bichos::orderBy('raca')->get();

        return view('index', ['linhas' => $linhas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form', ['acao'=>1]);
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
        // obtém todos os campos do formulário
        $dados = $request->all();

        // insere o registro (com as definições do fillable (na Model) e com os 
        // nomes de campos do formulário idênticos ao da tabela)
        $reg = Bichos::create($dados);

        if ($reg) {
            return redirect()->route('bichos.index')
                   ->with('status', 'Ok! Animal Inserido com Sucesso');
        } else {
            return redirect()->route('bichos.index')
                   ->with('status', 'Erro... Animal Não Inserido...');
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
        // procura (e posiciona) no registro cujo id foi passado como parâmetro
        $reg = Bichos::find($id);

        return view('form', ['reg' => $reg, 'acao' => 3]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // procura (e posiciona) no registro cujo id foi passado como parâmetro
        $reg = Bichos::find($id);

        return view('form', ['reg' => $reg, 'acao' => 2]);
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
        // obtém os campos do form
        $dados = $request->all();

        // posiciona no registro a ser alterado
        $reg = Bichos::find($id);

        // altera o registro com os novos dados do form
        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('bichos.index')
                   ->with('status', 'Ok! Animal Alterado com Sucesso');
        } else {
            return redirect()->route('bichos.index')
                   ->with('status', 'Erro... Animal Não Alterado...');
        }
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
        // exclui o registro cujo id foi passado como parâmetro
        $exc = Bichos::destroy($id);

        if ($exc) {
            return redirect()->route('bichos.index')
                   ->with('status', 'Ok! Animal Excluído com Sucesso');
        } else {
            return redirect()->route('bichos.index')
                   ->with('status', 'Erro... Animal Não Excluído...');
        }
    }

    public function contagem()
    {
        $num = Bichos::count();
        $total_valor = Bichos::sum('valor');

        return view('contagem', ['soma'=>$total_valor, 'quant'=>$num]);
    }

    public function pesquisar()
    {

        $texto = Input::get('texto');

        $pesquisa = Bichos::where('raca', 'like', '%'.$texto.'%')
        ->orWhere('proprietario','like','%'.$texto.'%')
        ->orWhere('valor','like','%'.$texto.'%')
        ->orWhere('peso','like','%'.$texto.'%')->get();

        return view('index', ['linhas' => $pesquisa]);
    }

}
