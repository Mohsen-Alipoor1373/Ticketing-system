@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>

                            <th>تسک</th>
                            <th>کاربر</th>
                            <th>تاریخ</th>
                            <th>دسترسی</th>
                        </tr>
                        @foreach($tasks as $task)

                            <tr>
                                <td>{{$task->title}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{Carbon\Carbon::parse($task->created_at)->format('d-m-Y')}}</td>
                                <td>
                                    <a href="{{url('/deleteadmin',$task->id)}}"><img
                                            src="{{asset('/icon/x-button.png')}}" width="30"
                                            height="30"></a>

                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
