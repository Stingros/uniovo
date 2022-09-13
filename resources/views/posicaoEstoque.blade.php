<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<form method="post" action="{{URL::asset('admin/AtualizaTabela')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="col-md-3">
        <div class="form-group">
            <label for="data-inicial">Data inicial</label>
            <div class="input-group date">
                <input type="date" id="data-inicial" name="data_inicial"
                        value="{{ date('d/m/Y') }}"
                        class="form-control"/>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="data-final">Data final</label>
            <div class="input-group date">
                <input type="date" id="data-final" name="data_final"
                        value="{{ date('d/m/Y') }}"
                        class="form-control"/>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <button type="submit" class="btn btn-primary">Filtrar</button>
    </div>
</form>
<table class='table table-striped table-bordered'>
  <thead>
      <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Saldo Inicial</th>
        <th>Entradas</th>
        <th>Saídas</th>
        <th>Saldo Final</th>
       </tr>
  </thead>
  <tbody>
    @foreach($result as $row)
    <tr>
        <td>{{$row->codigo}}</td>
        <td>{{$row->nome}}</td>
        <td>{{$row->saldo_inicial}}</td>
        <td>{{$row->entradas}}</td>
        <td>{{$row->saidas}}</td>
        <td>{{$row->saldo_final}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- ADD A PAGINATION -->
<p>{!! urldecode(str_replace("/?","?",$result->appends(Request::all())->render())) !!}</p>


@endsection