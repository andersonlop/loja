@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Exclusão do Tipo Usuário</b></div>
                
                <div class="card-body">
                    <form id="formCadastro" class="cmxForm form-horizontal" role="form" method="post" action="{{ route("TipoUsuario.deletePost") }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="DSC_TIPO_USUARIO" class="col-md-12 control-label">Você confirma a exclusão do tipo de usuário {{ $TIPOUSUARIO->DSC_TIPO_USUARIO }}?</label>
                            <input type="hidden" id="COD_TIPO_USUARIO" name="COD_TIPO_USUARIO" value="{{ $TIPOUSUARIO->COD_TIPO_USUARIO }}">
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    <span class="fa fa-trash fa-lg" data-toggle="tooltip" title="Editar"></span> Sim
                                </button>
                                <a href="{{ route("TipoUsuario") }}" class="btn btn-success">
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
