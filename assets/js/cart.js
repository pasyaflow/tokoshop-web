document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-cart-link').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); 
            
            const productId = this.getAttribute('data-id'); 
            if(!productId) return;

            fetch(`add_to_cart.php?id=${productId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const toastMessage = document.getElementById('toast-message');
                        if(toastMessage) {
                            toastMessage.innerText = data.message;
                        }
                        
                        const toast = document.getElementById('toast-notification');
                        if(toast) {
                            toast.classList.add('show');
                            
                            setTimeout(() => {
                                toast.classList.remove('show');
                            }, 3000);
                        }
                        
                        const cartBadge = document.querySelector('.cart-count');
                        if(cartBadge) {
                            cartBadge.innerText = data.cartCount;
                        }
                    }
                })
                .catch(err => console.error("Error adding to cart:", err));
        });
    });
});