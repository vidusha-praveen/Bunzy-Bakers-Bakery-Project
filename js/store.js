const cartToggle = document.querySelector(".btn-cart-toggle");
const cartSidebar = document.querySelector(".cart-sidebar");
const cartOverlay = document.querySelector(".cart-overlay");
const closeCart = document.querySelector(".btn-close-cart");

cartToggle.addEventListener("click", () => {
  cartSidebar.classList.add("active");
  cartOverlay.classList.add("active");
});

closeCart.addEventListener("click", () => {
  cartSidebar.classList.remove("active");
  cartOverlay.classList.remove("active");
});

cartOverlay.addEventListener("click", () => {
  cartSidebar.classList.remove("active");
  cartOverlay.classList.remove("active");
});

const addToCartButtons = document.querySelectorAll(".btn-add");
const cartItemsContainer = document.querySelector(".cart-items");
const cartTotal = document.querySelector(".cart-total span");
const cartCount = document.querySelector(".cart-count");

let cart = [];
let total = 0;

addToCartButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const productCard = button.closest(".product-card");
    const productName = productCard.querySelector("h3").textContent;
    const productPrice = parseFloat(
      productCard.querySelector(".price").textContent.replace("$", "")
    );
    const productImg = productCard.querySelector("img").src;

    cart.push({
      name: productName,
      price: productPrice,
      img: productImg,
    });

    updateCart();
  });
});

function updateCart() {
  cartItemsContainer.innerHTML = "";

  total = 0;
  cart.forEach((item, index) => {
    total += item.price;

    const cartItem = document.createElement("div");
    cartItem.className = "cart-item";
    cartItem.innerHTML = `
            <div class="cart-item-img">
                <img src="${item.img}" alt="${item.name}">
            </div>
            <div class="cart-item-details">
                <h4>${item.name}</h4>
                <p>$${item.price.toFixed(2)}</p>
                <button class="btn-remove" data-index="${index}">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
        `;
    cartItemsContainer.appendChild(cartItem);
  });

  cartTotal.textContent = `$${total.toFixed(2)}`;
  cartCount.textContent = cart.length;

  document.querySelectorAll(".btn-remove").forEach((button) => {
    button.addEventListener("click", (e) => {
      const index = e.currentTarget.dataset.index;
      cart.splice(index, 1);
      updateCart();
    });
  });

  localStorage.setItem("bunzyCart", JSON.stringify(cart));
  localStorage.setItem("bunzyCartTotal", total.toFixed(2));
}
