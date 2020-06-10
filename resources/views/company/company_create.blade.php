<div class="modal fade" id="create" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">New Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="panel-body">
                    <form method="POST" action="{{route('companies.store')}}" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12 row">
                                <label for="department"
                                       class="col-md-4 col-form-label text-md-right">Name <font
                                        color="red">*</font></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" id="company_name" name="company_name"
                                           maxlength="45" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                <label for="department"
                                       class="col-md-4 col-form-label text-md-right">Email <font
                                        color="red">*</font></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="email" id="company_email" name="company_email"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                <label for="department"
                                       class="col-md-4 col-form-label text-md-right">Website <font color="red">*</font></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" id="company_website" name="company_website"
                                           maxlength="45" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                <label for="department"
                                       class="col-md-4 col-form-label text-md-right">Logo <font
                                        color="red">*</font></label>
                                <div class="col-md-8">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="logo" id="customFile" accept="image/*">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="save_btn">Save</button>
                        </div>
                    </form>
                </div>


            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
