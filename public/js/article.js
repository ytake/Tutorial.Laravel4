'use strict';
$(document).ready(function() {
    $("#delete").click(function () {

        if (!confirm('delete this article?')) {
            return false;
        }
        $.ajax({
            type: "DELETE",
            url: "/api/v1/article/" + $('#delete').data('id'),
            dataType: 'json'
        }).done(function(message) {
            location.href = "/managed/article";
        });
    });
});