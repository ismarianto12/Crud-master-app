/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};



CKEDITOR.editorConfig = function(config) {
   config.filebrowserBrowseUrl = '../../ckeditor/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '../../ckeditor/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '../../ckeditor/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '../../ckeditor/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '../../ckeditor/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '../../ckeditor/kcfinder/upload.php?type=flash';
};