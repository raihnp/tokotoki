var valid = false;

var chekcbox1 = document.getElementById('btnradio1').addEventListener("click", checked);
var chekcbox2 = document.getElementById('btnradio2').addEventListener("click", checked);
var chekcbox3 = document.getElementById('btnradio3').addEventListener("click", checked);

var form = document.forms[0];
var submit = document.getElementById("submit").addEventListener('click', submit);
var invalidfeedback = document.getElementById('invalid');

function checked() {
    valid = true;
}

function submit(event) {
    event.preventDefault();

    if (!valid) {
        event.stopPropagation();

        invalidfeedback.style.display = 'block';
    }
    else {
        invalidfeedback.style.display = 'hidden';
        location.href = '../destination/destination.php';
        form.submit;
    }
}