document.addEventListener("DOMContentLoaded", function () {
  const cart = JSON.parse(localStorage.getItem("bunzyCart")) || [];
  const total = cart.reduce((sum, item) => sum + item.price, 0);

  const orderItemsContainer = document.querySelector(".order-items");
  orderItemsContainer.innerHTML = cart
    .map(
      (item) => `
    <div class="order-item">
      <div class="item-image">
        <img src="${item.img}" alt="${item.name}">
      </div>
      <div class="item-details">
        <h4>${item.name}</h4>
        <p>$${item.price.toFixed(2)}</p>
      </div>
    </div>
  `
    )
    .join("");

  document.getElementById("orderTotal").textContent = `$${total.toFixed(2)}`;

  document
    .getElementById("checkoutForm")
    .addEventListener("submit", function (e) {
      const required = ["firstName", "lastName", "email", "phone", "address"];
      const isValid = required.every((id) =>
        document.getElementById(id).value.trim()
      );

      if (!isValid) {
        alert("Please fill all required fields");
        return;
      }

      alert(`Order confirmed! Total: $${total.toFixed(2)}`);

      localStorage.removeItem("bunzyCart");
    });
});
