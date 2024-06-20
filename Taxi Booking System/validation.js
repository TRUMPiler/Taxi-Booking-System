/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

$(document).ready(function () {
    $('#fname').on('input', function () {
        checkfirstname();
    });
    $('#mname').on('input', function () {
        checkmiddlename();
    });
     $('#lname').on('input', function () {
        checklastname();
    });
    $('#email').on('input', function () {
        checkemail();
    });
    $('#password').on('input', function () {
        checkpass();
    });
    $('#cpassword').on('input', function () {
        checkcpass();
    });
    $('#contact').on('input', function () {
        checkmobile();
    });
    $('#dob').on('input', function () {
        checkdob();
    });
    $('#address').on('input', function () {
        checkaddress();
    });

    $('#submitbtn').click(function () {


        if (!checkfirstname() && !checklastname() &&!checkmiddlename() && !checkemail() && !checkmobile() && !checkpass() && !checkcpass()) {
            console.log("er1");
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
        } else if (!checkfirstname() || !checklastname() || !checkemail()||!checkmiddlename() || !checkmobile() || !checkpass() || !checkcpass()) {
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
            console.log("er");
        }
        else {
            console.log("ok");
            $("#message").html("");
           
//            $.ajax({
//                type: "POST",
////                url: "process.php",
//                data: data,
//                processData: false,
//                contentType: false,
//                cache: false,
//                async: false,
//                beforeSend: function () {
//                    $('#submitbtn').html('<i class="fa-solid fa-spinner fa-spin"></i>');
//                    $('#submitbtn').attr("disabled", true);
//                    $('#submitbtn').css({ "border-radius": "50%" });
//                },
//
//                success: function (data) {
//                    $('#message').html(data);
//                },
//                complete: function () {
//                    setTimeout(function () {
//                        $('#myform').trigger("reset");
//                        $('#submitbtn').html('Submit');
//                        $('#submitbtn').attr("disabled", false);
//                        $('#submitbtn').css({ "border-radius": "4px" });
//                    }, 50000);
//                }
//            }
//            );
        }
    });
});


function checkfirstname() {
    var pattern = /^[A-Za-z]+$/;
    var user = $('#fname').val();
    var validuser = pattern.test(user);
    if(user == ""){
         $('#fname_err').html('Please enter the first name');
    }
     else if ($('#fname').val().length < 3) {
        $('#fname_err').html('length is too short');
        return false;
    } else if (!validuser) {
        $('#fname_err').html('firstname should be a-z ,A-Z only');
        return false;
    } else {
        $('#fname_err').html('');
        return true;
    }
}
function checkmiddlename() {
    var pattern = /^[A-Za-z]+$/;
    var user = $('#mname').val();
    var validuser = pattern.test(user);
    if(user == ""){
         $('#mname_err').html('Please enter the middle name');
    }
     else if ($('#mname').val().length < 3) {
        $('#mname_err').html('length is too short');
        return false;
    } else if (!validuser) {
        $('#mname_err').html('firstname should be a-z ,A-Z only');
        return false;
    } else {
        $('#mname_err').html('');
        return true;
    }
}
function checklastname() {
    var pattern = /^[A-Za-z]+$/;
    var user = $('#lname').val();
    var validuser = pattern.test(user);
    if(user == ""){
         $('#lname_err').html('Please enter the last name');
    }
    else if ($('#lname').val().length < 3) {
        $('#lname_err').html('length is too short');
        return false;
    } else if (!validuser) {
        $('#lname_err').html('lastname should be a-z ,A-Z only');
        return false;
    } else {
        $('#lname_err').html('');
        return true;
    }
}
function checkemail() {
    var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email = $('#email').val();
    var validemail = pattern1.test(email);
    if (email == "") {
        $('#email_err').html('required field');
        return false;
    } else if (!validemail) {
        $('#email_err').html('invalid email');
        return false;
    } else {
        $('#email_err').html('');
        return true;
    }
}
function checkpass() {
    console.log("sass");
    var pattern2 = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    var pass = $('#password').val();
    var validpass = pattern2.test(pass);

    if (pass == "") {
        $('#password_err').html('password cannot be empty');
        return false;
    } else if (!validpass) {
        $('#password_err').html('Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character:');
        return false;

    } else {
        $('#password_err').html("");
        return true;
    }
}
function checkcpass() {
    var pass = $('#password').val();
    var cpass = $('#cpassword').val();
    if (cpass == "") {
        $('#cpassword_err').html('confirm password cannot be empty');
        return false;
    } else if (pass !== cpass) {
        $('#cpassword_err').html('confirm password did not match');
        return false;
    } else {
        $('#cpassword_err').html('');
        return true;
    }
}

function checkmobile() {
    var mob = $('#contact').val();
    if(mob==""){
        $('#contact_err').html('contact no. cannot be empty');
    }
    else if(!$.isNumeric($("#contact").val())) {
        $("#contact_err").html("only number is allowed");
        return false;
    } else if ($("#contact").val().length != 10) {
        $("#contact_err").html("10 digit required");
        return false;
    }
    else {
        $("#contact_err").html("");
        return true;
    }
}
function checkdob() {
    
  var dobInput = document.getElementById('dob');
  var dob = new Date(dobInput.value);

  // Get the current date
  var today = new Date();

  // Calculate the user's age
  var age = today.getFullYear() - dob.getFullYear();

  // Check if the birthday has occurred this year
  if (
    age < 18 ||
    (age === 18 &&
      (today.getMonth() < dob.getMonth() ||
        (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())))
  ) {
    //alert('You must be 18 or older to submit this form.');
    $('#dob_err').html('You must be 18 or older');
    
      dobInput.focus();
//    return false;
  }else {
        $("#dob_err").html('');
        return true;
    };
    
}

function checkaddress() {
    var pattern = /^[A-Za-z0-9]+$/;
    var add = $('#address').val();
//    var validuser = pattern.test(add);
    if(add==""){
         $('#address_err').html('Address cannot be blank!');
    }
    else if ($('#address').val().length < 4) {
        $('#address_err').html('address is too short');
        return false;
    }  else {
        $('#address_err').html('');
        return true;
    }
}


function password_show_hide() {
    console.log('ok');
    var x = document.getElementById("password");
    var show_eye = document.getElementById("show_eye");
    var hide_eye = document.getElementById("hide_eye");
    hide_eye.classList.remove("d-none");
    if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}