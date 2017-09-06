function validateForm() {
    var x = document.forms["myForm"]["name"].value;
    var y = document.forms["myForm"]["email"].value;
    var z = document.forms["myForm"]["message"].value;
    if (x == "" || y == "" || z == "") {
        alert("Please fill out all required fields");
        return false;
    }
}


var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}


$(function() {
      $( "#accordion" ).accordion({'collapsible':true,'active':false});
 });
