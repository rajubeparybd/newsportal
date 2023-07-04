@push("styles")
    <link rel="stylesheet" href="{{asset('backend/libs/toastr/toastr.min.css')}}">
@endpush

@push("scripts")
    <script src="{{asset('backend/libs/toastr/toastr.min.js')}}"></script>
    <script>
        toastr["{{$notification['type']}}"]("{{$notification['message']}}")
    </script>
@endpush
