@extends('master.master')
@section('content')
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12"
               for="title">Category
        </label>

        <form method="post" action="{{route('edit-news-action')}}">
            <input type="hidden" name="id" value="{{$news->id}}">
            @csrf
            <div class="col-md-12">

                <select class="custom-select"
                        name="category"
                        id="inputGroupSelect02">

                    @if($news->category)
                        <option value="{{$news->category}}">{{$news->category}}
                        </option>
                    @endif
                    <option value="Entertainment">Entertainment
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
                   name="title" class="form-control" value="{{$news->title}}">
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
                                                                  class="form-control">{{$news->description}}</textarea>
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

@endsection