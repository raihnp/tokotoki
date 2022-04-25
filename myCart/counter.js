var decBtn = document.getElementsByClassName("fa-minus");
var counterValue = document.getElementsByClassName("value");
var price = document.getElementsByClassName("price");
var ids = document.querySelectorAll("#id_cart");
var LCArr = Array.from(document.querySelectorAll('#id_cart'), ({ value }) => value);
var counter = [];
var id_cart = [];
var unitPrice = [];
var checked = [];
var totalPrice = 0;
for (i = 0; i < counterValue.length; i++) {
    counter[i] = parseInt(counterValue[i].innerText);
    id_cart[i] = parseInt(ids[i].value);
    if (counter[i] == 0) { decBtn[i].style.color = "#8888"; }
    unitPrice[i] = parseInt(price[i].innerText.slice(3).replace(/[.]/g, '')) / counter[i];
    checked[i] = true;
    totalPrice += parseInt(price[i].innerText.slice(3).replace(/[.]/g, ''));
}
var total = document.getElementById("total");
var settotal = document.getElementById("setTotal");
total.innerText = stringToCurrency(totalPrice.toString());
settotal.value = totalPrice.toString();


function decrement(index) {
    var item = document.getElementById("item-" + index);
    var button = item.getElementsByClassName("fa-minus");
    counter[index - 1]--;
    counterValue[index - 1].innerText = counter[index - 1];
    if (counter[index - 1] != 0) {
        if (counter[index - 1] != 0) {
            var subTotalPrice = (unitPrice[index - 1] * counter[index - 1]).toString();
            price[index - 1].innerText = stringToCurrency(subTotalPrice);
        }
        
        if (checked[index - 1]) {
            totalPrice -= unitPrice[index - 1];
            total.innerText = stringToCurrency(totalPrice.toString());
            settotal.value = totalPrice.toString();
        }
        location.href="../include/proses/update_cart.php?id="+id_cart[index - 1]+"&jumlah="+counter[index - 1]+"&harga="+parseInt(unitPrice[index - 1] * counter[index - 1]);
    }
    else{
        if(confirm("Hapus Barang Dari Cart?")){
            location.href="../include/proses/delete_cart.php?id="+id_cart[index - 1];
        }
        else{                
            counter[index - 1]++;
            counterValue[index - 1].innerText = counter[index - 1];
        }
    }
}

function increment(index) {
    var item = document.getElementById("item-" + index);
    var button = item.getElementsByClassName("fa-minus");

    // if (counter[index - 1] == 1) { button[0].style.color = "#2E2E2E"; }
    counter[index - 1]++;
    counterValue[index - 1].innerText = counter[index - 1];

    var subTotalPrice = (unitPrice[index - 1] * counter[index - 1]).toString();
    price[index - 1].innerText = stringToCurrency(subTotalPrice);

    if (checked[index - 1]) {
        totalPrice += unitPrice[index - 1];
        total.innerText = stringToCurrency(totalPrice.toString());
        settotal.value = totalPrice.toString();
    }
    location.href="../include/proses/update_cart.php?id="+id_cart[index - 1]+"&jumlah="+counter[index - 1]+"&harga="+parseInt(unitPrice[index - 1] * counter[index - 1]);
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

function check(index) {
    checked[index - 1] = !checked[index - 1];
    if (!checked[index - 1]) { 
        totalPrice -= unitPrice[index - 1] * counter[index - 1]; 
        settotal.value = totalPrice.toString();
        var lc = document.getElementById("listCart");
        var lcid = id_cart[index - 1]+"";
        LCArr = LCArr.filter(function(e) { return e !== lcid })
        LCArr = LCArr.filter(e => e !== lcid)
        lc.value = LCArr.join(",");
    }
    else { 
        totalPrice += unitPrice[index - 1] * counter[index - 1]; 
        settotal.value = totalPrice.toString();
        var lc = document.getElementById("listCart");
        LCArr.push(""+id_cart[index - 1]);
        lc.value = LCArr.join(",");
    }
    
    total.innerText = stringToCurrency(totalPrice.toString());
}