@extends('master.master')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Latest Exchange Rates </h1>
            <iframe src="https://www.ashesh.com.np/forex/widget2.php?api=150148j565" frameborder="0" scrolling="no"
                    marginwidth="0" marginheight="0"
                    style="border:none; overflow:hidden; width:100%; height:383px; border-radius:5px;"
                    allowtransparency="true">
            </iframe>
            <br><span style="text-align:left"></span>
        </div>
    </div>
    </div>
@endsection