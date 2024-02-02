import Choices from "choices.js";

// Your custom JavaScript code goes here
document.addEventListener("DOMContentLoaded", function () {
  const inputElement = document.getElementById("labour");
  const choices = new Choices(inputElement, {
    allowHTML: true,
    maxItemCount: 5,
    removeItemButton: true,
  });
});
