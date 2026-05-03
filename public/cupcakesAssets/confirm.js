// Update the buy link to pass the product name and amount as query parameters
const buyButtons = document.querySelectorAll('.buy');
buyButtons.forEach(button => {
  button.addEventListener('click', (event) => {
    event.preventDefault();
    showPopup(event.target.dataset.name, event.target.dataset.amount);
  });
});