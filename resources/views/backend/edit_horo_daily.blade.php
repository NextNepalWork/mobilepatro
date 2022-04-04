@extends('master.master')
@section('content')
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

                                        <div class="x_content">
                                            <br/>

                                            <form id="demo-form2" data-parsley-validate
                                                  class="form-horizontal form-label-left" method="post"
                                                  action="{{route('edit-horo-daily-action')}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$horo->id}}">


                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="x_panel">


                                                            <!-- Tabs -->
                                                            <section id="tabs">
                                                                <div class="container">
                                                                    <h1>Update your Daily Horoscope
                                                                        for {{$horo->date}}
                                                                        Description </h1>
                                                                    <h4>( राशिफल को विवरण दिनुहोस )</h4>
                                                                    <a class="btn btn-danger"
                                                                       href="{{route('show-horo-daily')}}"><i
                                                                                class="fa fa-backward"></i>Back</a>
                                                                    <hr>
                                                                    <form method="post"
                                                                          action="{{route('save-daily')}}">
                                                                        @csrf
                                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                                            <h6>Select Date</h6>
                                                                            <div class='col-sm-8'>

                                                                                <div class="form-group">

                                                                                    <input type="date"
                                                                                           value="{{$horo->date}}"
                                                                                           class="form-control"
                                                                                           name="date"
                                                                                           class="datetimepicker">

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>

                                                                        <div id="demo-form"
                                                                             data-parsley-validate>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="fullname">1.
                                                                                        Aries(मेष)
                                                                                        (Mar 21-Apr 19)</label>
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                               for="description">Description
                                                                                        </label>
                                                                                        <textarea
                                                                                                id="description"
                                                                                                name="aries"
                                                                                                class="form-control">{{$horo->aries}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label for="fullname">2.
                                                                                        Taurus(वृष)
                                                                                        (Apr 20-May 20)</label>

                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                               for="description">Description
                                                                                        </label>
                                                                                        <textarea
                                                                                                id="description2"
                                                                                                name="taurus"
                                                                                                class="form-control">{{$horo->taurus}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <label for="fullname">3.
                                                                                        Gemini(मिथुन)
                                                                                        (May 21-June 20)</label>
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                               for="description">Description
                                                                                        </label>

                                                                                        <textarea
                                                                                                id="description3"
                                                                                                name="gemini"
                                                                                                class="form-control">{{$horo->gemini}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="fullname">4.
                                                                                            Cancer(कर्कट)
                                                                                            (June 21-July
                                                                                            22)</label>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="description">Description
                                                                                            </label>

                                                                                            <textarea
                                                                                                    id="description4"
                                                                                                    name="cancer"
                                                                                                    class="form-control">{{$horo->cancer}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                               for="description">5.
                                                                                            Leo(सिंह)
                                                                                            (July 23-Aug 22)
                                                                                        </label>

                                                                                        <textarea
                                                                                                id="description5"
                                                                                                name="leo"
                                                                                                class="form-control">{{$horo->leo}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                               for="description">6.
                                                                                            Virgo(कन्या)
                                                                                            (Aug 23-Sep 22)
                                                                                        </label>
                                                                                        <textarea
                                                                                                id="description6"
                                                                                                name="virgo"
                                                                                                class="form-control">{{$horo->virgo}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                               for="description">7.
                                                                                            Libra(तुला)
                                                                                            (Sep 23-Oct 22)
                                                                                        </label>
                                                                                        <textarea
                                                                                                id="description7"
                                                                                                name="libra"
                                                                                                class="form-control">{{$horo->libra}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                               for="description">8.
                                                                                            Scorpio(वृश्चिक)
                                                                                            (Oct 23-Nov 21)
                                                                                        </label>
                                                                                        <textarea
                                                                                                id="description8"
                                                                                                name="scorpio"
                                                                                                class="form-control">{{$horo->scorpio}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                               for="description">9.
                                                                                            Sagittarius(धनु)
                                                                                            (Nov 22-Dec 21)
                                                                                        </label>

                                                                                        <textarea
                                                                                                id="description9"
                                                                                                name="sagittarius"
                                                                                                class="form-control">{{$horo->sagittarius}}</textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                               for="description">10.
                                                                                            Capricorn(मकर)
                                                                                            (Dec 22-Jan 19)
                                                                                        </label>

                                                                                        <textarea
                                                                                                id="description10"
                                                                                                name="capricorn"
                                                                                                class="form-control">{{$horo->capricorn}}</textarea>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                               for="description11">11.
                                                                                            Aquarius(कुम्भ)
                                                                                            (Jan 20-Feb 18)
                                                                                        </label>

                                                                                        <textarea
                                                                                                id="description11"
                                                                                                name="aquarius"
                                                                                                class="form-control">{{$horo->aquarius}}</textarea>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                               for="description">12.
                                                                                            Pisces(मीन)
                                                                                            (Feb 19-Mar 20)
                                                                                        </label>

                                                                                        <textarea
                                                                                                id="description12"
                                                                                                name="pisces"
                                                                                                class="form-control">{{$horo->pisces}}</textarea>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                                    <a class="btn btn-danger"
                                                                                       href="{{route('show-horo-daily')}}"><i
                                                                                                class="fa fa-backward"></i>Back</a>
                                                                                    <button onclick=""
                                                                                            type="submit"
                                                                                            name="submit"
                                                                                            class="btn btn-success">
                                                                                        <i class="fa fa-edit"></i>
                                                                                        Update
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                            </section>
                                                            <!-- ./Tabs -->


                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>

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

@endsection