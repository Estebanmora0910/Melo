document.addEventListener("DOMContentLoaded", () => {
  fetch("/melo8-main/Controlador/verificar_estado.php")
    .then(res => res.text())
    .then(data => {
      const perfilLink = document.getElementById("perfil-link");
      const btnLogin   = document.getElementById("btn-login");
      const btnRegister = document.getElementById("btn-register");
      const btnLogout  = document.getElementById("btn-logout");

      if (data.trim() === "1") {
        // ✅ Usuario logueado: mostrar perfil, ocultar login y registro
        if (perfilLink)  perfilLink.classList.remove("d-none");
        if (btnLogin)    btnLogin.parentElement.style.display = "none";
        if (btnRegister) btnRegister.parentElement.style.display = "none";
        if (btnLogout)   btnLogout.style.display = "inline-block";
      } else {
        // ❌ No hay sesión: ocultar perfil y logout
        if (perfilLink)  perfilLink.classList.add("d-none");
        if (btnLogout)   btnLogout.style.display = "none";
      }
    })
    .catch(err => console.error("Error verificando sesión:", err));
});

