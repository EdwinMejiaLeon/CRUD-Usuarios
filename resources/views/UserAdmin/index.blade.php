@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <div class="table-responsive p-4 table-bordered">
            <table class="table table-success table-striped">
                <thead class="table-header text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ROL</th>
                    @if(Auth::user()->role == 'admin')
                        <th scope="col">SUPERVISORES</th>
                    @endif
                    <th scope="col" style="width: 200px;">ACCIONES</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row" class="text-center"> {{ $user->id }} </th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->role == 'admin')
                                    <span>Administrador</span>
                                @elseif($user->role == 'supervisor')
                                    <span>Supervisor</span>
                                @else
                                    <span>Usuario</span>
                                @endif
                            </td>
                            @if(Auth::user()->role == 'admin')
                                <td>
                                    <ul>
                                        @foreach ($supervisor as $super)
                                            @if ($super->usuario_id == $user->id)
                                                <li>{{ $super->nameSupervisor }}</li>
                                                <p><strong>Cambios realizados:</strong></p>
                                                <ul>
                                                    <li><strong>Fecha : {{ $super->created_at}}</strong></li>
                                                    <li class="text-danger"><strong>Anterior :</strong> {{ $super->previousChange }}</li>
                                                    <li class="text-success"><strong>Nuevo :</strong>{{ $super->newChange }}</li>
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>
                                </td>
                            @endif
                
                            <td class="d-flex">
                                @if(Auth::user()->role == 'supervisor')
                                    @if($user->role != 'admin')
                                        <a class="d-inline-block " href="{{ route('admin.users.edit',[$user->id]) }}"><button type="submit" class="btn btn-dark">Editar</button></a>
                                    @endif
                                @elseif (Auth::user()->role == 'admin') 
                                    <a class="d-inline-block " href="{{ route('admin.users.edit',[$user->id]) }}"><button type="submit" class="btn btn-dark">Editar</button></a>
                                @endif
                                
                                @if(Auth::user()->role == 'admin')
                                    <form method="POST" class="d-inline-block pl-3" action="{{ route('admin.users.destroy',[$user->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                    <form method="POST" class="d-inline-block pl-3" action="{{ route('admin.active',[$user->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        @if( $user->state == 0)
                                            <button type="submit" class="btn btn-secondary">Activar</button>
                                        @endif
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
    
@endsection
