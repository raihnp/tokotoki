var counterValue = document.getElementById("counter-value");
var price = document.getElementById("price");
var subtotal = document.getElementById("subprice");

var jumlah = document.getElementById("jumlah");
var harga = document.getElementById("harga");

subtotal.innerText = price.innerText;

var unitPrice = parseInt(price.innerText.slice(3).replace(/[.]/g, ''));
harga.value = unitPrice;
var counter = 1;

function decrement() {
    var button = document.getElementsByClassName("fa-minus");
    if (counter == 1) { }
    else {
        if (counter == 2) { button[0].style.color = "#C4C4C4"; }
        counter--;
        counterValue.innerText = counter;
        jumlah.value = counter;
    }

    var subTotalPrice = (unitPrice * counter).toString();
    subtotal.innerText = stringToCurrency(subTotalPrice);
    harga.value = subTotalPrice;
}

function increment() {
    var button = document.getElementsByClassName("fa-minus");
    if (counter == 1) { button[0].style.color = "#2E2E2E"; }
    counter++;
    counterValue.innerText = counter;
    jumlah.value = counter;

    var subTotalPrice = (unitPrice * counter).toString();
    subtotal.innerText = stringToCurrency(subTotalPrice);
    harga.value = subTotalPrice;
}

function stringToCurrency(stringNumber) {
    var i = stringNumber.length - 3;
    while (i > 0) {
        stringNumber = addCharAtIndex(stringNumber, '.', i);
        i = i - 3;
    }
    return "Rp " + stringNumber;
}

function addCharAtIndex(string, char, index) {
    string = string.substr(0, index) + char + string.substr(index);

    return string;
}