@extends('master.master')
@section('content')
    <div class="x_panel">
        <h2>Exchange Rates</h2>
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
        <div class="row clearfix">
            <div class="col-md-12 column">
                <form method="post" class="form-group" action="{{route('update-forex')}}" enctype="multipart/form-data">
                    @csrf
                <table class="table table-bordered table-hover" id="tab_logic">
                    <thead>
                    <tr >
                        <th class="text-center">
                            #
                        </th>
                        <th class="text-center">
                            Country
                        </th>
                        <th class="text-center" width="24%">
                            Image
                        </th>
                        <th class="text-center">
                            Currency
                        </th>
                        <th class="text-center" width="10%">
                            Unit
                        </th>
                        <th class="text-center" width="15%">
                            Buying
                        </th>
                        <th class="text-center" width="15%">
                            Selling
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('usa_image')) }}" alt="{{ isset($forex) ? $forex->getForex('usa_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            USA
                        </td>
                        <td>
                            <input type="file" name="usa_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="usa_currency"  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('usa_currency') : '' }}" />
                        </td>
                        <td>
                            <input type="number" name='usa_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('usa_unit') : '' }}" />
                        </td>
                        <td>
                            <input type="text" name='usa_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('usa_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='usa_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('usa_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('europe_image')) }}" alt="{{ isset($forex) ? $forex->getForex('europe_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            Europe
                        </td>
                        <td>
                            <input type="file" name="europe_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='europe_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('europe_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='europe_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('europe_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='europe_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('europe_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='europe_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('europe_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            3
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('uk_image')) }}" alt="{{ isset($forex) ? $forex->getForex('uk_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            UK
                        </td>
                        <td>
                            <input type="file" name="uk_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='uk_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('uk_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='uk_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('uk_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='uk_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('uk_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='uk_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('uk_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            4
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('australia_image')) }}" alt="{{ isset($forex) ? $forex->getForex('australia_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            Australia
                        </td>
                        <td>
                            <input type="file" name="australia_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='australia_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('australia_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='australia_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('australia_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='australia_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('australia_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='australia_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('australia_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            5
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('canada_image')) }}" alt="{{ isset($forex) ? $forex->getForex('canada_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            Canada
                        </td>
                        <td>
                            <input type="file" name="canada_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='canada_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('canada_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='canada_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('canada_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='canada_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('canada_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='canada_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('canada_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            6
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('switzerland_image')) }}" alt="{{ isset($forex) ? $forex->getForex('switzerland_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            Switzerland
                        </td>
                        <td>
                            <input type="file" name="switzerland_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='switzerland_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('switzerland_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='switzerland_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('switzerland_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='switzerland_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('switzerland_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='switzerland_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('switzerland_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            7
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('china_image')) }}" alt="{{ isset($forex) ? $forex->getForex('china_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            China
                        </td>
                        <td>
                            <input type="file" name="china_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='china_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('china_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='china_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('china_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='china_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('china_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='china_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('china_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            8
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('japan_image')) }}" alt="{{ isset($forex) ? $forex->getForex('japan_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            Japan
                        </td>
                        <td>
                            <input type="file" name="japan_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='japan_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('japan_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='japan_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('japan_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='japan_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('japan_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='japan_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('japan_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            9
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('saudi_image')) }}" alt="{{ isset($forex) ? $forex->getForex('saudi_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            Saudi Arab
                        </td>
                        <td>
                            <input type="file" name="saudi_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='saudi_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('saudi_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='saudi_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('saudi_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='saudi_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('saudi_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='saudi_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('saudi_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            10
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('singapore_image')) }}" alt="{{ isset($forex) ? $forex->getForex('singapore_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            Singapore
                        </td>
                        <td>
                            <input type="file" name="singapore_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='singapore_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('singapore_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='singapore_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('singapore_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='singapore_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('singapore_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='singapore_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('singapore_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            11
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('qatar_image')) }}" alt="{{ isset($forex) ? $forex->getForex('qatar_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            Qatar
                        </td>
                        <td>
                            <input type="file" name="qatar_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='qatar_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('qatar_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='qatar_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('qatar_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='qatar_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('qatar_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='qatar_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('qatar_selling') : '' }}"/>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            12
                        </td>
                        <td>
                            @if(isset($forex))
                            <img src="{{ asset('images/flags/' . $forex->getForex('thailand_image')) }}" alt="{{ isset($forex) ? $forex->getForex('thailand_currency') : '' }}" style="max-height: 30px;max-width: 30px;">
                            @endif
                            Thailand
                        </td>
                        <td>
                            <input type="file" name="thailand_image" class="form-control">
                        </td>
                        <td>
                            <input type="text" name='thailand_currency'  placeholder='currency' class="form-control" value="{{ isset($forex) ? $forex->getForex('thailand_currency') : '' }}"/>
                        </td>
                        <td>
                            <input type="number" name='thailand_unit' placeholder='unit' class="form-control" value="{{ isset($forex) ? $forex->getForex('thailand_unit') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='thailand_buying' placeholder='buying' class="form-control" value="{{ isset($forex) ? $forex->getForex('thailand_buying') : '' }}"/>
                        </td>
                        <td>
                            <input type="text" name='thailand_selling' placeholder='selling' class="form-control" value="{{ isset($forex) ? $forex->getForex('thailand_selling') : '' }}"/>
                        </td>

                    </tr>

                    </tbody>
                </table>


            </div>
        </div>
        {{-- <a id="add_row" class="btn btn-default pull-left"><i class="fa fa-plus"></i>Add Row</a><a id='delete_row' class="pull-right btn btn-default"><i class="fa fa-times">Delete Row</i></a> --}}
        <div class="form-group">
            <button type="submit" class="btn-secondary">Update Currency</button>
        </div>
    </div>
    </form>
    </div>
@stop

