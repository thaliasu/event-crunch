//RegEx
var uidCheck = new RegExp(/^\S{4,20}$/);
var passCheck = new RegExp(/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d])([^\s]){8,16}$/);
var nameCheck = new RegExp(/^([a-zA-Z]'* ?){1,20}$/);
var emailCheck = new RegExp(/^((?=.*\w@)(?=.*[a-zA-Z])(?=.*\.[a-zA-Z])){5,30}/);

$(function() {
  $('#fname_error').hide();
  $('#lname_error').hide();
  $('#uid_error').hide();
  $('#pwd_error').hide();
  $('#email_error').hide();

  //flags for presence of error messages
  var fname_error = false;
  var lname_error = false;
  var uid_error = false;
  var pwd_error = false;
  var email_error = false;
  var empty_error = false;

  //events
  $('#fname').focusout(function() {
    checkFName();
  });
  $('#lname').focusout(function() {
    checkLName();
  });
  $('#uid').focusout(function() {
    checkUid();
  });
  $('#pwd').focusout(function() {
    checkPwd();
  });
  $('#email').focusout(function() {
    checkEmail();
  });

  //functions events call
  function checkFName() {
    if(nameCheck.test($('#fname').val())) {
      $('#fname_error').hide();
      fname_error = false;  //if not explicitly declared false, error message will never display after entering valid input and clearing it out
    } else {
      if(fname_error == false) {
        $('#fname_error').text('');  //clears out previous error messages
        $('#fname_error').append('<p id = "error_msg">Please enter a valid name.</p>');
        $('#fname_error').show();
        fname_error = true;
      }
    }
  }
  function checkLName() {
    if(nameCheck.test($('#lname').val())) {
      $('#lname_error').hide();
      lname_error = false;  //if not explicitly declared false, error message will never display after entering valid input and clearing it out
    } else {
      if(lname_error == false) {
        $('#lname_error').text('');  //clears out previous error messages
        $('#lname_error').append('<p id = "error_msg">Please enter a valid name.</p>');
        $('#lname_error').show();
        lname_error = true;
      }
    }
  }
  function checkUid() {
    if(uidCheck.test($('#uid').val())) {
      $('#uid_error').hide();
      uid_error = false;  //if not explicitly declared false, error message will never display after entering valid input and clearing it out
    } else {
      if(uid_error == false) {
        $('#uid_error').text('');  //clears out previous error messages
        $('#uid_error').append('<p id = "error_msg">Username must be 4-20 characters long.</p>');
        $('#uid_error').show();
        uid_error = true;
      }
    }
  }
  function checkPwd() {
    if(passCheck.test($('#pwd').val())) {
      $('#pwd_error').hide();
      pwd_error = false;  //if not explicitly declared false, error message will never display after entering valid input and clearing it out
    } else {
      if(pwd_error == false) {
        $('#pwd_error').text('');  //clears out previous error messages
        $('#pwd_error').append('<p id = "error_msg">Password must contain 1 uppercase and lowercase letter, 1 number, and be 8-20 characters long.</p>');
        $('#pwd_error').show();
        pwd_error = true;
      }
    }
  }
  function checkEmail() {
    if(emailCheck.test($('#email').val())) {
      $('#email_error').hide();
      email_error = false;  //if not explicitly declared false, error message will never display after entering valid input and clearing it out
    } else {
      if(email_error == false) {
        $('#email_error').text('');  //clears out previous error messages
        $('#email_error').append('<p id = "error_msg">Please enter a valid email address.</p>');
        $('#email_error').show();
        email_error = true;
      }
    }
  }
});
