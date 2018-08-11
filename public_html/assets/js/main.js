$(document).ready(function() {
  $('.go-to').click(function(e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: $($(this).attr('href')).offset().top
    }, 500);
  });

  $('#contactForm').submit(function(e) {
    e.preventDefault();
    var $form = $(this);
    var $button = $form.find('[type="submit"]');
    var buttonText = $button.text();
    var $formAlert = $form.find('.alert');

    $.ajax({
      url: '',
      type: 'post',
      dataType: 'json',
      data: $form.serialize(),
      beforeSend: function() {
        $button.prop('disabled', true).text('Sending...');
      },
      success: function(response) {
        if (response.hasOwnProperty('type') && response.hasOwnProperty('message')) {
          $formAlert.removeClass('alert-success alert-danger').addClass('alert-' + response.type).text(response.message).show();

          if (response.type == 'success') {
            $button.prop('disabled', true).text('Sent!');
          } else {
            $button.prop('disabled', false).text(buttonText);
          }
        } else {
          $button.prop('disabled', false).text(buttonText);
        }
      },
      error: function(xhr, status, error) {
        $button.prop('disabled', false).text(buttonText);
        console.error(error);
      }
    });
  });
});
