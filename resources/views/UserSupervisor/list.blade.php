@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <h1 class="text-center">Usuarios</h1>
        <div class="table-responsive p-4 table-bordered">
            <table class="table table-success table-striped">
                <thead class="table-header text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">EMAIL</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row" class="text-center"> {{ $user->id }} </th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection