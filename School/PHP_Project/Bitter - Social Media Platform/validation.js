var $ = function(id) {
	return document.getElementById(id); }

function validPhone(phone) {
    var regex = /^\(\d{3}\)()|( )?\d{3}(-)|( )\d{4}$/; 
    if(phone === regex) {
        return true;
    }
    else{
        alert("Incorrect phone number format");
        return false;
    }
}

function validPostal(postal) {
    var regex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
    if(postal === regex) {
        return true;
    }
    else{
        alert("Incorrect postal code format");
        return false;
    }
}

function validPassword(pass, pass2) {
    if(pass === pass2) {
        return true;
    }
    else{
        alert("Passwords do not match");
        return false;
    }
}



function validate() {
    alert("test");
    var phone = $("phone").value;
    var postal = $("postalCode").value;
    var pass = $("password").value;
    var pass2 = $("confirm").value;
    
    if(validPhone(phone)) {
        if(validPostal(postal)){
            if(validPassword(pass, pass2)) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
    else{
        return false;
    }
}