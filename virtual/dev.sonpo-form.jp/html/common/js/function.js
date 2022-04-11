
/*	=========================================================================================

						common setting

			* To call the functions in this file, you must have the following js file.

				/common/js/jquery-1.7.1.min.js
				/common/js/jquery.flatheights.js

	 ……………………………………………………………………………………………………………………
		※debug comment description ：[101111]0000-0001 for debug


	=========================================================================================		*/


/*	------------------------------------------------------------------

					initialization

	------------------------------------------------------------------		*/




/*	------------------------------------------------------------------

			tab switch block

	------------------------------------------------------------------		*/
function setTabsSwitch() {
	
	var btn = $('.tabblk a.tabitem');
	var tgt = $('.tabblk .tabtgt');
	var buf1,buf2,buf3;
//	alert(act_cnt);


	// load event
	btn.flatHeights();


	// click event
	btn.click(function(){

		buf1 = $(this).attr('href');
		buf1 = buf1.replace('tab_','tabtgt_');
		buf1 = buf1.replace('#','');
//		alert(buf1);

		tgt.each(function(idx){
			if($(this).attr('id') == buf1) {

				if($(this).hasClass('hdn')) {
					tgt.addClass('hdn');
					$(this).removeClass('hdn');
				}
			}
		});

		var btn_img,buf_src,buf_str,buf_imgname,buf_imgname_act,buf_src_act;

		// switch button 

		btn.each(function(){
			$(this).parent().removeClass('act');
			
			if($(this).has('img') > 0) {
				buf1 = '';
				buf1 = $(this).has('img').children('img').attr('src');
				if((buf1 != '') && (buf1 != 'undefined')) {
					buf2 = buf1.replace('_3.','_1.');
					$(this).has('img').children('img').attr('src',buf2).addClass('rovr');
				}
			}
		});

		$(this).parent().addClass('act');

		if($(this).has('img') > 0) {
			buf1 = '';
			buf1 = $(this).has('img').children('img').attr('src');
			if((buf1 != '') && (buf1 != 'undefined')) {
				buf2 = buf1.replace('_2.','_3.');
				$(this).has('img').children('img').attr('src',buf2).removeClass('rovr');
			}
		}

		$(this).blur();

		return false;

	});


}



/*	------------------------------------------------------------------

					execution of the function

	------------------------------------------------------------------		*/
//var $j = jQuery.noConflict();

$(function(){

	setTabsSwitch();

	////////	to call these functions for customizing,
	////////	describe the code to the js file 'function.config.js'.

});


