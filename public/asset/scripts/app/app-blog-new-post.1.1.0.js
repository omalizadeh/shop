/*
 |--------------------------------------------------------------------------
 | Shards Dashboards: Blog Add New Post Template
 |--------------------------------------------------------------------------
 */

'use strict';

(function ($) {
    $(document).ready(function () {
        // Init the Quill RTE
        var quill = new Quill('#editor-container', {
            modules: {
                toolbar: '.ql-toolbar'
            },
            placeholder: 'کلمات اگر درست انتخاب شوند می توانند جادو کنند...',
            theme: 'snow',
            direction: 'rtl'
        });

        quill.format('direction', 'rtl');
        quill.format('align', 'right');

    });
})(jQuery);
