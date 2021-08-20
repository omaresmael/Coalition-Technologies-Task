@extends('layouts.app')
@section('content')

<div id="content" class="container">

    <h1>{{$project->name}} Project</h1>

    <table class="table" id="diagnosis_list">
        <thead>
        <tr>
            <th scope="col"  style="display:none">>#</th>
            <th scope="col" >#</th>
            <th scope="col">task Name</th>
            <th scope="col" >Priority</th>
            <th scope="col">Actions</th>
            <th><button type="button" class="btn btn-primary btn-add" data-toggle="modal" data-id="{{$project->id}}" data-target="#exampleModal2">
                    Add New Task
                </button></th>
        </tr>
        </thead>
        <tbody>

        @foreach($tasks as $task)

            <tr>
                <td style="display:none">{{$task->id}}</td>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$task->name}}</td>

                <td class='priority'>{{$task->priority}}</td>
                <td>
                    <button type="button" class="btn btn-success btn-edit" data-toggle="modal" data-id="{{$task->id}}" data-target="#exampleModal">
                        Edit Name
                    </button>

                    <button type="button" class="btn btn-danger btn-delete">Delete</button>
                </td>
            </tr>
        @endforeach

        <div class="modal fade" id="exampleModal" data-id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="top: -17px; position: relative;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form-update-task">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Task Name</label>
                                <input type="text" class="form-control" name="name"    placeholder="Edit name">

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
        <div class="modal fade" id="exampleModal2" data-id="" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" style="top: -17px; position: relative;">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="form-add-task">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Task Name</label>
                                <input type="text" class="form-control" name="name" id="add-task-name"   placeholder="Enter the new name">


                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Priority</label>
                                <input type="number" class="form-control" name="priority" id="exampleInputEmail1"  placeholder="Enter The Priority">
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

