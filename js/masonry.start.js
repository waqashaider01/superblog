jQuery(window).load(function() {
/*global jQuery:false */
/*jshint devel:true, laxcomma:true, smarttabs:true */
"use strict";
      var container = document.querySelector('.blogger');
      var msnry = new Masonry( container, {
		columnWidth: '.item',
        itemSelector: '.item',            
      });  
      
});