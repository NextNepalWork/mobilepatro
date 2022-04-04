@extends('master.master')
@section('content')
    <div class="container-fluid pb-video-container">
        <div class="col-md-10 offset-md-1">
            <h3 class="text-xs-center">TV Gallery</h3>
            <div class="row pb-row">
                <div class="col-md-12">
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
                        @foreach($videos as $key => $value)
                            <tr>
                                <td>{{++$key}}</td>
                                <td><img src="{{ asset('uploads/thumbnails/' . $value->thumbnail) }}" alt="{{ $value->title }}" width="50px"></td>
                                <td>{{$value->title}}</td>
                                <td>{{$value->video}}</td>
                                <td>{{$value->status}}</td>
                                <td><a onclick="return confirm('Are you sure?')"
                                       href="{{route('delete-videos').'/'.$value->id}}" class="fa fa-trash"></a></td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{$videos->links()}}
                </div>

            </div>

        </div>
    </div>


    </div>
@endsection