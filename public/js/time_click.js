'use strict';

$(document).ready(function () {
    $('.multidate').click(function () {
        $(this)
            .children('span')
            .toggleClass('hidden');
    });
});