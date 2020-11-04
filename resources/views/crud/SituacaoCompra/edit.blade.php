@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Editando a Situacao Compra</b></div>
                
                <div class="card-body">
                    <form id="formCadastro" class="cmxForm form-horizontal" role="form" method="post" action="{{ route("SituacaoCompra.update") }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="COD_SITUACAO_COMPRA" class="col-md-2 control-label">Código</label>
                            <div class="col-md-2">
                                <input type="text" id="COD_SITUACAO_COMPRA" name="COD_SITUACAO_COMPRA" class="form-control @error('COD_SITUACAO_COMPRA') is-invalid @enderror text-uppercase text-right" value="{{ $SITUACAO_COMPRA->COD_SITUACAO_COMPRA }}" readonly>
                                @error('COD_SITUACAO_COMPRA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="DSC_SITUACAO_COMPRA" class="col-md-2 control-label">Nome</label>
                            <div class="col-md-8">
                                <input type="text" id="DSC_SITUACAO_COMPRA" name="DSC_SITUACAO_COMPRA" class="form-control @error('DSC_SITUACAO_COMPRA') is-invalid @enderror text-uppercase" value="{{ $DSC_SITUACAO_COMPRA->DSC_SITUACAO_COMPRA }}" autofocus>
                                @error('DSC_SITUACAO_COMPRA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="IDF_ATIVO" class="col-md-2 control-label">Ativo?</label>
                            <div class="col-md-6">
                                <select id="IDF_ATIVO" name="IDF_ATIVO">
                                    @if ($SITUACAO_COMPRA->IDF_ATIVO === "S")
                                    <option value="S" selected="selected">SIM</option>
                                    <option value="N">NÃO</option>
                                    @elseif ($SITUACAO_COMPRA->IDF_ATIVO === "N")
                                    <option value="S">SIM</option>
                                    <option value="N" selected="selected">NÃO</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route("SituacaoCompra") }}" class="btn btn-success">
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