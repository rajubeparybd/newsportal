@push("styles")
    <link href="{{asset('backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@push("scripts")
    <script src="{{asset('backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script>
        $('.show_confirm').click(function (event) {
            const form = $(this).closest("form");
            event.preventDefault();
            swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ml-2 mt-2",
                buttonsStyling: false,
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
