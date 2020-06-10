<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('companies.destroy','id') }}" method="post">
                @csrf
                @method("DELETE")
                <div class="modal-body">
                    <div id="message"></div>


                    <input type="hidden" id="company_id_" name="company_id">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary btn-sm" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-outline-danger btn-sm">Yes</button>
                </div>
            </form>

        </div>
    </div>
</div>
