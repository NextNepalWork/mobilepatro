@extends('master.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <br/>
            <table class="table is-bordered table is-hoverable">
                <h1 align="center">All Cards</h1>
                <thead>
                <tr>
                    <th>Sn</th>
                    <th>Title</th>
                    <th>Template</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cards as $key=>$value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$value->title}}</td>
                        <td><img src="{{url('uploads/cards/'.$value->template)}}" width="50px"></td>
                        <td>
                            <a class="btn btn-primary" href="{{route('card.edit', $value->id)}}"><i class="fa fa-edit"></i>Edit</a>
                            <form action="{{ route('card.destroy', $value->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i
                                        class="fa fa-trash"></i>Remove</button>
                            </form>
                        </td>
                    </tr>

                @endforeach

                </tbody>

            </table>
            {{$cards->links()}}
        </div>
    </div>
    </div>
@endsection