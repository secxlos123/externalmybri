 $(setup)
function setup() {
      $('.intro select').zelect({})
    }
	
	
	
	// change style for select box
        $(".selectbox").selectbox();

function openSide() {
    document.getElementById("rightSide").style.width = "285px";
}

function closeSide() {
    document.getElementById("rightSide").style.width = "0px";

}

$( window ).resize( function() {
    var rightsidebar_height = $( '.rightSide' ).height(),
        rightsidebar_notif  = $( '.rightSide .notif-head').height(),
        rightsidebar_item   = $( '.rightSide li' ).not( '.notif-head' );

    rightsidebar_item.css( 'height', parseFloat( rightsidebar_height - rightsidebar_notif ) + 'px' );
} );

var rightsidebar_height = $( '.rightSide' ).height(),
    rightsidebar_notif  = $( '.rightSide .notif-head').height(),
    rightsidebar_item   = $( '.rightSide li' ).not( '.notif-head' );

rightsidebar_item.css( 'height', parseFloat( rightsidebar_height - rightsidebar_notif ) + 'px' );