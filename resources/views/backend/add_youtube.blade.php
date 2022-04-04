@extends('master.master')
@section('content')
    <div class="container">
        <h2>Provide Youtube Link</h2>
        <form action="{{route('youtube-videos')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="pwd">Title</label>
                <input type="text" class="form-control" id="pwd" placeholder="Enter Title" name="title">
            </div>
            <div class="form-group">
                <label for="url">Paste youtube Url ID</label>
                <input type="text" class="form-control" id="url" placeholder="Enter URL ID" name="url">
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail Image</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <div class="checkbox">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>
        <br>
        <h2>Youtube Videos</h2>
        <br>

        <div class="form-group">
            <table class="table table-striped">
                <tr>
                    <th>Sn</th>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Video ID</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <tbody>
                @foreach($youtubedata as $key => $value)
                    <tr>
                        <td>{{++$key}}</td>
                        <td><img src="{{ asset('uploads/thumbnails/' . $value->thumbnail) }}" alt="{{ $value->title }}" width="50px"></td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->url}}</td>
                        <td>{{$value->status}}</td>
                        <td><a onclick="return confirm('Are you sure?')"
                               href="{{route('delete-youtube').'/'.$value->id}}" class="fa fa-trash"></a></td>

                    </tr>
                @endforeach
                </tbody>

            </table>
            {{$youtubedata->links()}}
        </div>
    </div>
    </div>
@endsection