@extends('modelo')
@section('conteudo')

  <h4 mt-3">Listagem do Cadastro de Animais - Expofeira 2019</h4>
  
  <form class="navbar-form navbar-left" role="search" action="{!! route('bichos.pesquisar') !!}" method="post">

    <div class="form-group">
      {!! csrf_field() !!}
      <input type="text" name="texto" class="form-control" placeholder="Pesquisar">

    </div>
  </form>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table class="table table-hover">
  <thead>
    <tr>
      <th>Código</th>
      <th>Raça do Animal</th>
      <th>Nome do proprietário</th>
      <th>Peso</th>
      <th>Valor R$:</th>
      <th>AÇÕES</th>
    </tr>
  </thead>
  <tbody>

@foreach ($linhas as $linha)
  <tr>
    <td> {{ $linha->id }} </td> 
    <td> {{ $linha->raca }} </td>
    <td> {{ $linha->proprietario }} </td>
    <td> {{ $linha->peso }} </td>
    <td> {{ $linha->valor }} </td>
    <td> <a href="{{ route('bichos.edit', $linha->id) }}" class="btn btn-info btn-sm" role="button">Alterar</a>&nbsp; 
         <a href="{{ route('bichos.show', $linha->id) }}" class="btn btn-success btn-sm" role="button">Consultar</a>&nbsp; 
         <form method="post" action="{{ route('bichos.destroy', $linha->id)}}"
               style="display: inline-block"
               onsubmit="return confirm('Confirma Exclusão deste grande animal?')">               
          {{ csrf_field() }}
          {{ method_field('delete') }}
          <input type="submit" class="btn btn-danger btn-sm" 
                 value="Excluir">
        </form>                   
        </td>
  </tr>

@endforeach

  </tbody>
</table>

@endsection