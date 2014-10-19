$(document).ready(function() {
    var $btnDanger = $('.btn-danger');
    $btnDanger.on('click', function(e) {
        return confirm("Are you sure?");
    });

    }
);
