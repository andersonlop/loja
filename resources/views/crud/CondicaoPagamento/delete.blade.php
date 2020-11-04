@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Exclusão da Condição de Pagamento</b></div>
                
                <div class="card-body">
                    <form id="formCadastro" class="cmxForm form-horizontal" role="form" method="post" action="{{ route("CondicaoPagamento.deletePost") }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="DSC_CONDICAO_PAGAMENTO" class="col-md-12 control-label">Você confirma a exclusão da Condição de Pagamento <b>{{ $CONDICAOPAGAMENTO->DSC_CONDICAO_PAGAMENTO }}</b>?</label>
                            <input type="hidden" id="COD_CONDICAO_PAGAMENTO" name="COD_CONDICAO_PAGAMENTO" value="{{ $CONDICAOPAGAMENTO->COD_CONDICAO_PAGAMENTO }}">
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    <span class="fa fa-trash fa-lg" data-toggle="tooltip" title="Editar"></span> Sim
                                </button>
                                <a href="{{ route("CondicaoPagamento") }}" class="btn btn-success">
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
