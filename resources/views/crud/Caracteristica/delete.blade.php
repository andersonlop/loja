@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Exclusão da Carecterística</b></div>
                
                <div class="card-body">
                    <form id="formCadastro" class="cmxForm form-horizontal" role="form" method="post" action="{{ route("Caracteristica.deletePost") }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="NOM_CARACTERISTICA" class="col-md-12 control-label">Você confirma a exclusão do Grupo {{ $CARACTERISTICA->NOM_CARACTERISTICA }}?</label>
                            <input type="hidden" id="COD_CARACTERISTICA" name="COD_CARACTERISTICA" value="{{ $CARACTERISTICA->COD_CARACTERISTICA }}">
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    <span class="fa fa-trash fa-lg" data-toggle="tooltip" title="Editar"></span> Sim
                                </button>
                                <a href="{{ route("Caracteristica") }}" class="btn btn-success">
                                    <span class="fa fa-sign-out fa-lg" data-toggle="tooltip" title="Editar"></span> Não
                                </a>
                            </div>
                        </div>                        
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection
