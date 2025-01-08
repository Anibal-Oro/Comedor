 <nav class="navbar" role="navigation" aria-label="main navigation">
<div class="navbar-brand">
  <a class="navbar-item" href="https://www.youtube.com/watch?v=XfELJU1mRMg">
    <img width="90" height="120" src="./style/img/logo-unerg.png">
  </a>

  <a role="button" class="navbar-burger" aria-label="menu"      aria-expanded="false" data-target="navbarBasicExample">
    <span aria-hidden="true"></span>
    <span aria-hidden="true"></span>
    <span aria-hidden="true"></span>
    <span aria-hidden="true"></span>
  </a>
</div>

<div id="navbarBasicExample" class="navbar-menu">
  <div class="navbar-start">
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> Menu </a>
          <div class="navbar-dropdown">
            <a class="navbar-item" href="index.php?view=menu_nuevo"> Agregar </a>
            <a class="navbar-item" href="index.php?view=menu_editar"> Editar </a>
            <a class="navbar-item" href="index.php?view=menu_eliminar"> Eliminar </a>
          </div>
    </div>
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link"> Estudiantes </a>
          <div class="navbar-dropdown">
            <a class="navbar-item" href="index.php?view=estudiante_agregar"> Agregar </a>
            <a class="navbar-item" href="index.php?view=estudiante_ver"> Ver Lista </a>
          </div>
    </div>
      <a class="navbar-item"> Estudiantes </a>
      <a class="navbar-item" href="index.php?view=comidas"> Comidas </a>
  </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-light" href="cerrar_session.php"> Salir </a>
        </div>
      </div>
    </div>

</div>
</nav>




<script>
document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });

});
</script>

<script src="./models/script.js"> </script>