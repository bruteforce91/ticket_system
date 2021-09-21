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
    @isset($personalProjects)
    <div>
      <h3>Personal Projects</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($personalProjects as $project ): ?>
          <tr>
            <td>{{$project['id']}}</td>
            <td>{{$project['name']}}</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset
    @isset($tasksData)
    <div>
      <h3>Tasks for Personal Projects</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Status</th>
          <th scope="col">Description</th>
          <th scope="col">Deadline</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tasksData as $task ): ?>
          <tr>
            <td>{{$task['id']}}</td>
            <td>{{$task['status']}}</td>
            <td>{{$task['description']}}</td>
            <td>{{$task['deadline']}}</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset
    <form action="{{ route('assignTasks') }}" method="post">
       {{csrf_field()}}
       <input type="submit" class="btn btn-success" value="assign task">
     </form>
</div>
@endsection
