toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};


//////////////////////////filter datatable////////////////////
function generateField(tableID) {
    var inputContainer = tableID.find('.filter-data input, .filter-data select');
    var formData = {};
    $.each(inputContainer, function (i, v) {
        formData[$(this).attr('name')] = $(this).val();
    });
    return formData;
}

$('.filter-data .filter-column').keypress(function (e) {
    if (e.which == 13)  // the enter key code
    {
        $(this).closest('tr').find('.filter-action[data-action="apply"]').click();
        return false;
    }
});

function resetField(tableID) {
    $.each(tableID.find('.filter-data input, .filter-data select'), function (i, v) {
        $(this).val('');
    });
}

$(document.body).on('click', '.filter-action', function () {
    var obj = $(this);
    var action = obj.data('action');
    var tableID = obj.parents('table').attr('id');
    if (action == 'cancel') {
        resetField($('#' + tableID));
    }
    $('#' + tableID).DataTable().draw();
});
