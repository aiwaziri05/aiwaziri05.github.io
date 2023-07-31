function formValidation() {
    let validate = document.forms["myForm"]["userName"].value,
        text_box = document.getElementById("text-box"),
        nameErr = document.getElementById("nameErr");

    if(validate == "") {
       nameErr.innerHTML = "Name must be filled out";
        return false;
    }else if(validate != validate) {
       console.log(validate);
        
    }
    
}