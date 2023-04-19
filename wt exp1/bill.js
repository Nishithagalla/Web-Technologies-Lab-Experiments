var VegFriedRice= 180;
var ChickenFriedRice= 200;
var Chicken65= 220;
var ChickenDum = 180;
var Thumbsup=50;
var EnergyDrink=90;
var Soda=20;
var EnergyDrink=90;;
var ChocolateCake=80;
var total = 0;
var check = 1;
var gw;
var sfruit;
var quan;
var adder = document.querySelector("#getme");
adder.addEventListener("click", getMe);
var by = document.querySelector("#out");
by.addEventListener("click", checkOut);
var cme = document.querySelector("#clr");
cme.addEventListener("click", clearMe);

function getMe() {
  sfruit = document.querySelector("#sf").value;
  quan = parseFloat(document.querySelector("#entrybox").value);
  gw = document.querySelector("#writeme");
  if (Number.isNaN(quan) === true) {
    alert("Only Numbers !!! Or The Field is Empty");
    check = 0;
  }
  else if (quan<0) {
    alert("Negative value!! @stupid");
    check = 0;
  }
  else{
    check = 1;
  }
  if (check == 1) {
 
    switch (sfruit) {
      case "VegFriedRice":
        var st = VegFriedRice * quan;
        gw.value += "Veg Fried Rice" + quan + " Quan =  " + st + " rs\r";
        total += st;
        quan.value = "";
        break;
      case "ChickenFriedRice":
        var at = ChickenFriedRice * quan;
        gw.value += "Chicken Fried Rice" + quan + " Quan =  " + at + " rs\r";
        total += at;
        quan.value = "";
        break;
      case "Chicken65":
        var gr = Chicken65 * quan;
        gw.value += "Chicken 65 " + quan + " Quan  =  " + gr + " rs\r";
        total += gr;
        quan.value = "";
        break;
      case "ChickenDum":
        var pomy = ChickenDum * quan;
        gw.value += "Chicken Dum Biryani " + quan + " Quan  =  " + pomy + " rs\r";
        total += pomy;
        quan.value = "";
        break;
      case "Thumbsup":
        var pomy = Thumbsup * quan;
        gw.value += "Thumbs up " + quan + " Quan  =  " + pomy + " rs\r";
        total += pomy;
        quan.value = "";
        break;
      case "Soda":
        var pomy = Soda * quan;
        gw.value += "Soda " + quan + " Quan  =  " + pomy + " rs\r";
        total += pomy;
        quan.value = "";
        break;
      case "EnergyDrink":
        var pomy = EnergyDrink * quan;
        gw.value += "Energy Drinks " + quan + " Quan  =  " + pomy + " rs\r";
        total += pomy;
        quan.value = "";
        break;
      case "ChocolateCake":
        var pomy = ChocolateCake * quan;
        gw.value += "Chocolat eCake " + quan + " Quan  =  " + pomy + " rs\r";
        total += pomy;
        quan.value = "";
      break;
    }

  }
}

function checkOut() {
  gw.value += "----------------------------------------------\r";
  gw.value += "Your Total Bill Is = " + total + " rs Thanks For Visiting :)\r";
  gw.value += "----------------------------------------------\r";
  total = 0;
}
function clearMe () {
  gw.value = "";
}
