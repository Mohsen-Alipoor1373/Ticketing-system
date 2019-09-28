@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
           تسک جدید با موفقیت ثبت شد
        </div>
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{url('/protask')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>User</label>
                                <select class="form-control select2" style="width: 100%;" name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>پروژه</label>
                                <select class="form-control select2" style="width: 100%;" name="project_id">
                                    @foreach($projects as $project)
                                        <option value="{{$project->title}}">{{$project->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>تسک</label>
                                <select class="form-control select2" multiple="multiple" data-placeholder="Select Task"
                                        style="width: 100%;text-align: right" name="task_id[]">

                                    @foreach($tasks as $task)
                                        <option value="{{$task->title}}">{{$task->title}}</option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="form-group">
                                <label>دسترسی</label>
                                <select class="form-control select2" multiple="multiple"
                                        data-placeholder="Select Permision"
                                        style="width: 100%;text-align: right" name="permision[]">

                                    <option value="Delete">Delete</option>
                                    <option value="Add">Add</option>
                                    <option value="Edit">Edit</option>
                                </select>


                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->


        </div>
    </div>




@endsection
