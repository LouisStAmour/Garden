function nl2br (str, is_xhtml) {
    // http://kevin.vanzonneveld.net
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Philip Peterson
    // +   improved by: Onno Marsman
    // +   improved by: Atli Þór
    // +   bugfixed by: Onno Marsman
    // +      input by: Brett Zamir (http://brett-zamir.me)
    // +   bugfixed by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +   improved by: Brett Zamir (http://brett-zamir.me)
    // +   improved by: Maximusya
    // *     example 1: nl2br('Kevin\nvan\nZonneveld');
    // *     returns 1: 'Kevin<br />\nvan<br />\nZonneveld'
    // *     example 2: nl2br("\nOne\nTwo\n\nThree\n", false);
    // *     returns 2: '<br>\nOne<br>\nTwo<br>\n<br>\nThree<br>\n'
    // *     example 3: nl2br("\nOne\nTwo\n\nThree\n", true);
    // *     returns 3: '<br />\nOne<br />\nTwo<br />\n<br />\nThree<br />\n'

    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';

    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

function br2nl(str) {
    // http://www.jslab.dk/library/String.br2nl
    return (str + '').replace(/<br\s*\/?>/mg,"\n");
}

var numberOfInstances = 0;

$(function() {
	var ckconfig = {
		toolbar:
		[
			['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink'],
			['UIColor']
		],
		uiColor: '#fff'
	};

	// Initialize the editor.
	// Callback function can be passed and executed after full instance creation.
	$('textarea.TextBox').livequery(function() {
		if($(this).added === undefined) {
			$(this).attr("id",$(this).attr("id")+"_"+numberOfInstances++); // Need to ensure ID is unique.
			//$(this).val(nl2br($(this).val()));
			$(this).ckeditor(ckconfig);
			$(this).added = true;
		}
	});
});