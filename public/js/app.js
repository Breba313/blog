$(document).ready(function() {
    $('#table_id').DataTable({
        "bSort": true,
    });

});

function validateForm() {
    var x = document.getElementById("newPostForm");
    var n = 0;
    var i;
    for (i = 0; i < x.length; i++) {
        if (x.elements[i].value != '') {
            n++;
        }
    }

    if (n > 2) {
        var r = confirm("There is data entered in the form, do you want to discard this information and continue?");
        if (r == true) {
            window.history.back(-1);
        }
    } else {
        window.history.back(-1);
    }
}