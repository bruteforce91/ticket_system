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
                      <h2>Welcome <span>{{$obj['PM']['name']}}</span></h2>
                      <div class="card__text_wrap">
                        <h4>Name:{{$obj['PM']['name']}}</h4>
                        <h4>Role:{{$role_emp}}</h4>

                      </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @isset($obj['PM']['projects'])
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
        <?php foreach ($obj['PM']['projects']as $project ): ?>
          <tr>
            <td>{{$project['projects'][0]['id']}}</td>
            <td>{{$project['projects'][0]['name']}}</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset
    @isset($obj['PM']['projects'])
    <div>
      <h3>Tasks for Personal Projects</h3>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">taskID</th>
          <th scope="col">ProjectID</th>
          <th scope="col">Status</th>
          <th scope="col">Description</th>
          <th scope="col">Deadline</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($obj['PM']['projects'] as $project ): ?>
          <?php foreach ($project['tasks'] as $proj): ?>

          <tr>
            <td>{{$proj['id']}}</td>
            <td>{{$proj['taskID']}}</td>
            <td>{{$proj['projectID']}}</td>
            <td>{{$proj['tasks']['status']}}</td>
            <td>{{$proj['tasks']['description']}}</td>
            <td>{{$proj['tasks']['deadline']}}</td>
          </tr>
        <?php endforeach; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    @endisset
    <form action="{{ route('assignTasks') }}" method="post">
       {{csrf_field()}}
       @isset($obj['dev'])
       <h3>Assign new Task</h3>
       Developers:
       <select name="dev" id="devID">
       <?php foreach ($obj['dev'] as $dev ): ?>
         <?php foreach ($dev['employee'] as $devData): ?>
         <option value="{{$dev}}">{{$devData['name']}} id:{{$dev['id']}}</option>
         <?php endforeach; ?>
       <?php endforeach; ?>
       </select>
       taskID:
       <select name="tasks" id="tasksID">
         <?php foreach ($obj['PM']['projects'] as $project ): ?>
           <?php foreach ($project['tasks'] as $proj): ?>
             <option value="{{$proj['taskID']}}">{{$proj['taskID']}}</option>
        <?php endforeach; ?>
       <?php endforeach; ?>
       </select>
       @endisset
       <input type="submit" class="btn btn-success" value="assign task">
     </form>

     <form action="{{ route('delete',$obj['PM']['projects'][0]['tasks'][0]['taskID'] ) }}" method="post">
        {{csrf_field()}}
        @isset($obj['PM']['projects'])
        <h3>Delete Task assigned</h3>
        taskID:
        <select name="tasks" id="tasksID">
          <?php foreach ($obj['PM']['projects'] as $project ): ?>
            <?php foreach ($project['tasks'] as $proj): ?>
              <option value="{{$proj['taskID']}}">{{$proj['taskID']}}</option>
         <?php endforeach; ?>
        <?php endforeach; ?>
        </select>
        @endisset
        <input type="submit" class="btn btn-success" value="delete task">
      </form>

     @isset($taskEmployee)
     <div>
       <h3>Tasks assigned</h3>
     </div>
     <table class="table">
       <thead>
         <tr>
           <th scope="col">ID</th>
           <th scope="col">taskID</th>
           <th scope="col">EmployeeID</th>
         </tr>
       </thead>
       <tbody>
         <?php
         foreach ($taskEmployee as $task ): ?>
           <tr>
             <td>{{$task['id']}}</td>
             <td>{{$task['taskID']}}</td>
             <td>{{$task['employeeID']}}</td>
           </tr>

         <?php endforeach; ?>
       </tbody>
     </table>
     @endisset
</div>
@endsection
