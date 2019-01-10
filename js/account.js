var username_field = document.getElementById('new_username_account');
var password_field = document.getElementById('new_password_account');
var email_field = document.getElementById('new_email_account');
var comment_email_field = document.getElementById('new_comment_email_account');
username_field.hidden = true;
password_field.hidden = true;
email_field.hidden = true;
comment_email_field.hidden = true;
document.getElementById('new_username_check').addEventListener("change", function() {
    if (document.getElementById('new_username_check').checked == true)
        username_field.hidden = false;
    else
        username_field.hidden = true;
}, false);

document.getElementById('new_email_check').addEventListener("change", function() {
    if (document.getElementById('new_email_check').checked == true)
        email_field.hidden = false;
    else
        email_field.hidden = true;
}, false);

document.getElementById('new_password_check').addEventListener("change", function() {
    if (document.getElementById('new_password_check').checked == true)
        password_field.hidden = false;
    else
        password_field.hidden = true;
}, false);

document.getElementById('new_comment_email_check').addEventListener("change", function() {
    if (document.getElementById('new_comment_email_check').checked == true)
        comment_email_field.hidden = false;
    else
        comment_email_field.hidden = true;
}, false);