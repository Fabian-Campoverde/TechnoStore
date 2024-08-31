$(document).ready(function() {
    // Obtener el carrito pasado desde el backend
    var cart = window.cartData || {}; // Definir un objeto vacío si no hay datos

    // Actualiza el contenido del modal y el contador con los datos del carrito
    updateCartModal2(cart);
    updateCartCount2(cart);


    // Función para actualizar el contenido del modal del carrito
    function updateCartModal2(cart) {
        var cartItemsHtml = '';
        var total = 0;

        // Verifica si el carrito está vacío
    if (cart.items.length === 0) {
        cartItemsHtml = '<p class="text-center text-gray-500 dark:text-gray-400">El carrito de compras está vacío</p>';
    } else {
        $.each(cart.items, function(index, item) {
            cartItemsHtml += `<div class="flex items-center p-4 border rounded-lg dark:bg-gray-800 dark:border-gray-700">
            <img class="w-16 h-16  dark:hidden object-fit rounded-t-lg" src="${item.imagen}" alt="${item.name}">
            <div class="ml-4 flex-1">
            <h4 class="text-sm font-semibold text-gray-900 dark:text-white">${item.name}</h4>
            <p class="text-sm text-gray-500 dark:text-gray-400">Precio: S/${item.price.toFixed(2)}</p>
            <p class="text-sm text-gray-500 dark:text-gray-400">Cantidad: ${item.quantity}</p>
            <span class="subtotal-price" data-product-id="${item.id}">Subtotal: S/${(item.price * item.quantity).toFixed(2)}</span>
            </div>
            <form class="form-delete" action="" method="post" >
                                      
               <input type="hidden" name="product_id" value="${item.id}">
            <input type="hidden" name="product_name" value="${item.name}">
            <button type="submit" data-product-id="${item.id}" class="remove-item text-red-600 hover:text-red-700 dark:text-red-500 dark:hover:text-red-600">
    <span class="sr-only">Eliminar</span>
    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
</button>
                              
                        </form>      
                              </div>`;
            total += item.price * item.quantity;
            $('#cartModal .eliminar').removeClass("hidden");  
        });
    }

        $('#cartModal .products').html(cartItemsHtml);
        $('#cartModal .total').text('S/' + total.toFixed(2));

       
    }

    // Función para actualizar el contador del carrito
    function updateCartCount2(cart) {
        var totalQuantity = 0;

        $.each(cart.items, function(index, item) {
            totalQuantity += parseInt(item.quantity);
        });

        $('#cantidad').text(totalQuantity);
        $('#cantidad2').text(totalQuantity);
        
    }

    $('.form-delete').submit(function(e) {
        e.preventDefault();
        const productName = e.target.querySelector("input[name='product_name']").value;
        const productId = e.target.querySelector("input[name='product_id']").value;
        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        Swal.fire({
            title: `¿Estás seguro de que deseas eliminar "${productName}" del carrito?`,
            text: "No hay vuelta atrás!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, hazlo!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/cart/remove',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        _token: csrf ,
                        _method: 'DELETE',
                        product_id: productId
                },
                    success: function(response) {
                        // Actualizar el contenido del modal y el contador con los datos del carrito
                        updateCartModal2(response.cart);
                        updateCartCount2(response.cart);
                        location.reload();
                        // Opcional: Mostrar un mensaje de éxito
                        
                        // Recargar la página después de la alerta
                
                    },
                    error: function(xhr) {
                        console.error('Error al eliminar el producto del carrito:', xhr.responseText);
                    }
                });
            }
        });
    });

    $(document).on('click', '.eliminar button', function(e) {
        e.preventDefault(); // Prevenir el comportamiento por defecto del botón
        var csrf = document.querySelector('meta[name="csrf-token"]').content;
        // Confirmación antes de eliminar todos los elementos
        Swal.fire({
            title: `¿Estás seguro de que deseas eliminar todos los elementos del carrito?`,
            text: "No hay vuelta atrás!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, hazlo!',
            cancelButtonText: 'Cancelar',
            
        }).then((result) => {
            if (result.isConfirmed) {
            $.ajax({
                url: '/cart/clear', // Ruta que manejará la eliminación en el backend
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        _token: csrf ,
                        _method: 'DELETE',
                        
                },
                success: function(response) {
                    // Actualizar el modal y el carrito en la interfaz
                    updateCartModal2(response.cart);
                    updateCartCount2(response.cart);
                    location.reload();
                },
                error: function(xhr) {
                    console.error('Error al vaciar el carrito:', xhr.responseText);
                }
            });
        }
        });
    });
    
});