// access the jquery

$(document).ready(function () {

    setTimeout(function () {
        $('.alert').hide('slow');

    }, 2000);
});

$('#privilege-id').select2({
    placeholder: "Please Select privilege" +
    "",
    tags: true,
    tokenSeparators: [',', ' ']
})

