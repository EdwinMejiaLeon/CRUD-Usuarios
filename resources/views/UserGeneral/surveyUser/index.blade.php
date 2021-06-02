@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <!-- Main Content -->
        <div class="content col-md-8 offset-2 p-4">
            <div class="card" style="background:#eee;border-radius: 4px solid #777;box-shadow: 2px 2px 5px #777;">
                <div class="card-header"style="background:#A5A6AA; text-align:center; color:##393A39;"><strong>{{ __('Encuesta Covid') }}</strong></div>
                    <div class="card-body">
                        @if($count == 0)
                            <form method="POST"  action="{{ route('userGeneral.surveyCovid.store') }}">
                                @csrf
                                <button type="submit" class="btn btn-success">LLenar Encuesta</button>
                            </form>
                        @else
                            @foreach ($dataUser as $user)
                                <div class="form-group row">
                                    <label for="question1" class="col-md-4 col-form-label text-md-left" >{{ __('Ha sentido malestar y poca energia ultimamente?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question1"  class="form-control text-md-right " >
                                                <option>{{$user->question1}}</option>     
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="question2" class="col-md-4 col-form-label text-md-left" >{{ __('Ha tenido sintomas de tos en los ultimos 14 dias?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question2"  class="form-control text-md-right " >
                                            <option>{{$user->question2}}</option>   
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="question3" class="col-md-4 col-form-label text-md-left" >{{ __('Tieneo ha sentido molestias en la garganta?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question3"  class="form-control text-md-right " >
                                            <option>{{$user->question3}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="question4" class="col-md-4 col-form-label text-md-left" >{{ __('Se ha relacionado con una persona con covid?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question4"  class="form-control text-md-right " >
                                            <option>{{$user->question4}}</option>     
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="question5" class="col-md-4 col-form-label text-md-left" >{{ __('Cree usted que tiene covid seriamente hablando?') }}</label>
                                    <div class="col-md-2">
                                        <select name="question5"  class="form-control text-md-right " >
                                            <option>{{$user->question5}}</option>     
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
