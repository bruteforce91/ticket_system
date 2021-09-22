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
                      <h2>Welcome <span>{{$employeeCEO['name']}}</span></h2>
                      <div class="card__text_wrap">
                        <h4>Name:{{$employeeCEO['name']}}</h4>
                        <h4>Role:{{$role_emp}}</h4>

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('assignProject') }}" method="post">
      @isset($allPM)
      <h3>Assign new Project to PM</h3>
      <select name="pm" id="pmID">
      <?php foreach ($allPM[0]->employee as $PM ): ?>
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
        <?php foreach ($projectEmployee as $project ): ?>
          <?php foreach ($project as $proj ): ?>
            <?php foreach ($proj as $projEmp ): ?>
          <tr>
            <td>{{$project['id']}}</td>
            <td>{{$projEmp['name']}}</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset

    <form action="{{ route('assignProject') }}" method="post">
      @isset($allTeams)
      <h3>Assign Dev/PM to team</h3>
      <select name="dev" id="devID">
        <option></option>
        return $allEmployee[0][0]['employee'][0]['name'];
      <?php foreach ($allEmployee as $allEmpl ): ?>
        <?php foreach ($allEmpl as $empl ): ?>
          <?php foreach ($empl->employee as $e ): ?>
        <option value="{{$e}}">{{$e['name']}}</option>
        <?php endforeach; ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
      </select>


      <select name="teams" id="teamsID">
        <option></option>
      <?php foreach ($allTeams as $team ): ?>
        <option value="{{ $project }}">{{$team['name']}}</option>
      <?php endforeach; ?>
      </select>
      @endisset
      {{csrf_field()}}
      <input type="submit" class="form-button" value="assign Dev/PM to Team">
    </form>

    @isset($allTeams)
    <div>
      <h3>Teams</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">name</th>
          <th scope="col">Employees</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($teamEmployee as $teams ):
          $name='';
          ?>
            <tr>
              <td>{{$teams['id']}}</td>
              <td>{{$teams['name']}}</td>
              <?php foreach ($teams->teamEmployee as $team ):?>
                <?php foreach ($team->employee as $employee ):
                  $name.="$employee->name, ";
                  ?>
                  <?php endforeach; ?>
              <?php endforeach; ?>
              <td>{{$name}}</td>
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
