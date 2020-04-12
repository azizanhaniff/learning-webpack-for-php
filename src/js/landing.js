import './bootstrap.js';

import '../css/landing.css';

$(function() {
    $("form").submit(function(event) {
        event.preventDefault();
    });

    $("[data-toggle='tab']").click(function() {
        $(this).removeClass("active");
        $("[role='alert']").addClass("d-none");
    });

    $("[id$='ModalButton']").click(function() {
        let modalId = $(this).attr("id").substring(0, $(this).attr("id").length - 6);
        $(`#${modalId}`).modal('show');
    });
});
