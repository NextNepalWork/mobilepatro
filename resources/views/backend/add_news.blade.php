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
                                            <h2>News Content

                                            </h2>

                                        </div>
                                        <div class="x_content">
                                            <br/>
                                            <form id="demo-form2" data-parsley-validate
                                                  class="form-horizontal form-label-left" method="post"
                                                  action="{{route('add-news-action')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                           for="title">Category
                                                    </label>
                                                    <div class="col-md-12">

                                                        <select class="custom-select"
                                                                name="category"
                                                                id="inputGroupSelect02">

                                                            <option value="0" selected
                                                                    disabled>Please
                                                                select
                                                                news category
                                                            </option>
                                                            <option value="Entertainment">Entertainment
                                                                (Mar 21-Apr 19)
                                                            </option>
                                                            <option value="Business">Business
                                                            </option>
                                                            <option value="Life Style">Life Style
                                                            </option>
                                                            <option value="Sports">Sports
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                           for="title">News Title
                                                    </label>
                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                        <input type="text" id="title"
                                                               name="title" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle-name"
                                                           class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                        <input id="middle-name" class="form-control"
                                                               type="file" name="image">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                                                           for="description">Provide your News Description
                                                    </label>
                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                        <textarea id="description" name="description"
                                                                  class="form-control"></textarea>
                                                    </div>
                                                </div>


                                                <div class="ln_solid"></div>
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