@extends('layouts.app')

@section('content')
    @if(session('delete'))
        <div class="alert alert-danger">
            Delete Task Success
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        @foreach($tasks as $task)
                            @if($task->expectation !=1)

                                <tr>
                                    <td>{{$task->title}}</td>
                                    <td>{{$task->created_at}}</td>
                                    <td>


                                        <a href="{{url('/delete',$task->id)}}"><img
                                                src="{{asset('/icon/x-button.png')}}"
                                                width="30"
                                                height="30"></a>

                                        <a href="{{url('/editt',$task->id)}}"><img src="{{asset('/icon/writing.png')}}"
                                                                                   width="30"
                                                                                   height="30"></a>


                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@endsection
