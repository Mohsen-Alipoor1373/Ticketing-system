@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            Add Task Success
        </div>
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{url('/edittask',$task->id)}}">
                    @csrf
                    {{method_field('PATCH')}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Project</label>
                            <select class="form-control select2" style="width: 100%;" name="project_id">
                                @foreach($projects as $project)
                                    @if($project->id == $task->project_id)
                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endif
                                    <option value="{{$project->id}}">{{$project->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">TitleTask</label>
                            <input type="text" class="form-control" id="exampleInputTitle" value="{{$task->title}}"
                                   name="title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">DescriptionProject</label>
                            <input type="text" class="form-control" id="exampleInputTitle"
                                   value="{{$task->description}}"
                                   name="description">
                        </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->


        </div>
    </div>




@endsection
