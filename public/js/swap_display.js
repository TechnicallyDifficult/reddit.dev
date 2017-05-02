'use strict';

$(document).ready(function () {
    $('.multivalue').click(function () {
        $(this)
            .children('.value')
            .toggleClass('hidden');
    });
});