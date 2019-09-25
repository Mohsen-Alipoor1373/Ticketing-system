@extends('layouts.app')

@section('content')
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

                            <tr>
                                <td>{{$task->title}}</td>
                                <td>{{Carbon\Carbon::parse($task->created_at)->format('d-m-Y')}}</td>
                                <td>


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
