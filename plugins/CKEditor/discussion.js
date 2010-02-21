jQuery(document).ready(function($) {
   
/* Options */

   // Show options (if present) when hovering over the comment.
   $('.Comment').livequery(function() {
      $(this).hover(function() {
         $(this).find('ul.Options:first').show();
      }, function() {
         $(this).find('ul.Options:first').hide();
         /*
         var opts = $(this).find('ul.Options:first');
         if (!$(opts).find('li.Parent').hasClass('Active'))
            $(opts).hide();
         */
      });
   });

});