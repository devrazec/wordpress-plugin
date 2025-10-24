( function( api ) {

	// Extends our custom "garden-plant-shop" section.
	api.sectionConstructor['garden-plant-shop'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );