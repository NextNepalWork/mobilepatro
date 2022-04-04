@extends('master.master')
@section('content')
    <!-- page content -->
    <div class="container">
        <div class="right_col" role="main">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <div class="x_panel">
                            <h2>Manage Privilege</h2>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <div class="col-md-6">
                            <form method="post" action="{{route('add-privilege')}}">
                                @csrf

                                <div class="form-group">
                                    <label for="inputEmail4">Enter Privilege</label>
                                    <input type="text" name="privilegename" class="form-control"
                                           placeholder="Enter Privilege Name">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="add" class="btn btn-primary"><i
                                                class=" fa fa-user"></i> Add
                                        Privilege
                                    </button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <tr>
                                    <th>Sn</th>
                                    <th>Privilege Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($priviliges as $key=>$value)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{ucfirst( $value->privilege)}}</td>
                                        <td>
                                            <form method="post" action="{{route('privilege-status')}}">
                                                <input type="hidden" name="status" value="{{$value->id}}">
                                                {{csrf_field()}}
                                                @if(($value->status)==0)
                                                    <button class="btn btn-danger" name="inactive"><i
                                                                class="fa fa-times"></i>Inactive
                                                    </button>
                                                @else
                                                    <button class="btn btn-success" name="active"><i
                                                                class="fa fa-check"></i>Active
                                                    </button>
                                                @endif

                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{route('delete-privilege').'/'.$value->id}}"
                                               onclick="return confirm('Are you sure')" class="btn btn-danger btn-xs"><i
                                                        class="fa fa-trash"></i>
                                                Delete</a>
                                            <a href="{{route('edit-privilege').'/'.$value->id}}"
                                               class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>
                                                Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
    </div>
@endsection
