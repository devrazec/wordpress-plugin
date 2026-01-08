jQuery("body").on("click", '#tour-travel-agent-welcome-notice .notice-dismiss', function (event) {
    event.preventDefault();

    console.log("close clicked");

    jQuery.ajax({
      type: 'POST',
      url: ajaxurl,
      data: {
          action: 'tour_travel_agent_dismissed_notice',
      },
      success: function () {
          // Remove the notice on success
          $('.notice[data-notice="example"]').remove();
      }
    });
  }
)