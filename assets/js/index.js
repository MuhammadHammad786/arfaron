$("#close").click(function () {
  $("#navbarNavAltMarkup").removeClass("show");
});

// When the user scrolls the page, execute stickyNav
window.onscroll = function () {
  stickyNav();
  scrollFunction();
};

// Get the navbar
var navbar = document.getElementById("navbar-toggler");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function stickyNav() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("stickyBtn")
  } else {
    navbar.classList.remove("stickyBtn");
  }
}

//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 100px from the top of the document, show the button

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// ajax for signup and login
$(document).ready(function () {

  $("#error").hide();
  $("#success").hide();
  $("#error_log").hide();
  $("#success_log").hide();

  $('#signup_submit_btn').on('click', function () {
    $("#signup_submit_btn").attr("disabled", "disabled");

    var name = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var c_password = $('#c_password').val();

    if (name != "" && email != "" && password != "" && c_password != "") {
      if (password !== c_password) {
        $("#success").hide();
        $("#error").show();
        $('#error').html('password and confirm password not match!');
        $("#signup_submit_btn").removeAttr("disabled");

      } else {
        $.ajax({
          url: "./actions/user_record_save.php",
          type: "POST",
          data: {
            type: 1,
            name: name,
            email: email,
            password: password,
            c_password: c_password,
          },
          cache: false,
          success: function (dataResult) {
            var dataResult = JSON.parse(dataResult);
            if (dataResult.statusCode == 200) {
              $("#signup_submit_btn").removeAttr("disabled");
              $('#register_form').find('input').val('');
              $("#error").hide();
              $("#success").show();
              $('#success').html('Registration successful! Please <a data-toggle="modal" data-target="#login" data-dismiss="modal" style="text-decoration: underline;">Login</a> to continue');
            }
            else if (dataResult.statusCode == 201) {
              $("#success").hide();
              $("#error").show();
              $('#error').html('Email ID already exists !');
              $("#signup_submit_btn").removeAttr("disabled");
            }

          }
        });


      }
    }
    else {
      $("#success").hide();
      $("#error").show();
      $('#error').html('Please fill all fields!');
      $("#signup_submit_btn").removeAttr("disabled");
    }
  });

  $("#login_form").submit(function(e){
    e.preventDefault();
  });

  $('#login_submit_btn').on('click', function () {
    var email = $('#log_email').val();
    var password = $('#log_password').val();
    if (email != "" && password != "") {
      $.ajax({
        url: "./actions/user_record_save.php",
        type: "POST",
        data: {
          type: 2,
          email: email,
          password: password
        },
        cache: false,
        success: function (dataResult) {

            var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            $("#error_log").hide();
            $("#success_log").show();
            $('#success_log').html('login successful! Redirecting...');
            location.href = "./";
          }
          else if (dataResult.statusCode == 201) {
            $("#error_log").show();
            $('#error_log').html('Incorrect Password!');
          }
          else if (dataResult.statusCode == 202) {
            $("#error_log").show();
            $('#error_log').html('Invalid Email Id!');
          }

        }
      });
    }
    else {
      $("#error_log").show();
      $('#error_log').html('Please fill all fields!');
    }
  });
});
