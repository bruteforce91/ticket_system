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

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('assignProject') }}" method="post">
      @isset($PMemployees)
      <h3>Assign new Project</h3>
      <select name="pm" id="pmID">
      <?php foreach ($PMemployees as $PM ): ?>
        <option value="{{$PM}}">{{$PM['name']}}</option>
      <?php endforeach; ?>
      </select>

      <select name="projects" id="projects->name">
      <?php foreach ($allProjects as $project ): ?>
        <option value="{{ $project }}">{{$project['name']}}</option>
      <?php endforeach; ?>
      </select>
      @endisset
      {{csrf_field()}}
      <input type="submit" class="form-button" value="assign project">
    </form>
    @isset($allProjects)
    <div>
      <h3>All Projects</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">name</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($allProjects as $project ): ?>
          <tr>
            <td>{{$project['id']}}</td>
            <td>{{$project['name']}}</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset

    @isset($allTeams)
    <div>
      <h3>Teams</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">name</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($allTeams as $team ):?>


          <tr>
            <td>{{$team['id']}}</td>
            <td>{{$team['name']}}</td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset

    @isset($PMemployees)
    <div>
      <h3>PM</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">name</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($PMemployees as $PM ):?>


          <tr>
            <td>{{$PM['id']}}</td>
            <td>{{$PM['name']}}</td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset
</div>
@endsection
