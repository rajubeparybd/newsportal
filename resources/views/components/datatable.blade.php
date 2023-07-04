@push("styles")
    <link href="{{asset('backend/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css"/>
@endpush
<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="mt-0 header-title mb-2 clearfix">
                {{$title}}
                @if(@$button)
                    {{$button}}
                @endif
            </h3>
            <table id="responsive-datatable"
                   class="table table-bordered table-bordered dt-responsive nowrap">
                {{$slot}}
            </table>
        </div>
    </div>
</div>

@push("scripts")
    <script src="{{asset('backend/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('backend/libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('backend/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('backend/js/pages/datatables.init.js')}}"></script>
@endpush



