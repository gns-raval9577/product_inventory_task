
//this is made by jainik

// Define a flag to track whether card addition is in progress
var addingCard = false;

$('#addChild').click(function () {
    // Check if card addition is in progress, if yes, return
    if (addingCard) {
        return;
    }

    // Set the flag to true to indicate card addition is starting
    addingCard = true;

    // Call the function to add the card
    addQue_Ans_Card(this);
});

var imageUrl = "/assets/images/icons/crossIcon.png";
var index = 1;

function addQue_Ans_Card(a) {
    const childTest_Comp = `<div class="col-md-12 form_details pd_form mb-4">
        <div class="form-group text-end">
            <button type="button" onclick="getEle(this)" class="crossBtn" data-bs-toggle="modal"
                data-bs-target="#test_alert_delete"><img src="${imageUrl}" alt="x"></button>
        </div>
        <div class="form-group">
            <label for="text-input" class="col-md-2 col-form-label">Child Test Name</label>
            <input class="form-control text-input" type="text" name="new_child_tests[${index}][name]" value=""
                id="text-input">
        </div>
        <div class="form-group">
            <label for="text-input" class="col-md-2 col-form-label">Specification/Limitations</label>
            <input class="form-control text-input" type="text"
                name="new_child_tests[${index}][specification]" value="" id="text-input">
        </div>
    </div>`;

    $(a.parentElement).before(childTest_Comp);

    // Increase the index for the next card
    index++;

    // Set a timeout to reset the flag after a short delay (adjust the time if needed)
    setTimeout(function () {
        addingCard = false;
    }, 1000);
}

function getEle(input) {
    let parentDiv = input.parentElement.parentElement;
    

    $('#deleteChild').click(function () {
        $(parentDiv).remove();
        // Reset the flag when the card is removed
        addingCard = false;
    });
}

//befor code if any issuse than uncomment this code
// $('#addChild').click(function () {
   
//     addQue_Ans_Card(this)

// })
// var imageUrl = "/assets/images/icons/crossIcon.png";
// var index = 1;
// function addQue_Ans_Card(a) {
//     const childTest_Comp = `<div class="col-md-12 form_details pd_form mb-4">
// <div class="form-group text-end">
// <button type="button" onclick="getEle(this)" class="crossBtn" data-bs-toggle="modal"
// data-bs-target="#test_alert_delete"><img src="${imageUrl}" alt="x"></button>
// </div>
// <div class="form-group">
//     <label for="text-input" class="col-md-2 col-form-label">Child Test Name</label>
//     <input class=" form-control text-input" type="text" name="new_child_tests[${index}][name]" value="" id="text-input">
// </div>
// <div class="form-group">
//     <label for="text-input" class="col-md-2 col-form-label">Specification/Limitations</label>
//     <input class=" form-control text-input" type="text" name="new_child_tests[${index}][specification]" value="" id="text-input">
//     </div>
// </div>
// </div>
// `

//     $(a.parentElement).before(childTest_Comp);

    
//     index++;
    
// }

// function getEle(input) {

//     let parentDiv = input.parentElement.parentElement
//     console.log($(parentDiv).index());

//     $('#deleteChild').click(function () {
//         $(parentDiv).remove()
//     })

// }


$(document).ready(function () {
    // Handle Delete Child Test button click
    $(".delete-child-test").click(function () {
        let childTestId = $(this).data("id");
        
        let modalId = "#deleteChildModal";

        // Set the data-id attribute for the Delete button in the modal
        $("#confirmDelete").data("id", childTestId);

        // Show the delete confirmation modal
        $(modalId).modal("show");
    });

    // Handle Confirm Delete button click
    $("#confirmDelete").click(function (e) {
        e.preventDefault();
        let childTestId = $(this).data("id");
        
        var csrfToken = $("#csrf-token").val();
        let modalId = "#deleteChildModal";
        // Send an AJAX request to delete the child test
        $.ajax({
            url: `/test/child/${childTestId}/delete`,
            type: "GET",
            data: {
                _token: csrfToken,
                id: childTestId
            },
            success: function (response) {
                // Close the delete confirmation modal
                $(modalId).modal("hide");

                // Handle the success response, e.g., remove the child test from the UI
                $(`.delete-child-test[data-id="${childTestId}"]`).closest(".form_details").remove();
                // You can add code here to update the UI as needed
            },
            error: function (error) {
                console.error("Error deleting child test: " + error.responseText);
                // Handle any errors that occur during the AJAX request
                // You can display an error message to the user if needed
            }
        });
    });

});

