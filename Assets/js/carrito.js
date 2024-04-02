const btnCart = document.querySelector('.carrito-icon')
const containerCartProducts = document.querySelector('.container-cart-products')

btnCart.addEventListener('click', () =>{
    containerCartProducts.classList.toggle('hidden-cart')
})