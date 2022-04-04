@extends('master.master')
@section('content')

    <?php
    // $newsapi = simplexml_load_file("https://www.onlinekhabar.com/feed");
    // $json = json_encode($newsapi);
    // $newsdecode = json_decode($json, true);
    // $data = $newsdecode['channel'];
    // $datat = $data['title'];
    // $data2 = $data['item'];
    
     if (ini_get('allow_url_fopen') == true) {
            $newsapi = simplexml_load_file("https://www.onlinekhabar.com/feed");
            $json = json_encode($newsapi);
            $newsdecode = json_decode($json, true);
            $data = $newsdecode['channel'];
             $datat = $data['title'];
             $data2 = $data['item'];
        } else if (function_exists('curl_init')) {
            $curl = curl_init("https://www.onlinekhabar.com/feed");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($curl);
            curl_close($curl);
            $newsapi = simplexml_load_string($result);
            $json = json_encode($newsapi);
            $newsdecode = json_decode($json, true);
            $data = $newsdecode['channel'];
             $datat = $data['title'];
             $data2 = $data['item'];
        } else {
            // Enable 'allow_url_fopen' or install cURL.
            throw new \Exception("Can't load data.");
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">

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
                                                          action="{{route('add-news-action')}}"
                                                          enctype="multipart/form-data">
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
                                                                <button class="btn btn-primary" type="button">Cancel
                                                                </button>
                                                                <button class="btn btn-primary" type="reset">Reset
                                                                </button>
                                                                <button type="submit" name="submit"
                                                                        class="btn btn-success">
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
            <div class="col-xl-5 col-lg-5">
                <div class="card shadow mb-8">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py- d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">News And Updates(RSS FEEDS)</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Dropdown Header:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 align="center" class="mt-0"></h1>
                                    <h5><?=$data['title'] ?> <?=$data['description'] ?></h5>
                                    <h5></h5>
                                    <?php foreach ($data2 as $value): ?>
                                    <h6><a target="_blank" href="<?=$value['link'] ?>"><?=$value['title']?></a></h6>
                                    <p>
                                        <h9> <?=$value['pubDate'] ?></h9>

                                    </p>


                                    <?php  endforeach; ?>
                                </div>

                            </div>
                        </div>

                        <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                            <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>

@endsection