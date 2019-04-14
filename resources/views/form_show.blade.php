@extends('modelo') 
@section('conteudo')

<h4 class="mt-3">Consulta de Animais</h4>

<div class="form-group">
  <label for="raca">Raça do Animal:</label>
  <input type="text" class="form-control" id="raca" name="raca"
         value="{{$raca}}"
         readonly="readonly">
</div>

<div class="form-group">
  <label for="proprietario">Nome do proprietário:</label>
  <input type="text" class="form-control" id="proprietario" name="proprietario"
         value="{{$proprietario}}"
         readonly="readonly">
</div>

<div class="form-group">
  <label for="peso">Peso:</label>
  <input type="text" class="form-control" id="peso" name="peso"
        value="{{$peso}}"
        readonly="readonly">
</div>

<div class="form-group">
    <label for="valor">Valor:</label>
    <input type="text" class="form-control" id="valor" name="valor"
          value="{{$valor}}"
          readonly="readonly">
</div>


<div class="text-right">
  <a href="{{ url()->previous() }}" class="btn btn-success btn-sm" role="button">Voltar</a>
</div>

@endsection