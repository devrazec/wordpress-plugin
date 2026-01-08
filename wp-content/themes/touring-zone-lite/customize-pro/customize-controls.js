( function( api ) {
	// Extends our custom "touring-zone-lite" section.
	api.sectionConstructor['touring-zone-lite'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );