@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Nova Condição de Pagamento</b></div>
                
                <div class="card-body">
                    <form id="formCadastro" class="cmxForm form-horizontal" role="form" method="post" action="{{ route("CondicaoPagamento.post") }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="DSC_CONDICAO_PAGAMENTO" class="col-md-4 control-label">Descrição</label>
                            <div class="col-md-6">
                                <input type="text" id="DSC_CONDICAO_PAGAMENTO" name="DSC_CONDICAO_PAGAMENTO" class="form-control @error('DSC_CONDICAO_PAGAMENTO') is-invalid @enderror text-uppercase" value="{{ old('DSC_CONDICAO_PAGAMENTO') }}" autofocus>
                                @error('DSC_CONDICAO_PAGAMENTO')
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