//end jainik



//this is made by ganesh
$('.formsubmit').on('submit', function (e) {
    e.preventDefault()
})
// Add a click event handler for the "Save" button in the modal



// $(document).ready(function () {
//     $('#requisitionSlip').modal('show')
//     $('#statusLabel').modal('show')

// })


//add Storage Condition other option
$('.storageCondition').on('change', function () {
    let value = this.value
    if (value.toLowerCase() == 'other') {

        $('.hiddenInput').css("display", "block");
    } else {
        $('.hiddenInput').css("display", "none");
    }

});


//this is parent test for sample and coa make by ganesh

$('.add-child-test-btn').on('click', function () {
    
    var parentTestId = $(this).data('parent-test-id');
    var parentTestName = $(this).closest('tr').find('td:eq(1)').text(); // Assuming the name is in the second column (index 1)

    
    $('#parent-test-id').val(parentTestId);
    $('#parent-test-name').val(parentTestName); // Set the value of the "Parent test" input field
});

//end this

//remark by ganesh


$(document).ready(function () {
    var form = $('#remarksForm');

    form.submit(function (event) {
        event.preventDefault();

        var formData = form.serialize();

        $.ajax({
            type: 'POST',
            url: '/sample/remarks', // Make sure this URL is correct
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response);
                let a = $(form).closest('#remarksModal')
                let editForm = $(a).prev('section').find('.editform');

                $(editForm)[0].submit()
                // Optionally, you can reload the page or perform other actions here
            },
            error: function (xhr, status, error) {
                console.log('Error:', error);
            }
        });
    });
});

//endremark


//dashbord 
// Get the start and end date pickers
var startDatePicker = $('.dateselect');
var endDatePicker = $('.dateselect2');

// Add an event listener to the search button
$('#searchButton').click(function () {
    // Get the start and end dates

    var startDate = startDatePicker.val();
    var endDate = endDatePicker.val();

    // Make an AJAX request to the server
    $.ajax({
        url: '/dashboard/selecteddate',
        method: 'GET',
        data: {
            startDate: startDate,
            endDate: endDate
        },
        success: function (data) {

            $('#totaldata').text(data.result);

            $('#complate').text(data.complate);

            $('#pandingsample').text(data.pandingsample);

            $('#totalclient').text(data.totalclient);

            $('#pandinginvo').text(data.pandinginvoice);

        }
    });
});

//ragister sample
$('#dateLink').click(function (e) {
    e.preventDefault()
    // Get the start and end dates
    var startDate = startDatePicker.val();
    var endDate = endDatePicker.val();

    var url = '/dashboard/registeredsample?startDate=' + startDate + '&endDate=' + endDate;
    window.location.href = url;

});

//Number Of Sample Completed
$('#samplecompleted').click(function (e) {
    e.preventDefault()
    // Get the start and end dates
    var startDate = startDatePicker.val();
    var endDate = endDatePicker.val();

    var url = '/dashboard/completedsample?startDate=' + startDate + '&endDate=' + endDate;
    window.location.href = url;

});

//Number Of Pending Sample
$('#pendingsample').click(function (e) {
    e.preventDefault()
    // Get the start and end dates
    var startDate = startDatePicker.val();
    var endDate = endDatePicker.val();
    var url = '/dashboard/pendingsample?startDate=' + startDate + '&endDate=' + endDate;
    window.location.href = url;

});

//Number Of Clients
$('#clients').click(function (e) {
    e.preventDefault()
    // Get the start and end dates
    var startDate = startDatePicker.val();
    var endDate = endDatePicker.val();
    var url = '/dashboard/totalclients?startDate=' + startDate + '&endDate=' + endDate;
    window.location.href = url;

});


//panding invoice
$('#pandinginvoice').click(function (e) {
    e.preventDefault()
    // Get the start and end dates
    var startDate = startDatePicker.val();
    var endDate = endDatePicker.val();
    // var url = '/dashboard/totalclients?startDate=' + startDate + '&endDate=' + endDate;
    var url = '/dashboard/pendinginvoice?startDate=' + startDate + '&endDate=' + endDate;
    window.location.href = url;


    //end dashbord

});




//end ganesh