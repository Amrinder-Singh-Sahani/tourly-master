const cartItems = [];
let totalPrice = 0;

function addToCart(title, price) {
  cartItems.push({ title, price });
  totalPrice += price;
  alert(`${title} has been added to your cart.`);
  updateCart();
}

function updateCart() {
  const cartItemsList = document.getElementById('cartItemsList');
  const cartTotal = document.getElementById('cartTotal');
  cartItemsList.innerHTML = '';
  cartItems.forEach((item, index) => {
    const listItem = document.createElement('li');
    listItem.innerHTML = `
      <span class="cart-item-title">${item.title}</span>
      <span class="cart-item-quantity">1</span>
      <button class="cart-item-delete" onclick="removeFromCart(${index})">Remove</button>
    `;
    cartItemsList.appendChild(listItem);
  });
  cartTotal.innerText = totalPrice.toFixed(2);
}

function removeFromCart(index) {
  const item = cartItems[index];
  totalPrice -= item.price;
  cartItems.splice(index, 1);
  updateCart();
}

function toggleCart() {
  const cartPopup = document.getElementById('cartPopup');
  if (cartPopup.style.display === 'none' || cartPopup.style.display === '') {
    cartPopup.style.display = 'block';
  } else {
    cartPopup.style.display = 'none';
  }
}

function toggleBookingForm() {
  const bookingForm = document.getElementById('bookingForm');
  if (bookingForm.style.display === 'none' || bookingForm.style.display === '') {
    bookingForm.style.display = 'block';
  } else {
    bookingForm.style.display = 'none';
  }
}

function submitBookingForm(event) {
  event.preventDefault();
  const checkInDate = document.getElementById('checkInDate').value;
  const checkOutDate = document.getElementById('checkOutDate').value;

  if (!checkInDate || !checkOutDate) {
    alert('Please enter both check-in and check-out dates.');
    return;
  }

  // Assuming you process the booking here
  alert(`Booking confirmed from ${checkInDate} to ${checkOutDate}.`);
  // Reset cart and booking form
  cartItems.length = 0;
  totalPrice = 0;
  updateCart();
  toggleBookingForm();
  toggleCart();
}