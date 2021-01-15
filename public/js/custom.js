/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).on('click', '.btn-delete', function() {
    const url = $(this).data('url');

    $('#form-delete').attr('action', url);

    $('#modal-delete').modal();
})