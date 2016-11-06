function display_messages()
{
    $('.errorBox').fadeIn(400).delay(2000).fadeOut(400);
    return false;
}

//To create a green highlight to show users the passwords match
function password_check()
{
    var password = document.forms["registerForm"]["pwd"].value;
    var password_confirm = document.forms["registerForm"]["pwd_confirm"].value;
    var pwd_group = document.getElementsByClassName('pwd_group');
    var pwd_ok_icon = document.getElementsByClassName('pwd_ok');
    var pwd_remove_icon = document.getElementsByClassName('pwd_remove');
    if(password == '' || password_confirm == '')
    {
        for(var i = 0; i < pwd_group.length; i++)
        {
            pwd_group[i].classList.remove('has-success');
            pwd_group[i].classList.remove('has-error');
            pwd_ok_icon[i].style.display = 'none';
            pwd_remove_icon[i].style.display = 'none';
        }
    }
    else if(password == password_confirm)
    {
        for(var i = 0; i < pwd_group.length; i++)
        {
            pwd_group[i].classList.add('has-success');
            pwd_group[i].classList.remove('has-error');
            pwd_ok_icon[i].style.display = 'initial';
            pwd_remove_icon[i].style.display = 'none';
        }
    }
    else
    {
        for(var i = 0; i < pwd_group.length; i++)
        {
            pwd_group[i].classList.add('has-error');
            pwd_group[i].classList.remove('has-success');
            pwd_remove_icon[i].style.display = 'initial';
            pwd_ok_icon[i].style.display = 'none';
        }
    }
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function email_check()
{
    var email = document.forms["registerForm"]["email"].value.toLowerCase();
    var email_group = document.getElementsByClassName('email_group');
    var email_ok_icon = document.getElementsByClassName('email_ok');
    var email_remove_icon = document.getElementsByClassName('email_remove');
    var data = new FormData();
    data.append('email', email);
    var request = new XMLHttpRequest();
    request.onload = function()
    {
        var json = JSON.parse(this.response);
        if(email == '')
        {
            for(var i = 0; i < email_group.length; i++)
            {
                email_group[i].classList.remove('has-success');
                email_group[i].classList.remove('has-error');
                email_ok_icon[i].style.display = 'none';
                email_remove_icon[i].style.display = 'none';
            }
        }
        else if(json['valid'] == true && validateEmail(email))
        {
            for(var i = 0; i < email_group.length; i++)
            {
                email_group[i].classList.add('has-success');
                email_group[i].classList.remove('has-error');
                email_ok_icon[i].style.display = 'initial';
                email_remove_icon[i].style.display = 'none';
            }
        }
        else
        {
            for(var i = 0; i < email_group.length; i++)
            {
                email_group[i].classList.add('has-error');
                email_group[i].classList.remove('has-success');
                email_remove_icon[i].style.display = 'initial';
                email_ok_icon[i].style.display = 'none';
            }
        }
    }
    request.open("post","../scripts/frontend/email_validation.php",true);
    
    request.send(data);
}

//To prevent form processing if the passwords don't match
function validate_register()
{
    var password = document.forms["registerForm"]["pwd"].value;
    var password_confirm = document.forms["registerForm"]["pwd_confirm"].value;
    if(password != password_confirm)
    {
        $('.passwordError').fadeIn(400).delay(2000).fadeOut(400);
        return false;
    }
}