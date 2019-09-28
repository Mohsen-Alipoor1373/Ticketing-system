@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>

                            <th>ViewTask</th>
                            <th>Project</th>
                            <th>LanDev</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        @foreach($projects as $project)
                            @if($project->user_id == auth()->user()->id)
                                <tr>
                                    <td><a href="{{url('/viewtask',$project->id)}}"><img
                                                src="{{asset('/icon/eye (1).png')}}" width="30" height="30"
                                                title="ViewTask"></a>
                                    </td>
                                    <td>{{$project->title}}</td>
                                    <td>{{$project->LanDev}}</td>
                                    <td>{{$project->description}}</td>
                                    <td>{{Carbon\Carbon::parse($project->created_at)->format('d-m-Y')}}</td>
                                    <td>
                                        @foreach($permisions as $permision)
                                            @if($permision->project_id == $project->id)
                                                @if($permision->permision_id == 0)
                                                    <a href=""><img src="{{asset('/icon/x-button.png')}}" width="30"
                                                                    height="30"></a>
                                                @endif
                                                @if($permision->permision_id == 1)
                                                    <a href=""><img src="{{asset('/icon/writing.png')}}" width="30"
                                                                    height="30"></a>
                                                @endif
                                                @if($permision->permision_id == 2)
                                                    <a href=""><img src="{{asset('/icon/plus.png')}}" width="30"
                                                                    height="30"></a>
                                                @endif
                                            @endif
                                        @endforeach
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
