"use strict";
 
 
(function($) {
    $.fn.colourScheme1 = function() {
       
        return this.each(function() {
           
           
            $("th").attr("class", "header");
           
            var row = this.getElementsByTagName("tr");
           
            for(var i = 0; i < row.length; i++)
            {
                if(i%2 == 0){
                   $(row[i]).attr("class","even");            
                }
                else {
                    $(row[i]).attr("class","odd");
                }                  
        };
    });
}
})(jQuery);
 
 
 (function($) {
    $.fn.colourScheme2 = function() {
       
        return this.each(function() {
           
           
            $("th").attr("class", "alt_header");
           
            var row = this.getElementsByTagName("tr");
           
            for(var i = 0; i < row.length; i++)
            {
                if(i%2 == 0){
                   $(row[i]).attr("class","alt_even");            
                }
                else {
                    $(row[i]).attr("class","alt_odd");
                }                  
        };
    });
}
})(jQuery);
 
