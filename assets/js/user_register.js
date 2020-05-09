function validateform() {
    var st = true;
    var name = $("#name").val().trim();
    var gender = $("#gender").val().trim();
    var email = $("#email").val().trim();
    var tel = $("#tel").val().trim();
    var password = $("#password").val().trim();
    if (name === "" || name === null) {
        $("#name").addClass("has-error");
        st = false;
    }
    if (gender === "" || gender === null) {
        $("#gender").addClass("has-error");
        st = false;
    }
    if (email === "" || email === null) {
        $("#email").addClass("has-error");
        st = false;
    }

    if (tel === "" || tel === null) {
        $("#tel").addClass("has-error");
        st = false;
    }
    if (password === "" || password === null) {
        $("#password").addClass("has-error");
        st = false;
    }
 
    return st;
}