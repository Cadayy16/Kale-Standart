(function($){

	SpeciaCompanionInstallTheme = {

		/**
		 * Init
		 */
		init: function() {
			this._bind();
		},

		/**
		 * Binds events for the Hotspot.
		 *
		 * @since 1.3.2
		 * 
		 * @access private
		 * @method _bind
		 */
		_bind: function()
		{
			$( document ).on( 'click', '.clever-fox-theme-not-installed', SpeciaCompanionInstallTheme._install_and_activate );
			$( document ).on( 'click', '.clever-fox-theme-installed-but-inactive', SpeciaCompanionInstallTheme._activateTheme );
			$( document ).on('wp-theme-install-success' , SpeciaCompanionInstallTheme._activateTheme);
		},

		/**
		 * Activate Theme
		 *
		 * @since 1.3.2
		 */
		_activateTheme: function( event, response ) {
			event.preventDefault();
			//alert(JSON.stringify(response));
			//alert(response.slug);
			
			$('#specia-theme-activation-xl a.xl-install-action').addClass('processing');

			if( response ) {
				$('#specia-theme-activation-xl a.xl-install-action').text( CleverFoxInstallThemeVars.installed );
				var theme_slug =response.slug;
			} else {
				$('#specia-theme-activation-xl a.xl-install-action').text( CleverFoxInstallThemeVars.activating );
				var theme_slug = $(this).data('theme-slug') || '';
			}

			// WordPress adds "Activate" button after waiting for 1000ms. So we will run our activation after that.
			setTimeout( function() {

				$.ajax({
					url: CleverFoxInstallThemeVars.ajaxurl,
					type: 'POST',
					data: {
						'action' : 'clever-fox-activate-theme',
						security : CleverFoxInstallThemeVars.security,
						specia_current_theme: theme_slug
					},
				})
				.done(function (result) {
					if( result.success ) {
						$('#specia-theme-activation-xl a.xl-install-action').text( CleverFoxInstallThemeVars.activated );
						$('#specia-theme-activation-xl a.xl-install-action').removeClass( 'shake' );

						setTimeout(function() {
							location.reload();
						}, 1000);
					}

				});

			}, 3000 );

		},

		/**
		 * Install and activate
		 *
		 * @since 1.3.2
		 * 
		 * @param  {object} event Current event.
		 * @return void
		 */
		_install_and_activate: function(event ) {
			event.preventDefault();
			var theme_slug = $(this).data('theme-slug') || '';
			console.log( theme_slug );
			console.log( 'yes' );

			var btn = $( event.target );

			if ( btn.hasClass( 'processing' ) ) {
				return;
			}

			btn.text( CleverFoxInstallThemeVars.installing ).addClass('processing');
			$('#specia-theme-activation-php').text( theme_slug );
			//alert(theme_slug);
			//alert(theme_slug);
		//	var data = {
		//		action: 'clever-fox-activate-theme',
			//	security : CleverFoxInstallThemeVars.security,
			//	specia_current_theme: theme_slug
		  //};
		  // $.post(CleverFoxInstallThemeVars.ajaxurl, data, function(response) {
			//	jQuery("#specia-theme-activation-php").html(response);
			//	alert('Product id is: ' + data.specia_current_theme);
				//alert(response);
		 //  });
			if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
				wp.updates.requestFilesystemCredentials( event );
			}
			
			wp.updates.installTheme( {
				slug: theme_slug
			});
		}

	};

	/**
	 * Initialize
	 */
	$(function(){
		SpeciaCompanionInstallTheme.init();
	});

})(jQuery);