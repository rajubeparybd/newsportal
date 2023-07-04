<div class="modal fade bs-example-modal-center bs-" id="staticBackdrop" data-backdrop="static" tabindex="-1"
     role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            @if(@$title)
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">{{$title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{$slot}}
        </div>
    </div>
</div>
