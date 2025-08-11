document.addEventListener("DOMContentLoaded", () => {
  const productos = document.querySelectorAll(".product");
  const previewsContainer = document.querySelector(".products-preview");
  const previewBoxes = document.querySelectorAll(".products-preview .preview");
  const carritoLista = document.getElementById("carrito-lista");
  const carritoTotal = document.getElementById("carrito-total");
  const vaciarCarritoBtn = document.getElementById("vaciar-carrito");
  const pagarCarritoBtn = document.getElementById("pagar-carrito");
  const carritoContenedor = document.getElementById("carrito");
  const contadorCarrito = document.getElementById("contador-carrito");
  const carritoBoton = document.querySelector(".carrito-boton");

  let carrito = [];

  function actualizarCarrito() {
    carritoLista.innerHTML = "";
    let total = 0;

    carrito.forEach((producto, index) => {
      const li = document.createElement("li");
      li.innerHTML = `
        ${producto.nombre} - $${producto.precio}
        <button class="eliminar-producto" data-index="${index}" style="margin-left:10px; color:red;">x</button>
      `;
      carritoLista.appendChild(li);
      total += producto.precio;
    });

    carritoTotal.textContent = `Total: $${total}`;
    contadorCarrito.textContent = carrito.length;
  }

  // Evento para mostrar/ocultar carrito al hacer clic en el icono
  carritoBoton.addEventListener("click", () => {
    carritoContenedor.style.display =
      carritoContenedor.style.display === "none" ? "block" : "none";
  });

  // Cierre del preview
  document.querySelectorAll(".preview .fa-times").forEach((cerrar) => {
    cerrar.addEventListener("click", () => {
      previewsContainer.style.display = "none";
      previewBoxes.forEach((preview) => (preview.style.display = "none"));
    });
  });

  // Botón agregar al carrito
  document.querySelectorAll(".buy").forEach((boton) => {
    boton.addEventListener("click", () => {
      const preview = boton.closest(".preview");
      const nombre = preview.querySelector("h3").textContent;
      const precioTexto = preview.querySelector(".price").textContent;
      const precio = parseInt(precioTexto.replace("$", ""));

      carrito.push({ nombre, precio });
      actualizarCarrito();
      previewsContainer.style.display = "none";
      previewBoxes.forEach((preview) => (preview.style.display = "none"));
    });
  });

  // Botón vaciar carrito
  vaciarCarritoBtn.addEventListener("click", () => {
    carrito = [];
    actualizarCarrito();
  });

  // Botón eliminar individual
  carritoLista.addEventListener("click", (e) => {
    if (e.target.classList.contains("eliminar-producto")) {
      const index = e.target.getAttribute("data-index");
      carrito.splice(index, 1);
      actualizarCarrito();
    }
  });

  // Lógica para mostrar previews
  productos.forEach((product) => {
    const dataName = product.getAttribute("data-name");
    const btn = product.querySelector(".btn1");

    btn.addEventListener("click", () => {
      previewsContainer.style.display = "flex";

      previewBoxes.forEach((preview) => {
        const dataId = preview.getAttribute("data-id");
        preview.style.display = dataId === dataName ? "block" : "none";
      });
    });
  });
});

if (irAPagarBtn) {
  irAPagarBtn.addEventListener("click", () => {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    if (carrito.length === 0) {
      alert("Tu carrito está vacío");
      return;
    }

    fetch("../../Controlador/verificar_estado.php")
      .then(res => res.json())
      .then(data => {
        console.log("Estado de sesión:", data); // Para debug
        if (!data.logueado) {
          alert("⚠ Debes iniciar sesión para continuar con el pago");
          window.location.href = "../../Vista/html/login.php";
          return;
        }

        // Si está logueado, guardar pedido
        fetch("../../Controlador/guardar_pedidos.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ carrito })
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            alert("✅ Pedido guardado correctamente");
            localStorage.removeItem("carrito");
            mostrarCarrito();
            actualizarContador();
            window.location.href = "../../Vista/html/pagos.php";
          } else {
            alert("❌ Hubo un problema al guardar el pedido");
          }
        })
        .catch(err => {
          console.error("Error al guardar el pedido:", err);
          alert("❌ Error al procesar el pedido");
        });
      })
      .catch(err => {
        console.error("Error al verificar sesión:", err);
        alert("❌ No se pudo verificar el estado de la sesión");
      });
  });
}

