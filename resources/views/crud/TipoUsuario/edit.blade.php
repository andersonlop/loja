@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Editando o Tipo Usuário</b></div>
                
                <div class="card-body">
                    <form id="formCadastro" class="cmxForm form-horizontal" role="form" method="post" action="{{ route('TipoUsuario.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="COD_TIPO_USUARIO" class="col-md-2 control-label">Código</label>
                            <div class="col-md-2">
                                <input type="text" id="COD_TIPO_USUARIO" name="COD_TIPO_USUARIO" class="form-control @error('COD_TIPO_USUARIO') is-invalid @enderror text-uppercase text-right" value="{{ $USUARIO->COD_TIPO_USUARIO }}" readonly>
                                @error('COD_TIPO_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="DSC_TIPO_USUARIO" class="col-md-2 control-label">Descrição</label>
                            <div class="col-md-8">
                                <input type="text" id="DSC_TIPO_USUARIO" name="DSC_TIPO_USUARIO" class="form-control @error('DSC_TIPO_USUARIO') is-invalid @enderror text-uppercase" value="{{ $USUARIO->DSC_TIPO_USUARIO }}" autofocus>
                                @error('DSC_TIPO_USUARIO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route("TipoUsuario") }}" class="btn btn-success">
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