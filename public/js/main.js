$(document).ready(function () {
    $('button[name="clear"]').click(function (e) {
        e.preventDefault();
        $(':input').not('input[name="_token"]').val('')
    });
});

