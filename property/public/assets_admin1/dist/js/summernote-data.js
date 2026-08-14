/*Summernote Init*/

$(function() {
	"use strict";

    // $('.web-basic-info .summernote').summernote({
    //     height: 304,
    // });
    // $('.summernote').summernote({
		// height: 300,
		// //placeholder: 'Type Description Here ....',
		// toolbar: [
		// 	["style", ["style"]],
		// 	["font", ["bold", "underline", "clear", "strikethrough", "superscript", "subscript"]],
		// 	["fontname", ["fontname"]],
		// 	["color", ["color"]],
		// 	["para", ["ul", "ol", "paragraph"]],
		// 	['cleaner',['cleaner']], // The Button
		// 	["table", ["table"]],
		// 	["insert", ["link", /*"picture",*/ "video"]],
		// 	["view", ["fullscreen", /*"codeview",*/ "help"]]
		// ],
		// cleaner:{
		// 	notTime: 5400, // Time to display Notifications.
		// 	action: 'paste', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
		// 	newline: '<br>', // Summernote's default is to use '<p><br></p>'
		// 	notStyle: 'position:absolute;top:0;left:0;right:0', // Position of Notification
		// 	icon: '<i class="fa fa-file-word-o">  Word Paste</i>',
		// 	keepHtml: true, // Remove all Html formats
		// 	keepOnlyTags: ['<p>', '<br>', '<ul>', '<li>', '<b>', '<strong>','<i>', '<a>', '<h2>', '<h3>', '<h4>', '<h5>', '<span>', '<ol>', '<h6>', '<em>', '<sup>', '<sub>'], // If keepHtml is true, remove all tags except these
		// 	keepClasses: false, // Remove Classes
		// 	badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents
		// 	badAttributes: ['style', 'start'] // Remove attributes from remaining tags
		// }
    // });
    $('.summernote-limited').summernote({
		height: 300,
		//placeholder: 'Type Description Here ....',
		toolbar: [
			//["style", ["style"]],
			["font", ["bold", "underline", "clear"]],
			//["fontname", ["fontname"]],
			["color", ["color"]],
			["para", ["ul", "ol"]],
			['cleaner',['cleaner']], // The Button
			//["table", ["table"]],
			//["insert", ["link", /*"picture",*/ "video"]],
			["view", ["fullscreen", /*"codeview","help"*/ ]]
		],
		cleaner:{
			notTime: 5400, // Time to display Notifications.
			action: 'paste', // both|button|paste 'button' only cleans via toolbar button, 'paste' only clean when pasting content, both does both options.
			newline: '<br>', // Summernote's default is to use '<p><br></p>'
			notStyle: 'position:absolute;top:0;left:0;right:0', // Position of Notification
			icon: '<i class="fa fa-file-word-o">  Word Paste</i>',
			keepHtml: true, // Remove all Html formats
			keepOnlyTags: ['<ul>', '<li>','<ol>'], // If keepHtml is true, remove all tags except these
			keepClasses: false, // Remove Classes
			badTags: ['style', 'script', 'applet', 'embed', 'noframes', 'noscript', 'html'], // Remove full tags with contents
			badAttributes: ['style', 'start'] // Remove attributes from remaining tags
		}
	});

});