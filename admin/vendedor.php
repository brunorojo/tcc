<?php 
session_start();
require_once "_autorize_admin.php";

    include_once "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Administração</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
            <img src="https://uploaddeimagens.com.br/images/004/182/860/full/nm_-_Copia_%283%29.png?1669662029" alt="">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">




                <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="https://uploaddeimagens.com.br/images/004/182/781/full/Perfil_01_-_Copia_%281%29.png?1669660025" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Indutiva</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sair</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <?php include_once ("sadbar.php") ?>


    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Vendedores Cadastrados</h1>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    
                </ol>
            </nav>
        </div>


        <div class="col-12 mt-4">
            <div class="card recent-sales overflow-auto">


                <div class="card-body">
                    <h5 class="card-title">Vendedores</h5>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Whatsapp</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Apagar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM vendedor";
                                $resultado = mysqli_query($conn, $sql);

                                while ($dados = mysqli_fetch_assoc($resultado)) {
                                  
                            ?>
                            <tr>
                                <td><?php echo $dados["nome"]; ?></td>
                                <td><?php echo $dados["whatsapp"]; ?></td>
                                <td><?php echo $dados["email"]; ?></td>
                                <td><a href="editarvendedor.php?id=<?php echo $dados["id"]; ?>"><span class="material-symbols-outlined text-warning">edit</span></a></td>
                                <td><a href="../scripts.php?deletarvendedor=<?php echo $dados["id"]; ?>" onclick="if(!confirm('Deseja remover este vendedor?')) event.preventDefault()"><span class="material-symbols-outlined text-danger">delete</span></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <?php 
if (isset($_GET["apagarcliente"])) {
  $apagarcliente = $_GET["apagarcliente"];

  if ($apagarcliente == 200) {
      echo "<script>
      
      Swal.fire(
        'Apagado com sucesso',
        'Cuidado para não apagar clientes importantes',
        'success'
      )

      </script>";
  }
}

if (isset($_GET["editarvendedor"])) {
    $apagarcliente = $_GET["editarvendedor"];
  
    if ($apagarcliente == 200) {
        echo "<script>
        
        Swal.fire(
          'Editado com sucesso',
          'Clique em ok para continuar',
          'success'
        )
  
        </script>";
    }
  }
?>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Indutiva Tecnologia</span></strong>. Todos os direitos reservados
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>