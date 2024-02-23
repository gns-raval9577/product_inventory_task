@extends('layouts.master')

@section('content')
    <section class="addTest body_content">
        <div class="content_container">
            <h4>Add Category</h4>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <li>{{ session('success') }}</li>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <li>{{ session('error') }}</li>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            @endif
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12 col-xl-6">
                            <label for="name">Category Name:</label>
                            <input type="text" id="name" name="category_name" class="form-control" required>
                        </div>
                    </div>

                    <div class="form_footer col-md-12 col-xl-6">


                        <button type="Submit" class="form_btn purpleBtn">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
@push('scripts')
@endpush
