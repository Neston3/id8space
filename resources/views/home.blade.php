@extends("layouts.app")

@section('page_css')
@endsection

@section('content-title')
    Dashboard
@endsection

@section('content-url')
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section("content")

@endsection
@push("page_scripts")

@endpush
