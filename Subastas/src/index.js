const price = document.querySelector("price");
const minPrice = document.querySelector("minPrice");
const bidHist = document.querySelector("bidHist");
let bid = 0;
price.innerHTML = bid + "€";
minPrice.innerHTML = bid + (bid * 20) / 100 + "€";

var firstButton = document.getElementById("5");
var secondButton = document.getElementById("10");
var thirdButton = document.getElementById("15");
var inputButton = document.getElementById("input");

firstButton.addEventListener("click", function () {
  bid = 5;
  let currentPrice = (price.innerHTML = bid + "€");
  minPrice.innerHTML = bid + (bid * 20) / 100 + "€";
  document.getElementById("5").disabled = true;
  let now = new Date();
  bidHist.innerHTML +=
    currentPrice +
    " " +
    now.getFullYear() +
    "/" +
    now.getMonth() +
    "/" +
    now.getDay() +
    " " +
    now.getHours() +
    ":" +
    now.getMinutes() +
    ":" +
    now.getSeconds() +
    "<br>";
});

secondButton.addEventListener("click", function () {
  bid = 10;
  let currentPrice = (price.innerHTML = bid + "€");
  minPrice.innerHTML = bid + (bid * 20) / 100 + "€";
  document.getElementById("10").disabled = true;
  let now = new Date();
  bidHist.innerHTML +=
    currentPrice +
    " " +
    now.getFullYear() +
    "/" +
    now.getMonth() +
    "/" +
    now.getDay() +
    " " +
    now.getHours() +
    ":" +
    now.getMinutes() +
    ":" +
    now.getSeconds() +
    "<br>";
});

thirdButton.addEventListener("click", function () {
  bid = 15;
  let currentPrice = (price.innerHTML = bid + "€");
  minPrice.innerHTML = bid + (bid * 20) / 100 + "€";
  document.getElementById("15").disabled = true;
  document.getElementById("10").disabled = true;
  document.getElementById("5").disabled = true;

  let now = new Date();
  bidHist.innerHTML +=
    currentPrice +
    " " +
    now.getFullYear() +
    "/" +
    now.getMonth() +
    "/" +
    now.getDay() +
    " " +
    now.getHours() +
    ":" +
    now.getMinutes() +
    ":" +
    now.getSeconds() +
    "<br>";
});

//to-do
inputButton.addEventListener("click", function () {
  let dPrice = document.getElementById("Dprice").value;

  if (dPrice > price.innerHTML) {
    let currentPrice = (price.innerHTML = dPrice + "€");
    minPrice.innerHTML =
      Math.round(parseInt(dPrice, 10) + (parseInt(dPrice, 10) * 20) / 100) +
      "€";
    let now = new Date();
    bidHist.innerHTML +=
      currentPrice +
      " " +
      now.getFullYear() +
      "/" +
      now.getMonth() +
      "/" +
      now.getDay() +
      " " +
      now.getHours() +
      ":" +
      now.getMinutes() +
      ":" +
      now.getSeconds() +
      "<br>";
  } else {
    if (dPrice >= 5) {
      document.getElementById("5").disabled = true;
    }
    if (dPrice >= 10) {
      document.getElementById("5").disabled = true;
      document.getElementById("10").disabled = true;
    }
    if (dPrice >= 15) {
      document.getElementById("5").disabled = true;
      document.getElementById("10").disabled = true;
      document.getElementById("15").disabled = true;
    }
    alert("Debe ser mayor que la puja actual");
  }
});
