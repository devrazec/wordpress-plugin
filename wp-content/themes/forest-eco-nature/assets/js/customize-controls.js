( function( api ) {

	// Extends our custom "forest-eco-nature" section.
	api.sectionConstructor['forest-eco-nature'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );