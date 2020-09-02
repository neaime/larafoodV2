@extends('adminlte::page')

@section('title', 'Adicionar Perfils ao Plano')

@section('content_header')
    <h1>Adicionar permissões do perfil <b>{{$plan->name}}</b></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('plans.profiles', $plan->id) }}">Perfis</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.profiles.available', $plan->id) }}">Disponiveis</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.profiles.available', $plan->id) }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                        <th width="50px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{ route('plans.profiles.attach', $plan->id) }}" method="POST">
                        @csrf
                        @foreach($profiles as $profile)
                        <tr>
                            <td>
                                <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                            </td>
                            <td>{{ $profile->name }}</td>
                            <td width="250px">
                                <!-- <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Editar</a>-->
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="500">
                            @include('admin.includes.alerts.alerts')
                                <button type="submit" class="btn btn-dark">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
