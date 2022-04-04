@extends('master.master')
@section('content')
    <div class="right_col" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <h2 align="center">Users</h2>
                    </div>
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
                    <table class="table table-striped">
                        <tr>
                            <th>Sn</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Privilege</th>
                            <th>Action</th>
                        </tr>

                        <tbody>

                        @foreach($userdata as $key=>$value)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$value->first_name . ' ' . $value->last_name}}</td>
                                <td>{{$value->username}}</td>
                                <td>{{$value->email}}</td>
                                <td><img src="{{url('images/user/'.$value->image)}}" width="30"></td>
                                <td>
                                    @foreach($value->privileges as $pri)
                                        <span class="label label-default">  {{$pri->privilege}},</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('edit-user').'/'.$value->id}}" class="btn btn-success"><i
                                                class="fa fa-edit"></i></a>
                                    <a href="{{route('delete-user').'/'.$value->id}}"
                                       onclick="return confirm('Are you sure')"
                                       class="btn btn-danger"><i
                                                class="fa fa-trash"></i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
