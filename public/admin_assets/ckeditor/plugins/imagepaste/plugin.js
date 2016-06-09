/*
 * @file image paste plugin for CKEditor
	Feature introduced in: https://bugzilla.mozilla.org/show_bug.cgi?id=490879
	doesn't include images inside HTML (paste from word): https://bugzilla.mozilla.org/show_bug.cgi?id=665341
 * Copyright (C) 2011-13 Alfonso Martínez de Lizarrondo
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * version 1.1.1: Added allowedContent settings in case the Advanced tab has been removed from the image dialog
 */

 // Handles image pasting in Firefox
CKEDITOR.plugins.add( 'imagepaste',
{
	init : function( editor )
	{

		// v 4.1 filters
		if (editor.addFeature)
		{
			editor.addFeature( {
				allowedContent: 'img[!src,id];'
			} );
		}

		// Paste from clipboard:
		editor.on( 'paste', function(e) {
			var data = e.data,
				html = (data.html || ( data.type && data.type=='html' && data.dataValue));
			if (!html)
				return;

			// strip out webkit-fake-url as they are useless:
			if (CKEDITOR.env.webkit && (html.indexOf("webkit-fake-url")>0) )
			{
				alert("Sorry, the images pasted with Safari aren't usable");
				window.open("https://bugs.webkit.org/show_bug.cgi?id=49141");
				html = html.replace( /<img src="webkit-fake-url:.*?">/g, "");
			}

			// Replace data: images in Firefox and upload them
			html = html.replace( /<img src="data:image\/png;base64,.*?" alt="">/g, function( img )
				{
					var data = img.match(/"data:image\/png;base64,(.*?)"/)[1];
					var id 	 = CKEDITOR.tools.getNextId();

					var url = editor.config.filebrowserImageUploadUrl;
					console.log('URL<<' + url);
					if (url.indexOf("?") == -1)
						url += "?";
					else
						url += "&";
					CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
					url += 'command=FileUpload&type=Files&responseType=json&currentFolder=%2F&CKEditor=' + editor.name + '&CKEditorFuncNum=2&langCode=' + editor.langCode + '&_token=' + CSRF_TOKEN;
//http://182.73.137.51:8003/ckfinder/core/connector/php/connector.php?command=FileUpload&lang=en&type=Files&currentFolder=%2F&hash=b4bd2b5a68afdd73&respo//nseType=json
					var xhr = new XMLHttpRequest();

					xhr.open("POST", url);
					xhr.onload = function() {
						// Upon finish, get the url and update the file
						
						//var imageUrl = xhr.responseText.match(/2,\s*'(.*?)',/)[1];
						var imageUrl = xhr.responseText;
						var theImage = editor.document.getById( id );
						console.log(imageUrl);
						theImage.data( 'cke-saved-src', imageUrl);
						theImage.setAttribute( 'src', imageUrl);
						theImage.removeAttribute( 'id' );
					}

					// Create the multipart data upload. Is it possible somehow to use FormData instead?
					var BOUNDARY = "---------------------------1966284435497298061834782736";
					var rn = "\r\n";
					var req = "--" + BOUNDARY;

					  req += rn + "Content-Disposition: form-data; name=\"upload\"";

						var bin = window.atob( data );
						// add timestamp?
						req += "; filename=\"" + id + ".png\"" + rn + "Content-type: image/jpg";

						req += rn + rn + bin + rn + "--" + BOUNDARY;

					req += "--";

					xhr.setRequestHeader("Content-Type", "multipart/form-data; boundary=" + BOUNDARY);
					xhr.sendAsBinary(req);

					return img.replace(/>/, ' id="' + id + '">')

				});

			if (e.data.html)
				e.data.html = html;
			else
				e.data.dataValue = html;
		});

	} //Init
} );
