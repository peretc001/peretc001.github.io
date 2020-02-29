// Check is mobile
var isMobile = function() {
    return (/Android|iPhone|iPad|iPod|BlackBerry/i).test(navigator.userAgent || navigator.vendor || window.opera);
}

// Initialize search form in header.
var initSearchForm = function() {
    var HS = $( '.header__search' );

    // Open search form
    $( '.sf-open' ).on( 'click', function( e ) {
        e.preventDefault();
        HS.fadeIn();
        HS.find( 'input[type="text"]' ).focus();
    });
    $( '#sf-close' ).on( 'click', function() {
        HS.fadeOut();
    });
}

var backToTop = function() {
    var el = $( '#jas-backtop' );
    $( window ).scroll(function() {
        if( $( this ).scrollTop() > $( window ).height() ) {
            el.show();
        } else {
            el.hide();
        }
    });
    el.click( function() {
        $( 'body,html' ).animate({
            scrollTop: 0
        }, 500);
        return false;
    });
}