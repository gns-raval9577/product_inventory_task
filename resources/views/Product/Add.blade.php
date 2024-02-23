@extends('layouts.master')

@section('content')
    <section class="addTest body_content">
        <div class="content_container">
            <h4>Add Product</h4>
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
            <form class="mt-4" method="post" action="{{ route('product.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-12 col-xl-6">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <label for="category">Category:</label>
                            <select id="category" name="category_id" class="form-control" required>
                                @foreach ($categorydata as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <label for="image">Image:</label>

                            <input type="file" value="" name="image" placeholder="Image" class="form-control">
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <label>Status:</label><br>
                            <input type="radio" id="status_active" name="status" value="1" checked>
                            <label for="status_active">Active</label><br>
                            <input type="radio" id="status_inactive" name="status" value="0">
                            <label for="status_inactive">Inactive</label><br>
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <label for="price">Price:</label>
                            <input type="number" id="price" name="price" class="form-control" step="0.01"
                                required>
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                        </div>


                    </div>

                    <div class="form_footer col-md-12 col-xl-6">
                        <a href="" class="form_btn redBtn mr_btn">Cancel</a>

                        <button type="Submit" class="form_btn purpleBtn">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
@push('scripts')
@endpush
