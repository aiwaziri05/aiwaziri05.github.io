function formValidation() {
    let validate = document.forms["myForm"]["userName"].value,
    text_box = document.getElementById("text-box"),
    nameErr = document.getElementById("nameErr"),
    name = "Abdullahi Waziri";

    if(validate == "") {
       nameErr.innerHTML = "Name must be filled out";
        return false;
    }else if(validate != "") {
       text_box.innerHTML = "Congratulations on Your Graduation " + validate + "Wishing you all the best on your new beginning" + name;
    }
    
}

// formValidation();