@extends('layouts.master')

@section('content')
    <section class="addTest body_content">
        <div class="content_container">
            <h4>Edite Product</h4>
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
            <form action="{{ route('product.update', $Product_details['id']) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12">

                        <div class="col-md-12 col-xl-6">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ $Product_details['name'] }}">
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <label for="category">Category:</label>
                            <select id="category" name="category_id" class="form-control" required>
                                @foreach ($categorydata as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $Product_details->category_id ? 'selected' : '' }}>
                                        {{ $item->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <label for="image">Image:</label>
                            <input type="file" id="imageInput" name="image" class="form-control-file"
                                value="{{ $Product_details->image }}">
                            <img id="selectedImage" src="{{ url('/assets/image/' . $Product_details->image) }}"
                                alt="Selected Image" height="50px" width="50px">
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
                                value="{{ $Product_details['price'] }}">
                        </div>
                        <div class="col-md-12 col-xl-6">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" class="form-control" rows="4">{{ $Product_details['description'] }}</textarea>
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
    <script>
        // Assume `statusValue` holds the value received (1 for active, 0 for inactive)
        var statusValue = {{ $Product_details['status'] }}; // Example value, replace it with the actual value you receive

        // Check if statusValue is 0 (inactive) or 1 (active)
        if (statusValue === 0) {
            document.getElementById("status_active").checked = false;
            document.getElementById("status_inactive").checked = true;
        } else {
            document.getElementById("status_active").checked = true;
            document.getElementById("status_inactive").checked = false;
        }


        //for image

        document.getElementById('imageInput').addEventListener('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById('selectedImage').src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
