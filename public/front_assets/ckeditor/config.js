/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{"name":"insert","groups":["insert"]},
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		{
            name: 'insert', groups: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak'
                   , 'Iframe']
        },
        
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }		
	];
	
	config.filebrowserBrowseUrl = '/ckfinder/ckfinder.html';
    //config.filebrowserUploadUrl = '/uploader/upload.php';
	config.filebrowserImageUploadUrl = '/provideradmin/newsletter/upload-paste-image';
	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';
	
	config.extraPlugins = 'filebrowser';
	config.extraPlugins = 'uploadwidget';
	config.extraPlugins = 'widget';
	config.extraPlugins = 'lineutils';
	config.extraPlugins = 'clipboard';
	config.extraPlugins = 'dialog';
	config.extraPlugins = 'filetools';
	config.extraPlugins = 'notificationaggregator';
	config.extraPlugins = 'uploadimage';
	config.extraPlugins = 'clipboard';
	config.extraPlugins = 'popup';
	config.extraPlugins = 'imagepaste'; 
	//allow class div
	config.allowedContent = true;
	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre;div';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	
};
