@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <h1>Cantidad de Usuarios del Sistema</h1>
        <h2><strong>{{ $countUsers }}</strong></h2>
    </div>
@endsection