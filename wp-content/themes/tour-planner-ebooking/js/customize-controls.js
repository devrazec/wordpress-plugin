( function( api ) {

	// Extends our custom "tour-planner-ebooking" section.
	api.sectionConstructor['tour-planner-ebooking'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );