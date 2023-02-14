'use strict';

let next = document.getElementById("next");
let prev = document.getElementById("prev");

let next_slider = next.onclick = function next_slider () {
  let list_item = document.querySelectorAll(".item");
  document.getElementById("slide").appendChild(list_item[0]);
};
prev.onclick = function () {
  let list_item = document.querySelectorAll(".item");
  document.getElementById("slide").prepend(list_item[list_item.length - 1]);
};

setInterval(() => {
    next_slider();
}, 10000);


function check () {
  alert("Please login!");
}

