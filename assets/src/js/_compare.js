jQuery.noConflict();

(function ($) {
  $(document).ready(function () {

    $('[id^="vozilo-select"]').on('change', function () {
      const postId = $(this).val();
      const uniqueId = $(this).attr('id').replace('vozilo-select-', '');
      const $table = $('#vozilo-data-' + uniqueId);

      $.ajax({
        type: 'post',
        url: siteVars.ajaxUrl,
        dataType: 'json',
        data: {
          post_id: postId,
          action: 'get_vozilo_data_simple'
        },
        success: function (payload) {
          if (payload.success) {
            $table.html(payload.data.html); // Use payload.data.html
          } else {
            console.error('Error:', payload.message);
            alert('Error: ' + payload.message);
          }
        },
        error: function (err) {
          console.log('AJAX error:', err);
          alert('AJAX error occurred. Check console for details.');
        }
      });
    });

    
  });

})(jQuery);

export default Compare;
