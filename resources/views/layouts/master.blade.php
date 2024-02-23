<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- BootStrap 5 link -->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="./assets/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="./assets/css/datatables.net.buttons.bootstrap5.min.css">

    <!--- Select Picker Link --->
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-select.min.css') }}">

    <!-- Sidebar CSS  -->
    <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/css/sidebars.css') }}" />

    <!--  Date Picker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/datepicker.css">


    <title>Product Inventory</title>
    <!-- <script src="{{ asset('/assets/js/jquery-3.7.0.min.js') }}"></script> -->


    {{-- serach for use --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">
</head>

<body id="body-pd" class="body-pd">

    <header class="header body-pd" id="header">
        <div class="header_toggle">
            <i class="bx bx-menu" id="header-toggle"><img id="header-toggle"
                    src="{{ asset('/assets/images/icons/menu.svg') }}" alt="" /></i>
        </div>
       
    </header>

    <!-- Sidebar  -->
    @include('layouts.sidebar')

    <!-- Page Content  -->
    @yield('content')

    <!--Container Main end-->
</body>

<script src="{{ asset('/assets/js/jquery-3.7.0.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"
    integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous">
</script>



<script src="{{ asset('/assets/js/popper.min.js') }}"></script>


<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/js/bootstrap.dist.min.js') }}"></script>

<script src="{{ asset('/assets/js/sidebar.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>

{{-- ---------------- Datatable ----------------------- --}}

<script src="{{ asset('/assets/js/dataTables.min.js') }}"></script>
<script src="{{ asset('/assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('/assets/js/a.js') }}"></script>


<script src="{{ asset('/assets/libs/datatables.net-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/assets/libs/datatables.net-buttons/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('/assets/libs/datatables.net-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/assets/libs/datatables.net-buttons/buttons.html5.min.js') }}"></script>
{{-- ----------------------- --}}
<script src="{{ asset('/assets/js/show-hide-password.js') }}"></script>
{{-- ---------------- Datepicker ----------------------- --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
    integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.dateselect').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true,
        endDate: new Date()
        // star
    })

    $('.dateselect2').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true,
        todayHighlidht: true,
        endDate: new Date()
    })

    $('.selectpicker').selectpicker();

</script>
{{-- ----------------Multi Selectpicker ----------------------- --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"
    integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('.selectpicker').selectpicker();
</script>



@stack('scripts')

</html>
