@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            پروژه جدید با موفقیت ثبت شد
        </div>
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{url('/project')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان پروژه</label>
                            <input type="text" class="form-control" id="exampleInputTitle" placeholder="Title"
                                   name="Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputDescription">توضیحات پروژه</label>
                            <input type="text" class="form-control" id="exampleInputDescription"
                                   placeholder="Description" name="Description">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputLanDev">زبان پروژه</label>
                            <input type="text" class="form-control" id="exampleInputLanDev"
                                   placeholder="LanDev" name="LanDev">
                        </div>
                        <div class="form-group">
                            <label>دسترسی</label>
                            <select class="form-control select2" multiple="multiple"
                                    data-placeholder="Select Permision"
                                    style="width: 100%;text-align: right" name="permision[]">

                                <option value="0">Delete</option>
                                <option value="1">Add</option>
                                <option value="2">Edit</option>
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
