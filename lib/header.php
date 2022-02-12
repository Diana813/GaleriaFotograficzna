<div class="container-fluid">
    <a href="#" class="navbar-brand">Sklep z obrazkami Diany</a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="/welcome_page/welcome_page.php" class="nav-item nav-link active">Strona główna</a>
            <a href="#" class="nav-item nav-link">Katalog zdjęć</a>
            <a href="#" class="nav-item nav-link">O mnie</a>
            <a href="#" class="nav-item nav-link">Kontakt</a>
        </div>
        <div class="navbar-nav ms-auto">
            <a href="/basket/basket_file.php"><i class="fa-solid fa-basket-shopping fa-3x m-2"></i></a>
            <a href="/login/reset_password_file.php" class="btn btn-warning ml-3 m-2">Resetuj hasło</a>
            <a href="/login/logout.php" class="btn btn-danger ml-3 m-2">Wyloguj się</a>
            <?php if ($_SESSION["isAdmin"] == 1) { ?>
                <a href="/admin/admin_panel.php" class="btn btn-success ml-3 m-2">Panel administracyjny</a>
            <?php } ?>
        </div>
    </div>
</div>