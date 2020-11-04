@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Editando Condição de pagamento</b></div>
                
                <div class="card-body">
                    <form id="formCadastro" class="cmxForm form-horizontal" role="form" method="post" action="{{ route('CondicaoPagamento.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="COD_CONDICAO_PAGAMENTO" class="col-md-2 control-label">Código</label>
                            <div class="col-md-2">
                                <input type="text" id="COD_CONDICAO_PAGAMENTO" name="COD_CONDICAO_PAGAMENTO" class="form-control @error('COD_CONDICAO_PAGAMENTO') is-invalid @enderror text-uppercase text-right" value="{{ $CONDICAOPAGAMENTO->COD_CONDICAO_PAGAMENTO }}" readonly>
                                @error('COD_CONDICAO_PAGAMENTO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="DSC_CONDICAO_PAGAMENTO" class="col-md-2 control-label">Descrição</label>
                            <div class="col-md-8">
                                <input type="text" id="DSC_CONDICAO_PAGAMENTO" name="DSC_CONDICAO_PAGAMENTO" class="form-control @error('DSC_CONDICAO_PAGAMENTO') is-invalid @enderror text-uppercase" value="{{ $CONDICAOPAGAMENTO->DSC_CONDICAO_PAGAMENTO }}" autofocus>
                                @error('DSC_CONDICAO_PAGAMENTO')
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
                            		@if ($CONDICAOPAGAMENTO->IDF_ATIVO === "S")
                            		<option value="S" selected="selected">SIM</option>
                            		<option value="N">NÃO</option>
                            		@elseif ($CONDICAOPAGAMENTO->IDF_ATIVO === "N")
                            		<option value="S">SIM</option>
                            		<option value="N" selected="selected">NÃO</option>
                            		@endif
                            	</select>
                            </div>
                        </div>
                                                
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route("CondicaoPagamento") }}" class="btn btn-success">
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
