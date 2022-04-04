@extends('master.master')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Panchang(नेपाली पंचांग)</h1>
            <iframe src="https://www.ashesh.com.np/panchang/widget.php?header_title=Nepali Panchang&header_color=e6e5e2&api=562133j258"
                    frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
                    style="border:none; overflow:hidden; width:100%; height:365px; border-radius:5px;"
                    allowtransparency="true">
            </iframe>
            <br><span style="color:gray; font-size:8px; text-align:left">
        </div>
    </div>
    </div>
@endsection