
$(document).ready(function () {
    // executes when HTML-Document is loaded and DOM is ready
    getPagination('#table-id');
});
//getPagination('.table-class');
//getPagination('table');

/*					PAGINATION 
- on change max rows select options fade out all rows gt option value mx = 5
- append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
- each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
- fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
- fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
*/


function getPagination(table) {
    console.log('asdfsdfadfasdfasdf----------');

    var lastPage = 1;

    let optionValue = $('#maxRows')[0]
    var conceptName = $('#maxRows').find(":selected").text()
    var conceptName2 = $('#maxRows').find(":selected").val();
    console.log(optionValue.value, '--------asdfasdfafda--');
    console.log(conceptName, '--------asdfasdfafdaasdfasfasdfasdfasfasf ----------');
    console.log(conceptName2, '--------asdfasdfafdaasdfasfasdfasdfasfasf ----------');

    $('#maxRows')
        .on('change', function (evt) {
            //$('.paginationprev').html('');						// reset pagination

            lastPage = 1;
            $('.pagination')
                .find('li')
                .slice(1, -1)
                .remove();
            var trnum = 0; // reset tr counter
            var maxRows = parseInt($(this).val()); // get Max Rows from select option
            console.log(maxRows, "this si max rowwsssssssssssssss");
            if (maxRows == 5000) {
                $('.pagination').hide();
            } else {
                $('.pagination').show();
            }

            var totalRows = $(table + ' tbody tr').length; // numbers of rows
            $(table + ' tr:gt(0)').each(function () {
                // each TR in  table and not the header
                trnum++; // Start Counter
                if (trnum > maxRows) {
                    // if tr number gt maxRows

                    $(this).hide(); // fade it out
                }
                if (trnum <= maxRows) {
                    $(this).show();
                } // else fade in Important in case if it ..
            }); //  was fade out to fade it in
            if (totalRows > maxRows) {
                // if tr total rows gt max rows option
                var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
                maxPage = pagenum
                console.log(pagenum, 'this is page num');
                //	numbers of pages
                for (var i = 1; i <= pagenum;) {

                    // for each page append pagination li
                    $('.pagination #prev')
                        .before(
                            '<li data-page="' + i + '" class="page-item">\
                                    <span class="page-link">' +
                            i++ +
                            '<span class="sr-only"></span></span>\
                            </li>'
                        )
                        .show();

                } // end for i
                // if (pagenum > 4) {
                //     $('.pagination #prev')
                //         .before(
                //             '<li data-page="nextPage"  class="page-item">\
                //                     <span class="page-link">' +
                //             '<span class="sr-only">...</span></span>\
                //             </li>'
                //         )
                //         .show();
                // }
                console.log(lastPage, " this is the last page");
            } // end if row count > max rows
            $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
            $('.pagination li').on('click', function (evt) {

                // on click each page
                evt.stopImmediatePropagation();
                evt.preventDefault();
                var pageNum = $(this).attr('data-page'); // get it's number

                // if (lastPage > 4) {
                //     console.log('last page is greate');
                //     $('.pagination #prevBtn')
                //         .after(
                //             '<li data-page="prevPage"  class="page-item">\
                //                 <span class="page-link">' +
                //             '<span class="sr-only">...</span></span>\
                //         </li>'
                //         )
                //         .show();
                // }


                var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

                console.log(maxRows, 'this is the max rowwwwwwwwwwwww');

                if (pageNum == 'prev') {
                    if (lastPage == 1) {
                        return;
                    }
                    pageNum = --lastPage;
                }
                if (pageNum == 'next') {
                    if (lastPage == $('.pagination li').length - 2) {
                        return;
                    }
                    console.log('called');
                    pageNum = ++lastPage;
                }
                // if (pageNum == 'nextPage') {

                //     if (lastPage == $('.pagination li').length - 2) {
                //         console.log(lastPage, "to returnb");
                //         return;
                //     }

                //     // if (checkType == "string") {
                //     //     console.log(pageNum,'inside stiring if');
                //     //     pageNum = 4;
                //     // }
                //     pageNum = lastPage + 4;

                //     if (pageNum > maxPage) {
                //         console.log(pageNum, lastPage, maxPage, 'Indside if');
                //         pageNum = maxPage - 1;
                //         return;
                //     }

                //     // pageNum = lastPage + 5;
                //     console.log(pageNum, 'pageNUm');

                // }

                // if (pageNum == 'prevPage') {
                //     console.log('asdfasdfasdfasd');
                //     if (lastPage == $('.pagination li').length - 2) {
                //         console.log(lastPage, "to returnb");
                //         return;
                //     }

                //     // if (checkType == "string") {
                //     //     console.log(pageNum,'inside stiring if');
                //     //     pageNum = 4;
                //     // }
                //     pageNum = lastPage - 4;

                //     if (pageNum < maxPage) {
                //         console.log(pageNum, lastPage, maxPage, 'Indside if');
                //         pageNum = maxPage + 1;
                //         return;
                //     }

                //     // pageNum = lastPage + 5;
                //     console.log(pageNum, 'pageNUm');

                // }

                lastPage = pageNum;
                var trIndex = 0; // reset tr counter
                $('.pagination li').removeClass('active'); // remove active class from all li
                $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
                // $(this).addClass('active');					// add active class to the clicked
                limitPagging();
                $(table + ' tr:gt(0)').each(function () {
                    // each tr in table not the header
                    trIndex++; // tr index counter
                    // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
                    if (
                        trIndex > maxRows * pageNum ||
                        trIndex <= maxRows * pageNum - maxRows
                    ) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    } //else fade in
                }); // end of for each tr in table
            }); // end of on click pagination list
            limitPagging();
        }).val(optionValue.value)
        .change();

    // end of on select change

    // END OF PAGINATION
}

function limitPagging() {
    // alert($('.pagination li').length)

    if ($('.pagination li').length > 7) {
        if ($('.pagination li.active').attr('data-page') <= 3) {
            $('.pagination li:gt(5)').hide();
            $('.pagination li:lt(5)').show();
            $('.pagination [data-page="next"]').show();
            // $('.pagination [data-page="nextPage"]').show();
            // $('.pagination [data-page="prevPage"]').show();
        } if ($('.pagination li.active').attr('data-page') > 3) {
            $('.pagination li:gt(0)').hide();
            $('.pagination [data-page="next"]').show();
            // $('.pagination [data-page="nextPage"]').show();
            // $('.pagination [data-page="prevPage"]').show();
            for (let i = (parseInt($('.pagination li.active').attr('data-page')) - 2); i <= (parseInt($('.pagination li.active').attr('data-page')) + 2); i++) {
                $('.pagination [data-page="' + i + '"]').show();

            }

        }
    }
}

// $(function () {
//     // Just to append id number for each row
//     $('table tr:eq(0)').prepend('<th> ID </th>');

//     var id = 0;

//     $('table tr:gt(0)').each(function () {
//         id++;
//         $(this).prepend('<td>' + id + '</td>');
//     });
// });

//  Developed By Yasser Mas
// yasser.mas2@gmail.com
