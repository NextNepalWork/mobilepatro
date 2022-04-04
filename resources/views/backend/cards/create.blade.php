@extends('master.master')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
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
                <!-- page content -->
                    <div class="left" role="main">
                        <div class="">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Digital Cards

                                            </h2>

                                        </div>
                                        <div class="x_content">
                                            <br/>
                                            <form id="demo-form2" data-parsley-validate
                                                  class="form-horizontal form-label-left" method="post"
                                                  action="{{route('card.store')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                           for="title">Title
                                                    </label>
                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                        <input type="text" id="title"
                                                               name="title" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">Template</label>
                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                        <input id="middle-name" class="form-control"
                                                               type="file" name="template">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
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
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /page content -->

                </div>

            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection