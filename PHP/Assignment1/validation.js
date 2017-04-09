function checkForm()
{

    if(document.forms["editEmployee"].getElementById("FirstName").valueOf().length == 0)
    {
        document.getElementById("FirstName").style.borderColor="red";
        return false;
    }

    else if(document.forms["editEmployee"].LastName.value.length ==0) {
        document.getElementById("LastName").style.borderColor = "red";
        return false;
    }

    else if(document.forms["editEmployee"].bday.value.length ==0)
    {
        document.getElementById("adress1").style.borderColor="red";
        return false;
    }

    else if(document.forms["editEmployee"].Gender.toLowerCase() != "m" ||
        document.forms["editEmployee"].Gender.toLowerCase() != "f")
    {
        document.getElementById("Gender").style.borderColor="red";
        return false;
    }

    else if(document.forms["editEmployee"].HireDate.value.length ==0)
    {
        document.getElementById("Email").style.borderColor="red";
        return false;
    }
    else{
        return true;
    }

}