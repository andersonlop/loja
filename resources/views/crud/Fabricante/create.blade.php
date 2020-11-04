@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Novo Fabricante</b></div>
                
                <div class="card-body">
                    <form id="formCadastro" class="cmxForm form-horizontal" role="form" method="post" action="{{ route("Fabricante.post") }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="NOM_FABRICANTE" class="col-md-4 control-label">Nome</label>
                            <div class="col-md-6">
                                <input type="text" id="NOM_FABRICANTE" name="NOM_FABRICANTE" class="form-control @error('NOM_FABRICANTE') is-invalid @enderror text-uppercase" value="{{ old('NOM_FABRICANTE') }}" autofocus>
                                @error('NOM_FABRICANTE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>        
                        
                        <div class="form-group row">
                            <label for="IDF_ATIVO" class="col-md-4 control-label">Ativo?</label>
                            <div class="col-md-6">
                                <select id="IDF_ATIVO" name="IDF_ATIVO">
                                    <option value="S" checked="checked">SIM</option>
                                    <option value="N">NÃO</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route("Fabricante") }}" class="btn btn-success">
                                    <span class="fa fa-sign-out fa-lg" data-toggle="tooltip" title="Editar"></span> Voltar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <span class="fa fa-floppy-o fa-lg" data-toggle="tooltip" title="Editar"></span> Gravar
                                </button>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection