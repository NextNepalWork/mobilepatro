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
                            <section id="tabs">
                                <div class="container">
                                    <h6 class="section-title h1">Add your horoscope</h6>
                                    <div class="row">
                                        <div class="col-xs-12 ">
                                            <nav>
                                                <div class="nav nav-tabs nav-fill" id="nav-tab"
                                                     role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab"
                                                       data-toggle="tab" href="#nav-home" role="tab"
                                                       aria-controls="nav-home"
                                                       aria-selected="true">Daily(दैनिक)</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab"
                                                       data-toggle="tab" href="#nav-profile" role="tab"
                                                       aria-controls="nav-profile" aria-selected="false">Weekly(
                                                        साप्ताहिक)</a>
                                                    <a class="nav-item nav-link" id="nav-contact-tab"
                                                       data-toggle="tab" href="#nav-contact" role="tab"
                                                       aria-controls="nav-contact"
                                                       aria-selected="false">Monthly(मासिक)</a>
                                                    <a class="nav-item nav-link" id="nav-about-tab"
                                                       data-toggle="tab" href="#nav-about" role="tab"
                                                       aria-controls="nav-about"
                                                       aria-selected="false">Yearly(बार्षिक)</a>
                                                </div>
                                            </nav>
                                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home"
                                                     role="tabpanel" aria-labelledby="nav-home-tab">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="x_panel">


                                                                <!-- Tabs -->
                                                                <section id="tabs">
                                                                    <div class="container">
                                                                        <h1>Please Enter your Daily Horoscope
                                                                            Description </h1>
                                                                        <h4>( राशिफल को विवरण दिनुहोस )</h4>
                                                                        <hr>
                                                                        <form method="post"
                                                                              action="{{route('save-daily')}}">
                                                                            @csrf
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <h6>Select Date</h6>
                                                                                <div class='col-sm-8'>

                                                                                    <div class="form-group">

                                                                                        <input type="date"
                                                                                               class="form-control"
                                                                                               name="date"
                                                                                               class="datetimepicker">

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                            <div id="demo-form" data-parsley-validate>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="fullname">1.
                                                                                            Aries(मेष)
                                                                                            (Mar 21-Apr 19)</label>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="description">Description
                                                                                            </label>
                                                                                            <textarea id="description"
                                                                                                      name="aries"
                                                                                                      class="form-control">{{old('aries')}}</textarea>
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
                                                                                            <textarea id="description2"
                                                                                                      name="taurus"
                                                                                                      class="form-control">{{old('taurus')}}</textarea>
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

                                                                                            <textarea id="description3"
                                                                                                      name="gemini"
                                                                                                      class="form-control">{{old('gemini')}}</textarea>
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
                                                                                                        class="form-control">{{old('cancer')}}</textarea>
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

                                                                                            <textarea id="description5"
                                                                                                      name="leo"
                                                                                                      class="form-control">{{old('leo')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                                   for="description">6.
                                                                                                Virgo(कन्या)
                                                                                                (Aug 23-Sep 22)
                                                                                            </label>
                                                                                            <textarea id="description6"
                                                                                                      name="virgo"
                                                                                                      class="form-control">{{old('virgo')}}</textarea>
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
                                                                                            <textarea id="description7"
                                                                                                      name="libra"
                                                                                                      class="form-control">{{old('libra')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                                   for="description">8.
                                                                                                Scorpio(वृश्चिक)
                                                                                                (Oct 23-Nov 21)
                                                                                            </label>
                                                                                            <textarea id="description8"
                                                                                                      name="scorpio"
                                                                                                      class="form-control">{{old('scorpio')}}</textarea>
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

                                                                                            <textarea id="description9"
                                                                                                      name="sagittarius"
                                                                                                      class="form-control">{{old('sagittarius')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="description">10.
                                                                                                Capricorn(मकर)
                                                                                                (Dec 22-Jan 19)
                                                                                            </label>

                                                                                            <textarea id="description10"
                                                                                                      name="capricorn"
                                                                                                      class="form-control">{{old('capricorn')}}</textarea>
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

                                                                                            <textarea id="description11"
                                                                                                      name="aquarius"
                                                                                                      class="form-control">{{old('aquarius')}}</textarea>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="description">12.
                                                                                                Pisces(मीन)
                                                                                                (Feb 19-Mar 20)
                                                                                            </label>

                                                                                            <textarea id="description12"
                                                                                                      name="pisces"
                                                                                                      class="form-control">{{old('pisces')}}</textarea>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                                        <button class="btn btn-primary"
                                                                                                type="button">Cancel
                                                                                        </button>
                                                                                        <button class="btn btn-primary"
                                                                                                type="reset">Reset
                                                                                        </button>
                                                                                        <button onclick=""
                                                                                                type="submit"
                                                                                                name="submit"
                                                                                                class="btn btn-success">
                                                                                            Submit
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
                                                <div class="tab-pane fade" id="nav-profile"
                                                     role="tabpanel"
                                                     aria-labelledby="nav-profile-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="x_panel">

                                                                <!-- Tabs -->
                                                                <section id="tabs">
                                                                    <div class="container">
                                                                        <h1>Please Enter your Weekly Horoscope
                                                                            Description </h1>
                                                                        <h4>( राशिफल को विवरण दिनुहोस )</h4>


                                                                        <hr>
                                                                        <form method="post"
                                                                              action="{{route('save-weekly')}}">
                                                                            @csrf
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <h6>Select Weekly Date Range</h6>
                                                                                <div class="form-group">
                                                                                    <div class="row">


                                                                                        <input type="text"
                                                                                               name="daterange"
                                                                                               class="form-control"
                                                                                               value="01/01/2018 - 01/15/2018"/>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                            <div id="demo-form" data-parsley-validate>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="fullname">1.
                                                                                            Aries(मेष)
                                                                                            (Mar 21-Apr 19)</label>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="description">Description
                                                                                            </label>
                                                                                            <textarea id="descriptionw"
                                                                                                      name="ariesw"
                                                                                                      class="form-control">{{old('ariesw')}}</textarea>
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
                                                                                            <textarea id="descriptionw2"
                                                                                                      name="taurusw"
                                                                                                      class="form-control">{{old('taurusw')}}</textarea>
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

                                                                                            <textarea id="descriptionw3"
                                                                                                      name="geminiw"
                                                                                                      class="form-control">{{old('geminiw')}}</textarea>
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
                                                                                                        id="descriptionw4"
                                                                                                        name="cancerw"
                                                                                                        class="form-control">{{old('cancerw')}}</textarea>
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

                                                                                            <textarea id="descriptionw5"
                                                                                                      name="leow"
                                                                                                      class="form-control">{{old('leow')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                                   for="description">6.
                                                                                                Virgo(कन्या)
                                                                                                (Aug 23-Sep 22)
                                                                                            </label>
                                                                                            <textarea id="descriptionw6"
                                                                                                      name="virgow"
                                                                                                      class="form-control">{{old('virgow')}}</textarea>
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
                                                                                            <textarea id="descriptionw7"
                                                                                                      name="libraw"
                                                                                                      class="form-control">{{old('libraw')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                                   for="description">8.
                                                                                                Scorpio(वृश्चिक)
                                                                                                (Oct 23-Nov 21)
                                                                                            </label>
                                                                                            <textarea id="descriptionw8"
                                                                                                      name="scorpiow"
                                                                                                      class="form-control">{{old('scorpiow')}}</textarea>
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

                                                                                            <textarea id="descriptionw9"
                                                                                                      name="sagittariusw"
                                                                                                      class="form-control">{{old('sagittariusw')}}</textarea>
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
                                                                                                    id="descriptionw10"
                                                                                                    name="capricornw"
                                                                                                    class="form-control">{{old('capricornw')}}</textarea>
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
                                                                                                    id="descriptionw11"
                                                                                                    name="aquariusw"
                                                                                                    class="form-control">{{old('aquariusw')}}</textarea>

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
                                                                                                    id="descriptionw12"
                                                                                                    name="piscesw"
                                                                                                    class="form-control">{{old('piscesw')}}</textarea>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                                        <button class="btn btn-primary"
                                                                                                type="button">Cancel
                                                                                        </button>
                                                                                        <button class="btn btn-primary"
                                                                                                type="reset">Reset
                                                                                        </button>
                                                                                        <button onclick=""
                                                                                                type="submit"
                                                                                                name="submit"
                                                                                                class="btn btn-success">
                                                                                            Submit
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
                                                <div class="tab-pane fade" id="nav-contact"
                                                     role="tabpanel"
                                                     aria-labelledby="nav-contact-tab">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="x_panel">


                                                                <!-- Tabs -->
                                                                <section id="tabs">
                                                                    <div class="container">
                                                                        <h1>Please Enter your Monthly Horoscope
                                                                            Description </h1>
                                                                        <h4>( राशिफल को विवरण दिनुहोस )</h4>
                                                                        <hr>
                                                                        <form method="post"
                                                                              action="{{route('save-monthly')}}">
                                                                            @csrf
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <h6>Select Month</h6>


                                                                                <div class='col-sm-8'>
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           name="date" id="demo-1">

                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                            <div id="demo-form" data-parsley-validate>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="fullname">1.
                                                                                            Aries(मेष)
                                                                                            (Mar 21-Apr 19)</label>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="description">Description
                                                                                            </label>
                                                                                            <textarea id="descriptionm"
                                                                                                      name="ariesm"
                                                                                                      class="form-control">{{old('ariesm')}}</textarea>
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
                                                                                            <textarea id="descriptionm2"
                                                                                                      name="taurusm"
                                                                                                      class="form-control">{{old('taurusm')}}</textarea>
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

                                                                                            <textarea id="descriptionm3"
                                                                                                      name="geminim"
                                                                                                      class="form-control">{{old('geminim')}}</textarea>
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
                                                                                                        id="descriptionm4"
                                                                                                        name="cancerm"
                                                                                                        class="form-control">{{old('cancerm')}}</textarea>
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

                                                                                            <textarea id="descriptionm5"
                                                                                                      name="leom"
                                                                                                      class="form-control">{{old('leom')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                                   for="description">6.
                                                                                                Virgo(कन्या)
                                                                                                (Aug 23-Sep 22)
                                                                                            </label>
                                                                                            <textarea id="descriptionm6"
                                                                                                      name="virgom"
                                                                                                      class="form-control">{{old('virgom')}}</textarea>
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
                                                                                            <textarea id="descriptionm7"
                                                                                                      name="libram"
                                                                                                      class="form-control">{{old('libram')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                                   for="description">8.
                                                                                                Scorpio(वृश्चिक)
                                                                                                (Oct 23-Nov 21)
                                                                                            </label>
                                                                                            <textarea id="descriptionm8"
                                                                                                      name="scorpiom"
                                                                                                      class="form-control">{{old('scorpiom')}}</textarea>
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

                                                                                            <textarea id="descriptionm9"
                                                                                                      name="sagittariusm"
                                                                                                      class="form-control">{{old('sagittariusm')}}</textarea>
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
                                                                                                    id="descriptionm10"
                                                                                                    name="capricornm"
                                                                                                    class="form-control">{{old('capricornm')}}</textarea>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="descriptionm11">11.
                                                                                                Aquarius(कुम्भ)
                                                                                                (Jan 20-Feb 18)
                                                                                            </label>

                                                                                            <textarea
                                                                                                    id="descriptionm11"
                                                                                                    name="aquariusm"
                                                                                                    class="form-control">{{old('aquariusm')}}</textarea>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="descriptionm12">12.
                                                                                                Pisces(मीन)
                                                                                                (Feb 19-Mar 20)
                                                                                            </label>

                                                                                            <textarea
                                                                                                    id="descriptionm12"
                                                                                                    name="piscesm"
                                                                                                    class="form-control">{{old('piscesm')}}</textarea>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                                        <button class="btn btn-primary"
                                                                                                type="button">Cancel
                                                                                        </button>
                                                                                        <button class="btn btn-primary"
                                                                                                type="reset">Reset
                                                                                        </button>
                                                                                        <button onclick=""
                                                                                                type="submit"
                                                                                                name="submit"
                                                                                                class="btn btn-success">
                                                                                            Submit
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
                                                <div class="tab-pane fade" id="nav-about"
                                                     role="tabpanel"
                                                     aria-labelledby="nav-about-tab">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="x_panel">


                                                                <!-- Tabs -->
                                                                <section id="tabs">
                                                                    <div class="container">
                                                                        <h1>Please Enter your Yearly Horoscope
                                                                            Description </h1>
                                                                        <h4>( राशिफल को विवरण दिनुहोस )</h4>
                                                                        <hr>
                                                                        <form method="post"
                                                                              action="{{route('save-yearly')}}">
                                                                            @csrf
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <h6>Select Year</h6>
                                                                                <div class='col-sm-8'>
                                                                                    <input type="text"
                                                                                           name="date"
                                                                                           class="form-control"
                                                                                           id="datepicker"/>
                                                                                </div>
                                                                            </div>
                                                                            <hr>

                                                                            <div id="demo-form" data-parsley-validate>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="fullname">1.
                                                                                            Aries(मेष)
                                                                                            (Mar 21-Apr 19)</label>
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="descriptiony">Description
                                                                                            </label>
                                                                                            <textarea id="descriptiony"
                                                                                                      name="ariesy"
                                                                                                      class="form-control">{{old('ariesy')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="fullname">2.
                                                                                            Taurus(वृष)
                                                                                            (Apr 20-May 20)</label>

                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-6 col-sm-3 col-xs-12"
                                                                                                   for="descriptiony">Description
                                                                                            </label>
                                                                                            <textarea id="descriptiony2"
                                                                                                      name="taurusy"
                                                                                                      class="form-control">{{old('taurusy')}}</textarea>
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
                                                                                                   for="descriptiony3">Description
                                                                                            </label>

                                                                                            <textarea id="descriptiony3"
                                                                                                      name="geminiy"
                                                                                                      class="form-control">{{old('geminiy')}}</textarea>
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
                                                                                                       for="descriptiony4">Description
                                                                                                </label>

                                                                                                <textarea
                                                                                                        id="descriptiony4"
                                                                                                        name="cancery"
                                                                                                        class="form-control">{{old('cancery')}}</textarea>
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

                                                                                            <textarea id="descriptiony5"
                                                                                                      name="leoy"
                                                                                                      class="form-control">{{old('leoy')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                                   for="description">6.
                                                                                                Virgo(कन्या)
                                                                                                (Aug 23-Sep 22)
                                                                                            </label>
                                                                                            <textarea id="descriptiony6"
                                                                                                      name="virgoy"
                                                                                                      class="form-control">{{old('virgoy')}}</textarea>
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
                                                                                            <textarea id="descriptiony7"
                                                                                                      name="libray"
                                                                                                      class="form-control">{{old('libray')}}</textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="control-label col-md-8 col-sm-3 col-xs-12"
                                                                                                   for="description">8.
                                                                                                Scorpio(वृश्चिक)
                                                                                                (Oct 23-Nov 21)
                                                                                            </label>
                                                                                            <textarea id="descriptiony8"
                                                                                                      name="scorpioy"
                                                                                                      class="form-control">{{old('scorpioy')}}</textarea>
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

                                                                                            <textarea id="descriptiony9"
                                                                                                      name="sagittariusy"
                                                                                                      class="form-control">{{old('sagittariusy')}}</textarea>
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
                                                                                                    id="descriptiony10"
                                                                                                    name="capricorny"
                                                                                                    class="form-control">{{old('capricorny')}}</textarea>
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
                                                                                                    id="descriptiony11"
                                                                                                    name="aquariusy"
                                                                                                    class="form-control">{{old('aquariusy')}}</textarea>

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
                                                                                                    id="descriptiony12"
                                                                                                    name="piscesy"
                                                                                                    class="form-control">{{old('piscesy')}}</textarea>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                                                        <button class="btn btn-primary"
                                                                                                type="button">Cancel
                                                                                        </button>
                                                                                        <button class="btn btn-primary"
                                                                                                type="reset">Reset
                                                                                        </button>
                                                                                        <button onclick=""
                                                                                                type="submit"
                                                                                                name="submit"
                                                                                                class="btn btn-success">
                                                                                            Submit
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

                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>
                    </div>
                    <!-- /page content -->

                </div>

            </div>
        </div>
    </div>
    </div>

    <script>

        function add() {
            swal("Added!", "You have added!", "success");
        }
    </script>
@endsection