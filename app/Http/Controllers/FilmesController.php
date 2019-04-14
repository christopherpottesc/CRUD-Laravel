<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filme;

class FilmesController extends Controller
{
    public function index()
    {        
        // obtém os registros cadastrados na tabela filmes
        // $linhas = Filme::all();
        $linhas = Filme::orderBy('titulo')->get();

        return view('index', ['linhas' => $linhas]);
    }

    public function create()
    {
        return view('form', ['acao'=>1]);
    }

    public function store(Request $request)
    {
        // obtém todos os campos do formulário
        $dados = $request->all();

        // insere o registro (com as definições do fillable (na Model) e com os 
        // nomes de campos do formulário idênticos ao da tabela)
        $reg = Filme::create($dados);

        if ($reg) {
            return redirect()->route('filmes.index')
                   ->with('status', 'Ok! Filme Inserido com Sucesso');
        } else {
            return redirect()->route('filmes.index')
                   ->with('status', 'Erro... Filme Não Inserido...');
        }
    }

    public function show($id)
    {
        // procura (e posiciona) no registro cujo id foi passado como parâmetro
        $reg = Filme::find($id);

        return view('form', ['reg' => $reg, 'acao' => 3]);
    }

    public function edit($id)
    {
        // procura (e posiciona) no registro cujo id foi passado como parâmetro
        $reg = Filme::find($id);

        return view('form', ['reg' => $reg, 'acao' => 2]);
    }

    public function update(Request $request, $id)
    {
        // obtém os campos do form
        $dados = $request->all();

        // posiciona no registro a ser alterado
        $reg = Filme::find($id);

        // altera o registro com os novos dados do form
        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('filmes.index')
                   ->with('status', 'Ok! Filme Alterado com Sucesso');
        } else {
            return redirect()->route('filmes.index')
                   ->with('status', 'Erro... Filme Não Alterado...');
        }
    }

    public function destroy($id)
    {
        // exclui o registro cujo id foi passado como parâmetro
        $exc = Filme::destroy($id);

        if ($exc) {
            return redirect()->route('filmes.index')
                   ->with('status', 'Ok! Filme Excluído com Sucesso');
        } else {
            return redirect()->route('filmes.index')
                   ->with('status', 'Erro... Filme Não Excluído...');
        }
    }

    public function contagem()
    {
        $num = Filme::count();
        $media = Filme::avg('duracao');

        return view('contagem', ['media'=>$media, 'num'=>$num]);
    }
}
