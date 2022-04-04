@extends('master.master')
@section('content')
    <div class="col-md-6">
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
        <form method="post" action="{{route('edit-privilege-action')}}">
            <input type="hidden" name="id" value="{{$privilege->id}}">
            @csrf

            <div class="form-group">
                <label for="inputEmail4">Update Privilege Name</label>
                <input type="text" name="privilegename" value="{{$privilege->privilege}}" class="form-control"
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
                            class=" fa fa-user"></i> Update Privilege
                </button>
            </div>

        </form>
    </div>
    </div>
@endsection