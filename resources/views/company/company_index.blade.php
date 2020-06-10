@extends("layouts.app")

@section('page_css')
@endsection

@section('content-title')
    Company
@endsection

@section('content-url')
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
    <li class="breadcrumb-item active">Company</li>
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
                                        data-target="#create">Add company
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
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->website}}</td>
                                <td>
                                    <button class="btn btn-sm btn-rounded btn-outline-info"
                                            data-toggle="modal" data-target="#detail"
                                            data-name="{{$company->name}}"
                                            data-email="{{$company->email}}"
                                            data-website="{{$company->website}}">Details
                                    </button>
                                    <button class="btn btn-sm btn-rounded btn-outline-primary"
                                            data-toggle="modal" data-target="#edit"
                                            data-id="{{$company->id}}"
                                            data-name="{{$company->name}}"
                                            data-email="{{$company->email}}"
                                            data-website="{{$company->website}}">Edit
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger"
                                            data-toggle="modal" data-target="#delete"
                                            data-id="{{$company->id}}"
                                            data-name="{{$company->name}}">Delete
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
                            {{ $companies->links() }}
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

    @include('company.company_create')
    @include('company.company_edit')
    @include('company.company_detail')
    @include('company.company_delete')
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
            modal.find('.modal-body #company_id').val(button.data('id'));
            modal.find('.modal-body #company_name_').val(button.data('name'));
            modal.find('.modal-body #company_email_').val(button.data('email'));
            modal.find('.modal-body #company_website_').val(button.data('website'));

        });

        $('#detail').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);
            const modal = $(this);
            modal.find('.modal-body #company_name_s').val(button.data('name'));
            modal.find('.modal-body #company_email_s').val(button.data('email'));
            modal.find('.modal-body #company_website_s').val(button.data('website'));

        });

        $('#delete').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget);

            const message = "Are you sure you want to delete '".concat(button.data('name'), "'?");
            const modal = $(this);

            modal.find('.modal-body #message').text(message);
            modal.find('.modal-body #company_id_').val(button.data('id'))
        });

    </script>

@endpush
