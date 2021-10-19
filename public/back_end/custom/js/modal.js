$(function() {
    //Initialize Select2 Elements
    var title = $('#msg').attr('title');
    var p = $('#msg').val();
    if (p == 'success') {
        toastr.success(title)
    } else if (p == 'error') {
        toastr.error(title)
    } else {
        toastr.info('Successful reload')
    }

});