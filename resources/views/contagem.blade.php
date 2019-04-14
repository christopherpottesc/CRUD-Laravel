@extends('modelo') 
@section('conteudo')

<h4 class="mt-3">Estatística de Animais</h4>

<div class="form-group">
  <label for="quant">Quantidade de Animais Cadastrados</label>
  <input type="text" class="form-control" id="quant"
         value="{{$quant}}"
         readonly="readonly">
</div>

<div class="form-group">
  <label for="soma">Soma dos valores dos Animais:</label>
  <input type="text" class="form-control" id="soma"
         value="{{ number_format($soma, 2, ',', '.') }}"
         readonly="readonly">
</div>

@endsection