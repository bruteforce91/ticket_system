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
                      <h2>Welcome <span>{{$employeeDevWithTasks[0]['name']}}</span></h2>
                      <div class="card__text_wrap">
                        <h4>Name:{{$employeeDevWithTasks[0]['name']}}</h4>
                        <h4>Role:{{$role_emp}}</h4>

                      </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @isset($employeeDevWithTasks[0])
    <div>
      <h3>Personal Tasks</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">taskID</th>
          <th scope="col">Status</th>
          <th scope="col">Description</th>
          <th scope="col">Deadline</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($employeeDevWithTasks[0]['taskEmployee'] as $tasks ): ?>
          <?php foreach ($tasks->tasks as $task ): ?>

          <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->status}}</td>
            <td>{{$task->description}}</td>
            <td>{{$task->deadline}}</td>
          </tr>
          <?php endforeach; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset

    @isset($employeeDevWithTasks[0])
    <div>
      <h3>Tasks To do</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Status</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($employeeDevWithTasks[0]['taskEmployee'] as $tasks ): ?>
          <?php foreach ($tasks->tasks as $task ): ?>
          @if($task->status ==='to do')

          <tr>
            <td>{{$task['id']}}</td>
            <td>{{$task['status']}}</td>
            <td>{{$task['description']}}</td>
          </tr>
           @endif
             <?php endforeach; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset
    @isset($personalCommits)
    <div>
      <h3>Personal Commits</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">taskID</th>
          <th scope="col">title</th>
          <th scope="col">description</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($personalCommits as $commit ): ?>
          <tr>
            <td>{{$commit['id']}}</td>
            <td>{{$commit['taskID']}}</td>
            <td>{{$commit['title']}}</td>
            <td>{{$commit['description']}}</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset
</div>
@endsection
