// ajax for signup and login
$(document).ready(function () {

    $("#error").hide();
    $("#success").hide();
    $("#error_log").hide();
    $("#success_log").hide();
  
    $('#signup_submit_btn').on('click', function () {
      $("#signup_submit_btn").attr("disabled", "disabled");
  
      var name = $('#reg_username').val();
      var email = $('#reg_email').val();
      var password = $('#reg_password').val();
      var c_password = $('#reg_password_c').val();
  
      if (name != "" && email != "" && password != "" && c_password != "") {
        if (password !== c_password) {
          $("#success").hide();
          $("#error").show();
          $('#error').html('password and confirm password not match!');
          $("#signup_submit_btn").removeAttr("disabled");
  
        } else {
          $.ajax({
            url: "./reg.login.action/reg_action.php",
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
                $('#success').html('Registration successful! Please <a href="./login.php" style="text-decoration: underline;">Login</a> to continue');
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
          url: "./reg.login.action/reg_action.php",
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
  