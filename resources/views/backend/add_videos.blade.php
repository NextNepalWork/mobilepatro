@extends('master.master')
@section('content')
    <div class="container">

        <div class="col-md-12">
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <div class="x_title">
                <h2>TV Video Content

                </h2>

            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="was-validated" method="post"
                  action="{{route('save-videos')}}" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                           for="title">Provide your title for video
                    </label>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <input type="text" id="title"
                               name="title" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="video"
                           class="control-label col-md-3 col-sm-3 col-xs-12">Video ID</label>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <input id="video" class="form-control"
                               type="text" name="video">
                    </div>
                </div>
                <div class="form-group">
                    <label for="thumbnail"
                           class="control-label col-md-3 col-sm-3 col-xs-12">Thumbnail Image</label>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <input id="thumbnail" class="form-control"
                               type="file" name="thumbnail">
                    </div>
                </div>
                <div class="form-group">
                    <label for="status"
                           class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <select name="status" id="status" class="form-control">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" name="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </div>


            </form>

        </div>
    </div>
@endsection