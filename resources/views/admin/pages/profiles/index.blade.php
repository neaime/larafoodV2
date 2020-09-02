@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>profileos <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> ADD</a></h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                        <td width="250px">
                        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Editar</a>
                        <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">Ver</a>
                        <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-info"><i class="fas fa-key"></i></a>
                        <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-info"><i class="fas fa-address-book"></i></a>

                        </td>
                    </tr>
                @endforeach
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
