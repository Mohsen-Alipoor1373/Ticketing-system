@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>مشاهده تسک ها</th>
                            <th>عنوان</th>
                            <th>تاریخ</th>
                            <th>دسترسی ها</th>
                        </tr>
                        @foreach($projects as $project)

                            <tr>
                                <td><a href="{{url('/tasksshoww',$project->id)}}"><img
                                            src="{{asset('/icon/eye (1).png')}}" width="30" height="30"
                                            title="ViewTask"></a>
                                <td>{{$project->title}}</td>
                                <td>{{$project->created_at}}</td>
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
                        @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>


@endsection
