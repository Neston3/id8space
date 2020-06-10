@extends("layouts.app")

@section('page_css')
@endsection

@section('content-title')
    Employee
@endsection

@section('content-url')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active">Employee</li>
@endsection

@section("content")
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                        </div>
                        <div class="col-sm-2">
                            <a href="#">
                                <button type="button" class="btn btn-block btn-outline-secondary" data-toggle="modal"
                                        data-target="#create">Add Employee
                                </button>
                            </a>
                        </div>
                    </div>
                    <br>
                    <table id="basic-datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->first_name}} {{$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>
                                    <button class="btn btn-sm btn-rounded btn-outline-info"
                                            data-toggle="modal" data-target="#detail"
                                            data-first_name="{{$employee->first_name}}"
                                            data-last_name="{{$employee->last_name}}"
                                            data-email="{{$employee->email}}"
                                            data-phone="{{$employee->phone}}"
                                            data-company_name="{{$employee->company['name']}}">Details
                                    </button>
                                    <button class="btn btn-sm btn-rounded btn-outline-primary"
                                            data-toggle="modal" data-target="#edit"
                                            data-id="{{$employee->id}}"
                                            data-first_name="{{$employee->first_name}}"
                                            data-last_name="{{$employee->last_name}}"
                                            data-email="{{$employee->email}}"
                                            data-phone="{{$employee->phone}}"
                                            data-company_name="{{$employee->company_id}}">Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger"
                                            data-toggle="modal" data-target="#delete"
                                            data-id="{{$employee->id}}"
                                            data-name="{{$employee->first_name}} {{$employee->last_name}}">Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-10">

                        </div>
                        <div class="col-md-2">
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    @include('employee.employee_create')
    @include('employee.employee_edit')
    @include('employee.employee_detail')
    @include('employee.employee_delete')
@endsection
@push("page_scripts")

    <script>
        $(function () {
            $("#basic-datatable").DataTable({
                "responsive": true,
                "autoWidth": false,
                "bPaginate": false,
                "bInfo": false,
            });

        });

        $('#edit').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const modal = $(this);
            modal.find('.modal-body #employee_id').val(button.data('id'));
            modal.find('.modal-body #first_name_').val(button.data('first_name'));
            modal.find('.modal-body #last_name_').val(button.data('last_name'));
            modal.find('.modal-body #employee_email_').val(button.data('email'));
            modal.find('.modal-body #employee_phone_').val(button.data('phone'));

            $('#company_id_').val(button.data('company_name')).change();
            // modal.find('.modal-body #company_website_').val(button.data('website'));

        });

        $('#detail').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const modal = $(this);
            modal.find('.modal-body #first_name_s').val(button.data('first_name'));
            modal.find('.modal-body #last_name_s').val(button.data('last_name'));
            modal.find('.modal-body #employee_email_s').val(button.data('email'));
            modal.find('.modal-body #employee_phone_s').val(button.data('phone'));
            modal.find('.modal-body #company_name_s').val(button.data('company_name'));

        });

        $('#delete').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);

            const message = "Are you sure you want to delete '".concat(button.data('name'), "'?");
            const modal = $(this);

            modal.find('.modal-body #message').text(message);
            modal.find('.modal-body #employee_id_').val(button.data('id'))
        });

    </script>

@endpush
