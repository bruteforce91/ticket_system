@extends('layouts.app')
<link href="{{asset('css/home.css') }}" rel="stylesheet" type="text/css" >
<link href="{{asset('css/dataUser.css') }}" rel="stylesheet" type="text/css" >        <!-- Styles -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="container">
                      <h2>Welcome <span>{{$nameUser}}</span></h2>
                      <div class="card__text_wrap">
                        <h4>Name:{{$nameUser}}</h4>
                        <h4>Role:{{$roleValue['role']}}</h4>
                        @isset($personalProjects)
                        <ul> Personal Projects:
                        <?php foreach ($personalProjects as $project ): ?>
                             <li>{{$project['name']}}</li>
                        <?php endforeach; ?>
                        </ul>
                        @endisset
                      </div>
                    </div>
                    <div>
                      <button>Assign Task</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
