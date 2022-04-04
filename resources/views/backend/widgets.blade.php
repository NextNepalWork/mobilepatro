@extends('master.master')
@section('content')
    <div class="container">
        <div class="row">
            <h1>दैनिक राशिफल </h1>
            <iframe src="https://www.ashesh.com.np/rashifal/widget.php?header_title=Nepali Rashifal&header_color=f0b03f&api=562139j089"
                    frameborder="0" scrolling="yes" marginwidth="0" marginheight="0"
                    style="border:none; overflow:hidden; width:100%; height:365px; border-radius:5px;"
                    allowtransparency="true">
            </iframe>
            <br><span style="color:gray; font-size:8px; text-align:left"></span>
            <br>
            <h1>Date Convert</h1>

            <div class="container">
                <iframe src="https://www.ashesh.com.np/linkdate-converter.php?h_color=21ADE2&b_color=CFE4B1&api=562135j266"
                        frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
                        style="border:none; overflow:hidden; width:100%; height:186px;"
                        allowtransparency="true"></iframe>
                <br><span
                        style="color:#6D6D6D; font-size:8px; text-align:left"></span>
                <br>
            </div>

        </div>
    </div>
    </div>
@endsection