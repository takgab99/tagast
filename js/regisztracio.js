$(function () {

  $("#register-form input, #register-form textarea").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function ($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function ($form, event) {
      event.preventDefault(); // prevent default submit behaviour
      // get values from FORM
      var ticket_id = $("#register-form input#ticket-register-id").val();
      var name = $("#register-form input#ticket-register-name").val();
      var city = $("#register-form input#ticket-register-city").val();
      var community = $("#register-form input#ticket-register-community").val();
      var first_seminar = $("#register-form #ticket-register-first-seminar").val();
      var second_seminar = $("#register-form #ticket-register-second-seminar").val();

      errors = 0;
      $('.alert-danger').remove();
      if (ticket_id == '') {
        errors++;
        $('#ticket-register-id').after("<div class='alert alert-danger'>Ez a mező nem lehet üres.</div>");
      }
      if (name == '') {
        errors++;
        $('#ticket-register-name').after("<div class='alert alert-danger'>Ez a mező nem lehet üres.</div>");
      }
      if (city == '') {
        errors++;
        $('#ticket-register-city').after("<div class='alert alert-danger'>Ez a mező nem lehet üres.</div>");
      }
      if (community == '') {
        errors++;
        $('#ticket-register-community').after("<div class='alert alert-danger'>Ez a mező nem lehet üres.</div>");
      }

      if (errors == 0) {
        $.ajax({
          url: "./register_submit.php",
          type: "POST",
          data: {
            ticket_id: ticket_id,
            name: name,
            city: city,
            community: community,
            first_seminar: first_seminar,
            second_seminar: second_seminar
          },
          cache: false,
          success: function () {
            // Success message
            $('#register-success').html("<div class='alert alert-success'>");
            $('#register-success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#register-success > .alert-success')
              .append("<strong>A regisztrációdat elmentettük. </strong>");
            $('#register-success > .alert-success')
              .append('</div>');

            //clear all fields
            $('#register-form').trigger("reset");
          },
          error: function () {
            // Fail message
            $('#success').html("<div class='alert alert-danger'>");
            $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
              .append("</button>");
            $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!!");
            $('#success > .alert-danger').append('</div>');
            //clear all fields
            $('#contactForm').trigger("reset");
          },
        })
      }
    },
    filter: function () {
      return $(this).is(":visible");
    },
  });

  $("a[data-toggle=\"tab\"]").click(function (e) {
    e.preventDefault();
    $(this).tab("show");
  });
});


/*When clicking on Full hide fail/success boxes */
$('#name').focus(function () {
  $('#success').html('');
});




