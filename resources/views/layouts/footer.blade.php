@section('footer')

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; NextNepal@Horoscope 2019</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="{{url('js/app.js')}}"></script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{url('js/jquery.mtz.monthpicker.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

    <script>
        $(document).ready(function(){
            var i=1;
            $("#add_row").click(function(){
                $('#tab_logic').append('<tr id="addr'+i+'"></tr>');
                $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input type='file' name='image[]' class='form-control input-md'/> </td><td><input name='currency[]' type='text' placeholder='currency' class='form-control input-md'  /> </td><td><input  name='unit[]' type='text' placeholder='unit'  class='form-control input-md'></td><td><input  name='buying[]' type='text' placeholder='buying'  class='form-control input-md'></td><td><input  name='selling[]' type='text' placeholder='selling'  class='form-control input-md'></td>");

                i++;
            });
            $("#delete_row").click(function(){
                if(i>1){
                    $("#addr"+(i-1)).html('');
                    i--;
                }
            });

        });
    </script>
    <script>
        $(function () {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function (start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });

        $('#demo-1').monthpicker();

        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>

    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('description2');
        CKEDITOR.replace('description3');
        CKEDITOR.replace('description4');
        CKEDITOR.replace('description5');
        CKEDITOR.replace('description6');
        CKEDITOR.replace('description7');
        CKEDITOR.replace('description8');
        CKEDITOR.replace('description9');
        CKEDITOR.replace('description10');
        CKEDITOR.replace('description11');
        CKEDITOR.replace('description12');
        CKEDITOR.replace('descriptionw');
        CKEDITOR.replace('descriptionw2');
        CKEDITOR.replace('descriptionw3');
        CKEDITOR.replace('descriptionw4');
        CKEDITOR.replace('descriptionw5');
        CKEDITOR.replace('descriptionw6');
        CKEDITOR.replace('descriptionw7');
        CKEDITOR.replace('descriptionw8');
        CKEDITOR.replace('descriptionw9');
        CKEDITOR.replace('descriptionw10');
        CKEDITOR.replace('descriptionw11');
        CKEDITOR.replace('descriptionw12');
        CKEDITOR.replace('descriptionm');
        CKEDITOR.replace('descriptionm2');
        CKEDITOR.replace('descriptionm3');
        CKEDITOR.replace('descriptionm4');
        CKEDITOR.replace('descriptionm5');
        CKEDITOR.replace('descriptionm6');
        CKEDITOR.replace('descriptionm7');
        CKEDITOR.replace('descriptionm8');
        CKEDITOR.replace('descriptionm9');
        CKEDITOR.replace('descriptionm10');
        CKEDITOR.replace('descriptionm11');
        CKEDITOR.replace('descriptionm12');
        CKEDITOR.replace('descriptiony');
        CKEDITOR.replace('descriptiony2');
        CKEDITOR.replace('descriptiony3');
        CKEDITOR.replace('descriptiony4');
        CKEDITOR.replace('descriptiony5');
        CKEDITOR.replace('descriptiony6');
        CKEDITOR.replace('descriptiony7');
        CKEDITOR.replace('descriptiony8');
        CKEDITOR.replace('descriptiony9');
        CKEDITOR.replace('descriptiony10');
        CKEDITOR.replace('descriptiony11');
        CKEDITOR.replace('descriptiony12');
    </script>


@endsection