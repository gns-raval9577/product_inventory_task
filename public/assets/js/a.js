$(document).ready(function () {
    $('.datatable').each(function () {
        
        $(this).DataTable({
            responsive: true,
            // paging: false,
            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←' 
                }
            },
            columnDefs: [
                { orderable: false, targets: -1 },
            ],

            buttons: [{
                extend: 'print',
                footer: false,
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'csv',
                footer: false,
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }

            ]
        }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"), $(".dataTables_length select").addClass("form-select form-select-sm")
    })
})




