( function( window, document ) {
  function forest_eco_nature_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const forest_eco_nature_nav = document.querySelector( '.sidenav' );
      if ( ! forest_eco_nature_nav || ! forest_eco_nature_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...forest_eco_nature_nav.querySelectorAll( 'input, a, button' )],
        forest_eco_nature_lastEl = elements[ elements.length - 1 ],
        forest_eco_nature_firstEl = elements[0],
        forest_eco_nature_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && forest_eco_nature_lastEl === forest_eco_nature_activeEl ) {
        e.preventDefault();
        forest_eco_nature_firstEl.focus();
      }
      if ( shiftKey && tabKey && forest_eco_nature_firstEl === forest_eco_nature_activeEl ) {
        e.preventDefault();
        forest_eco_nature_lastEl.focus();
      }
    } );
  }
  forest_eco_nature_keepFocusInMenu();
} )( window, document );