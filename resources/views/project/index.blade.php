@extends('layouts.app')
@section('content')

    <div id="content" class="container">

        <h1>Sortable table</h1>

        <table class="table" id="diagnosis_list">
            <thead>
            <tr>
                <th scope="col" data-id="">#</th>
                <th scope="col">Project Name</th>
                <th scope="col" >NO. Tasks</th>
                <th scope="col">Actions</th>
                <th scope="col"><button type="button" class="btn btn-primary btn-add" data-toggle="modal"  data-target="#exampleModal3">
                        Add New Project
                    </button></th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$project->name}}</td>
                    <td>{{$project->tasks_count}}</td>
                    <td>
                        <a href="{{route('project.tasks',$project->id)}}"><button type="button" class="btn btn-primary">View Tasks</button></a>

                    </td>
                </tr>
            @endforeach
            <div class="modal fade" id="exampleModal3" data-id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" style="top: -17px; position: relative;">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" id="form-add-project">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Project Name</label>
                                    <input type="text" class="form-control" name="name" id="add-project-name" placeholder="Project Name">

                                </div>

                                <button type="submit" class="btn btn-primary" >Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            </tbody>
        </table>

    </div>


@endsection
