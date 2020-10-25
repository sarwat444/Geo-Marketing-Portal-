
$(function () {

	'use strict';
   $('#dataTables-example').DataTable({
                        responsive: true
                });
$(window).load(function(){
    $(".loading").fadeOut(10000);
});
 
    /*
	$('.login-page h1 span').click(function () {

		$(this).addClass('selected').siblings().removeClass('selected');

		$('.login-page form').hide();

		$('.' + $(this).data('class')).fadeIn(100);

	});


*/



	// Trigger The Selectboxit

	

	// Hide Placeholder On Form Focus

	$('[placeholder]').focus(function () {

		$(this).attr('data-text', $(this).attr('placeholder'));

		$(this).attr('placeholder', '');

	}).blur(function () {

		$(this).attr('placeholder', $(this).attr('data-text'));

	});

	// Add Asterisk On Required Field

	$('input').each(function () {

		if ($(this).attr('required') === 'required') {

			$(this).after('<span class="asterisk">*</span>');

		}

	});


         function get_submedcine() {
		var parentID = jQuery('#child').val();


		jQuery.ajax({
			url: '/graduation/submedcine.php',
			type: 'post',
			data: {parentID : parentID},
			success: function(data) {
				jQuery('#medcine').html(data);
			},
			error: function() {
				alert("Something went wrong with the child options!");
			},
		});
	}
	jQuery('select[name="child"]').change(get_submedcine);



         function get_child_options() {
		var parentID = jQuery('#parent').val();


		jQuery.ajax({
			url: '/graduation/child.php',
			type: 'post',
			data: {parentID : parentID},
			success: function(data) {
				jQuery('#child').html(data);
			},
			error: function() {
				alert("Something went wrong with the child options!");
			},
		});
	}
	jQuery('select[name="parent"]').change(get_child_options);


    
    
    /* get clinic child */
             function get_clinic_options() {
		var parentID = jQuery('#parent1').val();


		jQuery.ajax({
			url: '/graduation/child2.php',
			type: 'post',
			data: {parentID : parentID},
			success: function(data) {
				jQuery('#child1').html(data);
			},
			error: function() {
				alert("Something went wrong with the child options!");
			},
		});
	}
	jQuery('select[name="parent1"]').change(get_clinic_options);
    
    /*get pharmacy child*/
     function get_pharmacy_options() {
		var parentID = jQuery('#parent2').val();


		jQuery.ajax({
			url: '/graduation/child2.php',
			type: 'post',
			data: {parentID : parentID},
			success: function(data) {
				jQuery('#child2').html(data);
			},
			error: function() {
				alert("Something went wrong with the child options!");
			},
		});
	}
	jQuery('select[name="parent2"]').change(get_pharmacy_options);
    

	// Confirmation Message On Button

	$('.confirm').click(function () {

		return confirm('Are You Sure?');

	});

	$('.live').keyup(function () {

		$($(this).data('class')).text($(this).val());

	});

});







/*start  loading */


/*end loading*/