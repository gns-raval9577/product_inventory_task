@extends('layouts.master')

@section('content')
    <section class="body_content">
        <div class="content_container">

            <h4>All Category</h4>
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
                                        <th class="align-middle">Category Name</th>
                                        <th class="align-middle">status</th>

                                        <th class="align-middle" style="text-align: center" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getcategory as $index => $item)
                                        <tr>

                                            <td class="align-middle">
                                                {{ $item->id }}
                                            </td>
                                            <td class="align-middle">{{ $item->category_name }}</td>


                                            <td class="align-middle">
                                                @if ($item['status'] == 1)
                                                    <a class="greenBtn link_Tag sampleTag"
                                                        href="{{ route('category.status', ['id' => $item['id']]) }}">Active</a>
                                                @else
                                                    <a class="redBtn link_Tag sampleTag"
                                                        href="{{ route('category.status', ['id' => $item['id']]) }}">Inactive</a>
                                                @endif
                                            <td>

                                            <td class="align-middle">
                                                <a href={{ route('category.destroy', $item['id']) }}
                                                    class="lightBtn purpleBtn mr_btn">delete</a>
                                                <a href={{ route('category.edit', $item['id']) }}
                                                    class="lightBtn purpleBtn mr_btn">Edit</a>
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
@endpush
