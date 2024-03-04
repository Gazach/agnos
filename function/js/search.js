$(document).ready(function () {
    $('#keyword').on('keyup', function() {
        $('#container').load('../ajax/seach.php?keyword=' + $('#keyword').val());
    });
});