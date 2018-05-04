@if(Session::has('flash_message'))
    <script>
        swal({
            title: "{{ Session::get('flash_message') }}",
            text: "\"this message will disappear after 4 sec",
            timer: 4000,
            icon: "success",
            showConfirmButton:false,
            button: "Thank You!",
        });
    </script>
    @endif