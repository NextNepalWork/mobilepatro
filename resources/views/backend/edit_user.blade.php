@extends('master.master')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <div class="col-md-12">

                    <div class="x_panel">
                        <h2>Update User</h2>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="container">
                        <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="post"
                              action="{{route('edit-user-action')}}">
                            <input type="hidden" value="{{$userdata->id}}" name="id">
                            @csrf
                            <div class="form-group">
                                <label class="control-label " for="Privilege">Choose Privilege *</label>
                                <select name="privilege[]" id="privilege-id" multiple="multiple"
                                        class="form-control">

                                    @foreach($privilegeData as $privilege)
                                        @if($privilege->privilege)
                                            <option value="{{$privilege->id}}"
                                                    selected>{{$privilege->privilege}}
                                            </option>
                                        @endif

                                    @endforeach
                                    <option value="{{$privilege->id}}">{{$privilege->privilege}}</option>
                                </select>


                            </div>
                            <div class="form-group">
                                <label class="control-label" for="first_name">First Name <span
                                            class="required">*</span>
                                </label>
                                <input type="text" id="first_name" placeholder="Enter your first name" name="first_name"
                                       value="{{$userdata->first_name}}"
                                       class="form-control ">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="last_name">Last Name <span
                                            class="required">*</span>
                                </label>
                                <input type="text" id="last_name" placeholder="Enter your last name" name="last_name"
                                       value="{{$userdata->last_name}}"
                                       class="form-control ">
                            </div>

                            <div class="form-group">
                                <label class="control-label " for="username">Username <span
                                            class="required">*</span>
                                </label>
                                <input type="text" id="username" value="{{$userdata->username}}" name=" username"
                                       placeholder="Enter your Username"
                                       class="form-control ">
                            </div>
                            <div class="form-group">
                                <label class="control-label " for="email">Email<span
                                            class="required">*</span>
                                </label>
                                <input type="text" id="email" name="email" placeholder="enter your email address"
                                       value="{{$userdata->email}}"
                                       class="form-control ">
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label>Current Picture</label>
                                        <br>
                                        <img src="{{url('images/user/'.$userdata->image)}}" width="100">
                                        <br>
                                        <label class="control-label " for="image">Profile Picture <span
                                                    class="required">*</span>
                                        </label>

                                        <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                                             class="rounded-circle z-depth-1-half avatar-pic"
                                             width="30px" alt="example placeholder avatar">
                                        <input type="file" name="image" id="image" class="
                                       form-control ">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-user-edit"></i>
                                        Update
                                        User
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- /page content -->
@endsection
