@extends('master.master')
@section('content')
    <section id="tabs">
        <div class="container">
            <h6 class="section-title h1">View your Horoscope</h6>

            <div class="row">
                <div class="col-md-12 ">

                    <!-- ./Tabs -->
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
                            <br/>
                            <a class="btn btn-danger" href="{{route('add-horo')}}"><i class="fa fa-backward"></i>Continue
                                Adding</a>
                            <table class="table is-bordered table is-hoverable table is-fullwidth">
                                <h1 align="center">Monthly Horoscope</h1>
                                <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($monthly as $key=>$horo)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$horo->date}}</td>
                                        <td>
                                            @if(($horo->status)==0)
                                                <button class="btn btn-success" name="active"><i
                                                            class="fa fa-check"></i>Published
                                                </button>

                                            @else
                                                <button class="btn btn-danger" name="inactive"><i
                                                            class="fa fa-times"></i>Not Published
                                                </button>
                                            @endif
                                        </td>
                                        <td>{{$horo->created_at}}</td>
                                        <td>
                                            <a href="#" data-target="#asdd" data-toggle="modal"
                                               class="display1 btn btn-info" data-id="{{$horo->id}}"><i
                                                        class="fa fa-info"></i>
                                                View</a>
                                            <a href="{{route('edit-horo-monthly').'/'.$horo->id}}"
                                               data-target=".bd-example-modal"
                                               class="btn btn-primary"><i
                                                        class="fa fa-edit"></i>Edit</a>
                                            <a href="{{route('delete-horo-monthly').'/'. $horo->id}}"
                                               onclick="return confirm('Are you sure you want to delete this item?');"
                                               class="btn btn-success"><i class="fa fa-trash"></i>Delete</a>


                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>

{{$monthly->links()}}
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    </div>
@endsection

<div class="modal bd-example-modal-xl" id="asdd" tabindex="-1" role="dialog"
     aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">

</div>



@push('script')
    <script>
        var $modal = $('#asdd');
        $(document).ready(function () {
            $('.display1').click(function (e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                var tempEditUrl = "{{route('edit-m',':id')}}";
                tempEditUrl = tempEditUrl.replace(':id', id);
                $modal.load(tempEditUrl, function (response) {
                    $modal.modal({show: true});
                });
            });
        });
    </script>
@endpush