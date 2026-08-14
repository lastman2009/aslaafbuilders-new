/*Tinymce Init*/

// $(function() {
// 	"use strict";
//
// 	tinymce.init({
// 	  selector: 'textarea.summernote',
// 	  height: 300,
// 	  plugins: [
// 		'advlist autolink lists link image charmap print preview anchor',
// 		'searchreplace visualblocks code fullscreen',
// 		'insertdatetime media table contextmenu paste code'
// 	  ],
// 	  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
//
// 	});
// });
/*Tinymce Init*/

$(function() {
    "use strict";
    var cleanHTML = function(input) {
        console.log("BEFORE >");
        console.log(input);


        // 1. remove line breaks / Mso classes
        var stringStripper = /(\n|\r| class=(")?Mso[a-zA-Z]+(")?)/g;
        var output = input.replace(stringStripper, ' ');

        console.log("STEP 1 >");
        console.log(output);

        // 2. strip Word generated HTML comments
        var commentSripper = new RegExp('<!--(.*?)-->', 'g');
        var output = output.replace(commentSripper, '');

        console.log("STEP 2 >");
        console.log(output);

        // 3. remove tags leave content if any
        var tagStripper = new RegExp('<(\/)*(title|meta|link|span|\\?xml:|st1:|o:|font)(.*?)>', 'gi');
        output = output.replace(tagStripper, '');

        console.log("STEP 3 >");
        console.log(output);

        // 4. Remove everything in between and including tags '<style(.)style(.)>'
        var badTags = ['style', 'script', 'applet', 'embed', 'noframes', 'noscript'];

        for (var i = 0; i < badTags.length; i++) {
            var tagStripper = new RegExp('<' + badTags[i] + '.*?' + badTags[i] + '(.*?)>', 'gi');
            output = output.replace(tagStripper, '');
        }

        console.log("STEP 4 >");
        console.log(output);

        // A different attempt
        //output = (output).replace(/font-family\:[^;]+;?|font-size\:[^;]+;?|line-height\:[^;]+;?/g, '');

        // 5. remove attributes ' style="..."'
        var badAttributes = ['start', 'align'];
        for (var i = 0; i < badAttributes.length; i++) {
            var attributeStripper = new RegExp(' ' + badAttributes[i] + '="(.*?)"', 'gi');
            output = output.replace(attributeStripper, '');
        }

        console.log("STEP 5 >");
        console.log(output);

        return output;
    };

    tinymce.init({
        selector: '.property-section textarea.summernote',
        //theme: "inlite",
        height: 255,
        menubar: true,
        skin: 'myskinlightblack',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table contextmenu paste help',
            'textcolor colorpicker',
            'directionality',
            'wordcount',
            'charactercount'
        ],
        wordcount_cleanregex: /[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g,
        toolbar: 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | pastetext | insert table | ltr rtl | custom_tooltip | searchreplace | removeformat fullscreen',
        convert_fonts_to_spans: true,
        paste_word_valid_elements: "b,strong,i,em,h1,h2,u,p,ol,ul,li,a[href],span,color,font-size,font-color,font-family,mark,table,tr,td",
        paste_retain_style_properties: "all",
        //paste_postprocess: function(plugin, args) {
        //    args.node.innerHTML = cleanHTML(args.node.innerHTML);
        //},
        setup: function(editor) {
            // Register tooltip button
            editor.addButton('custom_tooltip', {
                text: 'Tooltip',
                title: 'Add a tool tip to the selected text.',
                onclick: function() {
                    editor.windowManager.open({
                        title: 'Insert Tooltip',
                        body: [{
                            type: 'textbox',
                            name: 'tooltipText',
                            label: 'Tooltip Text',
                            value: ''
                        }],
                        onsubmit: function(e) {
                            var title = e.data.tooltipText;
                            var content = editor.selection.getContent();
                            editor.insertContent('<span class="tooltip" title="' + title + '">' + content + '</span>');
                        }
                    });
                }
            });
        },
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });

    tinymce.init({
        selector: 'textarea.blog-tinymice',
        height: 285,
        menubar: true,
        skin: 'myskinlightblack',
        extended_valid_elements :'img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|onclick|name]',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table contextmenu paste help',
            'textcolor colorpicker',
            'directionality',
            'wordcount',
            'charactercount',
            'spellchecker',
            'code'
        ],
//        spellchecker_rpc_url: 'localhost/ephox-spelling',
        spellchecker_language: 'en',
        wordcount_cleanregex: /[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g,
        toolbar: 'undo redo | styleselect | bold italic forecolor backcolor fontsizeselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | pastetext | insert table | ltr rtl | custom_tooltip | spellchecker searchreplace | removeformat code fullscreen',
        convert_fonts_to_spans: true,
        fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 22px 24px 36px",
        paste_word_valid_elements: "b,strong,i,em,h1,h2,u,p,ol,ul,li,a[href],span,color,font-size,font-color,font-family,mark,table,tr,td",
        paste_retain_style_properties: "all",
        //paste_postprocess: function(plugin, args) {
        //    args.node.innerHTML = cleanHTML(args.node.innerHTML);
        //},
        setup: function(editor) {
            // Register tooltip button
            editor.addButton('custom_tooltip', {
                text: 'Tooltip',
                title: 'Add a tool tip to the selected text.',
                onclick: function() {
                    editor.windowManager.open({
                        title: 'Insert Tooltip',
                        body: [{
                            type: 'textbox',
                            name: 'tooltipText',
                            label: 'Tooltip Text',
                            value: ''
                        }],
                        onsubmit: function(e) {
                            var title = e.data.tooltipText;
                            var content = editor.selection.getContent();
                            editor.insertContent('<span class="tooltip" title="' + title + '">' + content + '</span>');
                        }
                    });
                }
            });
        },
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']

    });

    tinymce.init({
        selector: 'textarea.summernote-limited',
        //theme: "inlite",
        height: 260,
        menubar: false,
        skin: 'myskinlightblack',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace fullscreen',
            'insertdatetime table contextmenu paste',
            'textcolor colorpicker',
            'directionality',
            'wordcount',
            'charactercount'
        ],
        wordcount_cleanregex: /[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g,
        toolbar: 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | pastetext | link table | ltr rtl | custom_tooltip | searchreplace | removeformat fullscreen',
        convert_fonts_to_spans: true,
        paste_word_valid_elements: "b,strong,i,em,h1,h2,u,p,ol,ul,li,a[href],span,color,font-size,font-color,font-family,mark,table,tr,td",
        paste_retain_style_properties: "all",
        //paste_postprocess: function(plugin, args) {
        //    args.node.innerHTML = cleanHTML(args.node.innerHTML);
        //},
        setup: function(editor) {
            // Register tooltip button
            editor.addButton('custom_tooltip', {
                text: 'Tooltip',
                title: 'Add a tool tip to the selected text.',
                onclick: function() {
                    editor.windowManager.open({
                        title: 'Insert Tooltip',
                        body: [{
                            type: 'textbox',
                            name: 'tooltipText',
                            label: 'Tooltip Text',
                            value: ''
                        }],
                        onsubmit: function(e) {
                            var title = e.data.tooltipText;
                            var content = editor.selection.getContent();
                            editor.insertContent('<span class="tooltip" title="' + title + '">' + content + '</span>');
                        }
                    });
                }
            });
        },
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });

    

    tinymce.init({
        selector: 'textarea.summernote',
        //theme: "inlite",
		height: 235,
        menubar: true,
        skin: 'myskinlightblack',
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks fullscreen',
            'insertdatetime media table contextmenu paste help',
            'textcolor colorpicker',
            'directionality',
            'wordcount',
            'charactercount'
        ],
        wordcount_cleanregex: /[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g,
        toolbar: 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | pastetext | insert table | ltr rtl | custom_tooltip | searchreplace | removeformat fullscreen',
        convert_fonts_to_spans: true,
        paste_word_valid_elements: "b,strong,i,em,h1,h2,u,p,ol,ul,li,a[href],span,color,font-size,font-color,font-family,mark,table,tr,td",
        paste_retain_style_properties: "all",
        //paste_postprocess: function(plugin, args) {
        //    args.node.innerHTML = cleanHTML(args.node.innerHTML);
        //},
        setup: function(editor) {
            // Register tooltip button
            editor.addButton('custom_tooltip', {
                text: 'Tooltip',
                title: 'Add a tool tip to the selected text.',
                onclick: function() {
                    editor.windowManager.open({
                        title: 'Insert Tooltip',
                        body: [{
                            type: 'textbox',
                            name: 'tooltipText',
                            label: 'Tooltip Text',
                            value: ''
                        }],
                        onsubmit: function(e) {
                            var title = e.data.tooltipText;
                            var content = editor.selection.getContent();
                            editor.insertContent('<span class="tooltip" title="' + title + '">' + content + '</span>');
                        }
                    });
                }
            });
        },
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
    });
});