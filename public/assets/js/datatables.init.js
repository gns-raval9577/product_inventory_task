$(document).ready(function () {
    $('.datatable').each(function () {
        $(this).DataTable({
            responsive: true,
            paging: false,
            language: {
                paginate: {
                    next: '&#8594;', // or '→'
                    previous: '&#8592;' // or '←' 
                }
            },
            columnDefs: [
                { orderable: false, targets: -1 },
            ],
        })


    })
});