@extends('layouts.master')

@section('content')
    <section class="body_content">
        <div class="content_container">

            <h4>All Products</h4>
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
            <div class="row mt-3">
                <div class="col-md-6 d-flex align-items-end">

                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body tableoverflow">
                            <table id="productTable"
                                style="font-family: arial, sans-serif;
                            border-collapse: collapse;
                            width: 100%;">
                                <thead>
                                    <tr
                                        style="border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;">
                                        <th class="align-middle">id</th>
                                        <th class="align-middle">Product Name</th>
                                        <th class="align-middle">category</th>
                                        <th class="align-middle">image</th>
                                        <th class="align-middle">price</th>
                                        <th class="align-middle">description</th>
                                        <th class="align-middle" style="text-align: center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="search-results-table-product">

                                    @foreach ($Product_Data as $index => $item)
                                        <tr class="product-row" data-product-id="{{ $item->id }}"
                                            style="border: 1px solid #dddddd;
                                          text-align: left;
                                          padding: 8px;">

                                            <td class="align-middle">
                                                {{ $item->id }}
                                            </td>
                                            <td class="align-middle">{{ $item->name }}</td>
                                            <td class="align-middle">

                                                @if ($item->category !== null && $item->category->category_name !== null)
                                                    {{ $item->category->category_name }}
                                                @else
                                                    NA
                                                @endif
                                            </td>

                                            <td class="align-middle">
                                                <img id="selectedImage" src="{{ url('/assets/image/' . $item->image) }}"
                                                    alt="not found  image" height="50px" width="50px">
                                            </td>
                                            <td class="align-middle">
                                                <input type="text" class="price-input" value="{{ $item->price }}">
                                                <button class="lightBtn greenBtn mr_btn change-price-btn"
                                                    data-product-id="{{ $item->id }}">Change Price</button>
                                            </td>
                                            <td class="align-middle">
                                                {{ $item->description }}
                                            </td>
                                            <td>
                                                <a href="{{ route('product.edit', $item->id) }}"
                                                    class="lightBtn purpleBtn mr_btn">Edit</a>

                                                <a href="" class="lightBtn redBtn mr_btn delete-product">Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>


        </div>

    </section>





@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Add click event listener to delete product links
            $(".delete-product").click(function(e) {

                console.log("sdjkh");
                e.preventDefault();
                var row = $(this).closest('tr'); // Get the parent row
                var productId = row.data('product-id'); // Get the product ID from the data attribute
                // Send AJAX request to delete the product

                // Get CSRF token value from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({

                    url: '/delete-product/' + productId, // Replace with your delete endpoint
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Include CSRF token in the headers
                    },
                    success: function(response) {
                        // Remove the row from the table upon successful deletion
                        row.remove();
                        alert("Product deleted successfully!");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error deleting product. Please try again later.");
                    }
                });
            });




            // Add click event listener to change price button
            $(".change-price-btn").click(function(e) {
                e.preventDefault();

                // Get the product ID from the button's data attribute
                var productId = $(this).data('product-id');

                // Get the price value from the input field
                var newPrice = $(this).closest('td').find('.price-input').val();

                // Send AJAX request to update the price
                $.ajax({
                    url: '/update-price/' + productId,
                    method: 'PUT',
                    data: {
                        price: newPrice
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert("Price updated successfully!");
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error updating price. Please try again later.");
                    }
                });
            });
        });
    </script>
@endpush
