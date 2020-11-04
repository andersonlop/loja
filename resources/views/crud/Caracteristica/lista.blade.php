@extends('layouts::app')

 <!--alterar a AppServiceProvider-->

@section('conteudo')
<div class="col-md-12">
    <div class="responsive-table">
        @if (session('sucesso'))
        <div class="alert alert-success text-center alert-dismissible" role="alert">
            <strong><b><h4>{{ session('sucesso') }}<h4></b></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session('insucesso'))
        <div class="alert alert-danger text-center alert-dismissible" role="alert">
            <strong><b><h4>{{ session('insucesso') }}<h4></b></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @isset($CARACTERISTICA) 
            <table id="{{ $nomeTabela }}" class="table table-striped table-bordered" width="100%" cellspacing="0">
                <caption class="caption-top text-center bg-primary text-white"><b><h4>Caracteristica</h4></b></caption>
                <thead>
                    <tr>
                        <th class="text-center" style="width: 120px;">Código</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Ativo</th>
                        <th  style="width: 200px;">
                            <a href="{{ route('home') }}" class="btn btn-round btn-success">
                                <span class="fa fa-file-o" data-toggle="tooltip" title="Editar"></span> Voltar                            
                            </a>
                            <a href="{{ route('Caracteristica.create') }}" class="btn btn-round btn-primary">
                                <span class="fa fa-file-o" data-toggle="tooltip" title="Editar"></span> Novo                            
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($CARACTERISTICA as $REGISTRO)
                    <tr>
                        <td class="text-right">{{ $REGISTRO->COD_CARACTERISTICA }}</td>
                        <td>{{ $REGISTRO->NOM_CARACTERISTICA }}</td>
                        <td>{{ $REGISTRO->DSC_ATIVO }}</td>
                        <td class="text-center">
                            <a href="{{ route("Caracteristica.edit", ["COD_CARACTERISTICA" => $REGISTRO->COD_CARACTERISTICA]) }}" >
                                <span class="fa fa-pencil" data-toggle="tooltip" title="Editar"></span>
                            </a>
                            <a href="{{ route("Caracteristica.delete", ["COD_CARACTERISTICA" => $REGISTRO->COD_CARACTERISTICA]) }}" >
                                <span class="fa fa-close text-danger" data-toggle="tooltip" title="Apagar"></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-info" role="alert">
            <strong>Nenhuma CARACTERISTICA Encontrada!</strong>
        </div>
        @endif
    </div>
</div>

@endsection
