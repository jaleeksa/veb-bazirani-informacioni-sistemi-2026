$(document).ready(function () {
    $("training-edit delete-thumb a").click(function () {
        if (!confirm('Da li ste sigurni da želite da obrišete ovu sliku?'))
            return false;
    });
});