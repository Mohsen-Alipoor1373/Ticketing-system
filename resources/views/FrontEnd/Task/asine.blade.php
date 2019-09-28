@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            تسک جدید با مئفقیت ثبت شد
        </div>
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{url('/asinetask')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>تسک</label>
                            <select class="form-control select2" style="width: 100%;" name="task_id">
                                @foreach($tasks as $task)
                                    <option value="{{$task->id}}">{{$task->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>کاربران</label>
                            <select class="form-control select2" multiple="multiple"
                                    data-placeholder="Select Permision"
                                    style="width: 100%;text-align: right" name="user_id[]">

                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>


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
