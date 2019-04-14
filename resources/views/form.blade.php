@extends('modelo') 
@section('conteudo')

@if ($acao == 1)
  <h4 class="mt-3">Inclusão de Animais</h4>
  <form method="post" action="{{ route('bichos.store') }}">
@elseif ($acao == 2)    
  <h4 class="mt-3">Alteração de Animais</h4>
  <form method="post" action="{{ route('bichos.update', $reg->id) }}">
  {{ method_field('put') }}
@else 
  <h4 class="mt-3">Consulta de Animais</h4>
@endif  

  {{ csrf_field() }}

<div class="form-group">
  <label for="raca">Raça do animal:</label>
  <input type="text" class="form-control" id="raca" name="raca" 
         value="{{$reg->raca or old('raca')}}"
         @if ($acao==3) 
            readonly="readonly">
         @else   
            autofocus>
         @endif
</div>

<div class="form-group">
  <label for="proprietario">Nome do proprietário: </label>
  <input type="text" class="form-control" id="proprietario" name="proprietario"
         value="{{$reg->proprietario or old('proprietario')}}"
         @if ($acao==3) readonly="readonly" @endif>
</div>

<div class="form-group">
  <label for="peso">Peso:</label>
  <input type="text" class="form-control" id="peso" name="peso"
         value="{{$reg->peso or old('peso')}}"
         @if ($acao==3) readonly="readonly" @endif>
</div>
<div class="form-group">
    <label for="valor">Valor:</label>
    <input type="text" class="form-control" id="valor" name="valor"
           value="{{$reg->valor or old('valor')}}"
           @if ($acao==3) readonly="readonly" @endif>
</div>


@if ($acao == 1 or $acao == 2)
  <input type="submit" value="Enviar" class="btn btn-danger">
  </form>
@else 
  <div class="text-right">
    <a href="{{ url()->previous() }}" class="btn btn-success btn-sm" 
       role="button">Voltar</a>
  </div>
@endif  
@endsection