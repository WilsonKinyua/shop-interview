    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
     <!--===============================================================================================-->
    <script>
        $('.js-pscroll').each(function() {
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function() {
                ps.update();
            })
        });
        
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
     <!--===============================================================================================-->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <!--===============================================================================================-->
    <script>
        flatpickr('#timePicker', {
        enableTime: true,
        enableSeconds: true
        });
    </script>
     <!--===============================================================================================-->
    <script>
           $(document).ready(function() {

                    load_data();
                    function load_data(query = '') {
                            $.ajax({
                                url: "store.php",
                                method: "POST",
                                data: { query: query },
                                success: function(data) {
                                    $('tbody').html(data);
                                }
                            })
                    }

                    $('#search_filter').change(function() {
                            $('#store_owner').val($('#search_filter').val());
                            var query = $('#store_owner').val();
                            load_data(query);
                    });

        });
    </script>
     <!--===============================================================================================-->


    </body>

</html>