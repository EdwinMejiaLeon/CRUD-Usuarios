@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(Auth::user())
                        @if(Auth::user()->role == 'admin' or Auth::user()->role == 'supervisor')
                            <div class="card-header text-center">{{ __('Panel de Administración') }}</div>

                            <div class="card-body">
                                <div>
                                    <ul>
                                        <li>
                                            <a href="{{ route('admin.users.index') }}" class="text-dark text-decoration-none">Administrar Usuario</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="card-header text-center">{{ __('Panel de Usuario') }}</div>

                            <div class="card-body">
                                <div>
                                    <ul>
                                        <li>
                                            <a href="{{ route('userGeneral.userData.show',[Auth::user()->id]) }}" class="text-dark text-decoration-none">Editar Datos de Usuario</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
