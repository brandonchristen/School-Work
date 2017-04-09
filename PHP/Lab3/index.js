function  OnLoad(){
    document.getElementById("fName").style.borderColor="none";
    document.getElementById("lName").style.borderColor="none";
    document.getElementById("adress1").style.borderColor="none";
    document.getElementById("adress2").style.borderColor="none";
    document.getElementById("Email").style.borderColor="none";
    document.getElementById("hiddenMsg").innerHTML = "";

}


function checkForm()
{
    if(document.forms["jsForm"].fName.value.length ==0)
    {
        document.getElementById("fName").style.borderColor="red";
        return false;
    }

    else if(document.forms["jsForm"].lName.value.length ==0)
    {
        document.getElementById("lName").style.borderColor="red";
        return false;
    }

    else if(document.forms["jsForm"].adress1.value.length ==0)
    {
        document.getElementById("adress1").style.borderColor="red";
        return false;
    }

    else if(document.forms["jsForm"].adress2.value.length ==0)
    {
        document.getElementById("adress2").style.borderColor="red";
        return false;
    }

    else if(document.forms["jsForm"].Email.value.length ==0)
    {
        document.getElementById("Email").style.borderColor="red";
        return false;
    }

    else if(document.getElementById("Accept").checked == false)
    {
        document.getElementById("hiddenMsg").innerHTML = "ACCEPT TERMS AND CONDITIONS... OR ELSE.";
        document.getElementById("hiddenMsg").style.color = "red";
        return false;
    }

    else if(document.getElementById("Accept").checked == true)
    {
        document.getElementById("hiddenMsg").innerHTML = "";
    }

}

function changeText(fieldID)
{
    var myFormItem = document.getElementById(fieldID);
    if(myFormItem != null)
    {
        myFormItem.parentNode.style.textDecoration = "underline";
        myFormItem.style.backgroundColor = "yellow";
        myFormItem.style.fontStyle = "italic";
    }
}

function normalText(fieldID)
{
    var myFormItem = document.getElementById(fieldID);
    if(myFormItem != null)
    {
        myFormItem.parentNode.style.textDecoration = "none";
        myFormItem.style.backgroundColor = "white";
        myFormItem.style.fontStyle = "normal";
    }
}