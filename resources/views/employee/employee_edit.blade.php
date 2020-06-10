<div class="modal fade" id="edit" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="panel-body">
                    <form method="POST" action="{{route('employees.update','id')}}">
                        @csrf
                        @method("put")
                        <div class="row">
                            <div class="form-group col-md-12 row">
                                <label for="department"
                                       class="col-md-4 col-form-label text-md-right">First Name <font
                                        color="red">*</font></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" id="first_name_" name="first_name"
                                           maxlength="45" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                <label for="department"
                                       class="col-md-4 col-form-label text-md-right">Last Name <font
                                        color="red">*</font></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" id="last_name_" name="last_name"
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
                                    <input class="form-control" type="email" id="employee_email_" name="employee_email"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12 row">
                                <label for="department"
                                       class="col-md-4 col-form-label text-md-right">Phone <font color="red">*</font></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" id="employee_phone_" name="employee_phone"
                                           maxlength="45" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-12 row">
                            <label for="department"
                                   class="col-md-4 col-form-label text-md-right">Company <font
                                    color="red">*</font></label>
                            <div class="col-md-8">
                                <select class="form-control" name="company_id" id="company_id_" required>
                                    <option value="" selected disabled>Select Company...</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <input type="hidden" id="employee_id" name="employee_id">

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
