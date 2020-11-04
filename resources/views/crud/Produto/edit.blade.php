@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Editando o Grupo</b></div>
                
                <div class="card-body">
                    <form id="formCadastro" class="cmxForm form-horizontal" role="form" method="post" action="{{ route("Grupo.update") }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="COD_GRUPO" class="col-md-2 control-label">Código</label>
                            <div class="col-md-2">
                                <input type="text" id="COD_GRUPO" name="COD_GRUPO" class="form-control @error('COD_GRUPO') is-invalid @enderror text-uppercase text-right" value="{{ $GRUPO->COD_GRUPO }}" readonly>
                                @error('COD_GRUPO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="NOM_GRUPO" class="col-md-2 control-label">Nome</label>
                            <div class="col-md-8">
                                <input type="text" id="NOM_GRUPO" name="NOM_GRUPO" class="form-control @error('NOM_GRUPO') is-invalid @enderror text-uppercase" value="{{ $GRUPO->NOM_GRUPO }}" autofocus>
                                @error('NOM_GRUPO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route("Grupo") }}" class="btn btn-success">
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