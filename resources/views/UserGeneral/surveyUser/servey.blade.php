@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <!-- Main Content -->
        <div class="content">
            <div class="card" style="background:#eee;border-radius: 4px solid #777;box-shadow: 2px 2px 5px #777;">
                <div class="card-header"style="background:#A5A6AA; text-align:center; color:##393A39;"><strong>{{ __('Registro Covid') }}</strong></div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('userGeneral.surveyCovid.create') }}">
                            @csrf
                            @method('HEAD')

                            <div class="container p-4">
                                <div class="form-group row">
                                    <label for="question1" class="col-md-4 col-form-label text-md-left" >{{ __('Ha sentido malestar y poca energia ultimamente?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question1"  class="form-control text-md-right " >
                                                <option>SI</option>
                                                <option>NO</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="question2" class="col-md-4 col-form-label text-md-left" >{{ __('Ha tenido sintomas de tos en los ultimos 14 dias?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question2"  class="form-control text-md-right " >
                                                <option>SI</option>
                                                <option>NO</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="question3" class="col-md-4 col-form-label text-md-left" >{{ __('Tieneo ha sentido molestias en la garganta?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question3"  class="form-control text-md-right " >
                                                <option>SI</option>
                                                <option>NO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="question4" class="col-md-4 col-form-label text-md-left" >{{ __('Se ha relacionado con una persona con covid?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question4"  class="form-control text-md-right " >
                                                <option>SI</option>
                                                <option>NO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="question5" class="col-md-4 col-form-label text-md-left" >{{ __('Cree usted que tiene covid seriamente hablando?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question5"  class="form-control text-md-right " >
                                                <option>SI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="text-md-left p-4">
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
