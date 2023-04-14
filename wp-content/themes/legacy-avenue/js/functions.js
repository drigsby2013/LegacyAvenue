/* global screenReaderText */
/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {
	var $body, $window, $sidebar, resizeTimer,
		secondary, button;

	const buttonOpenClass = 'toggle-on'
	const subnavOpenClass = 'toggled-on'

	window.expandedMenuId = null

	function initMainNavigation( container ) {
		// Add dropdown toggle that display child menu items.
		container.find( '.menu-item-has-children > a' )
			.after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

		// // Toggle buttons and submenu items with active children menu items.
		// container.find( '.current-menu-ancestor > button' ).addClass( buttonOpenClass );
		// container.find( '.current-menu-ancestor > .sub-menu' ).addClass( subnavOpenClass );

		const $dropdownButtons = container.find( '.dropdown-toggle' )

		$dropdownButtons.on( 'click', function( e ) {
			e.preventDefault();

			console.log({e})
			const _this = $(e.target)

			// reset each subnav before expanding the one that was clicked
			$dropdownButtons.each(function (i, el) {
				const  _el = $(el)
				if (_el.parent().attr('id') === _this.parent().attr('id')) { return }
				_el.removeClass( buttonOpenClass );
				_el.siblings( '.children, .sub-menu' ).removeClass( subnavOpenClass );
				_el.attr( 'aria-expanded', 'false' );
				_el.html( screenReaderText.collapse );
			})

			// const _this = $( e.target );
			_this.toggleClass( buttonOpenClass );
			_this.next( '.children, .sub-menu' ).toggleClass( subnavOpenClass );
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		} );
	}
	initMainNavigation( $( '.main-navigation' ) );

	// // Re-initialize the main navigation when it is updated, persisting any existing submenu expanded states.
	// $( document ).on( 'customize-preview-menu-refreshed', function( e, params ) {
	// 	if ( 'primary' === params.wpNavMenuArgs.theme_location ) {
	// 		initMainNavigation( params.newContainer );

	// 		// Re-sync expanded states from oldContainer.
	// 		params.oldContainer.find( '.dropdown-toggle.toggle-on' ).each(function() {
	// 			var containerId = $( this ).parent().prop( 'id' );
	// 			$( params.newContainer ).find( '#' + containerId + ' > .dropdown-toggle' ).triggerHandler( 'click' );
	// 		});
	// 	}
	// });

	secondary = $( '#secondary' );
	button = $( '.site-branding' ).find( '.secondary-toggle' );

	// Enable menu toggle for small screens.
	( function() {
		var menu, widgets, social;
		if ( ! secondary.length || ! button.length ) {
			return;
		}

		// Hide button if there are no widgets and the menus are missing or empty.
		menu    = secondary.find( '.nav-menu' );
		widgets = secondary.find( '#widget-area' );
		social  = secondary.find( '#social-navigation' );
		if ( ! widgets.length && ! social.length && ( ! menu.length || ! menu.children().length ) ) {
			button.hide();
			return;
		}

		button.on( 'click.legacyavenue', function() {
			secondary.toggleClass( subnavOpenClass );
			secondary.trigger( 'resize' );
			$( this ).toggleClass( subnavOpenClass );
			if ( $( this, secondary ).hasClass( subnavOpenClass ) ) {
				$( this ).attr( 'aria-expanded', 'true' );
				secondary.attr( 'aria-expanded', 'true' );
			} else {
				$( this ).attr( 'aria-expanded', 'false' );
				secondary.attr( 'aria-expanded', 'false' );
			}
		} );
	} )();

	/**
	 * Add or remove ARIA attributes.
	 *
	 * Uses jQuery's width() function to determine the size of the window and add
	 * the default ARIA attributes for the menu toggle if it's visible.
	 *
	 * @since Twenty Fifteen 1.1
	 */
	function onResizeARIA() {
		if ( 955 > $window.width() ) {
			button.attr( 'aria-expanded', 'false' );
			secondary.attr( 'aria-expanded', 'false' );
			button.attr( 'aria-controls', 'secondary' );
		} else {
			button.removeAttr( 'aria-expanded' );
			secondary.removeAttr( 'aria-expanded' );
			button.removeAttr( 'aria-controls' );
		}
	}

	// Sidebar scrolling.
	function resizeAndScroll() {
		var windowPos = $window.scrollTop(),
			windowHeight = $window.height(),
			sidebarHeight = $sidebar.height(),
			pageHeight = $( '#page' ).height();

		if ( 955 < $window.width() && pageHeight > sidebarHeight && ( windowPos + windowHeight ) >= sidebarHeight ) {
			$sidebar.css({
				position: 'fixed',
				bottom: sidebarHeight > windowHeight ? 0 : 'auto'
			});
		} else {
			$sidebar.css('position', 'relative');
		}
	}

	$( function() {
		$body          = $( document.body );
		$window        = $( window );
		$sidebar       = $( '#sidebar' ).first();

		$window
			.on( 'scroll.legacyavenue', resizeAndScroll )
			.on( 'load.legacyavenue', onResizeARIA )
			.on( 'resize.legacyavenue', function() {
				clearTimeout( resizeTimer );
				resizeTimer = setTimeout( resizeAndScroll, 500 );
				onResizeARIA();
			} );
		$sidebar.on( 'click.legacyavenue keydown.legacyavenue', 'button', resizeAndScroll );

		for ( var i = 0; i < 6; i++ ) {
			setTimeout( resizeAndScroll, 100 * i );
		}
	} );

} )( jQuery );
