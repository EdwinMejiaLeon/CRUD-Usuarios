@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <!-- Main Content -->
        <div class="content col-md-8 offset-2 p-4">
            <div class="card" style="background:#eee;border-radius: 4px solid #777;box-shadow: 2px 2px 5px #777;">
                <div class="card-header"style="background:#A5A6AA; text-align:center; color:##393A39;"><strong>{{ __('Actualizar Usuario') }}</strong></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('userGeneral.userData.update',[$user->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Completo') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right" >{{ __('Rol') }}</label>
                                <div class="col-md-6">
                                    <select name="role"  class="form-control text-md-right " >
                                        @if ($user->role == 'admin')
                                            <option value="{{ $user->role }}" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                                        @else
                                            <option value="{{ $user->role }}" {{ old('role') == 'user_basic' ? 'selected' : '' }}>Usuario</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Guardar') }}
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
