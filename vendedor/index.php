<?php 
session_start();
require_once "_autorize_vendedor.php";
include_once "../conexao.php";



?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Jobs</title>
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

    <?php 
    if (isset($_GET["jaorçado"])) {

        if ($_GET["jaorçado"] == 200) {
           echo "<script>alert('projeto já orçado por outro desenvolvedor, não roube a vez do coleguinha.')</script>";
        }
        
    }
    if (isset($_GET["orcamentoenviado"])) {

        if ($_GET["orcamentoenviado"] == 200) {
           echo "<script>alert('Orçamento enviado com sucesso')</script>";
        }
        
    }
?>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block"></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                     
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION["email"]; ?></span>
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

    <!-- ======= Sidebar ======= -->
    <?php include_once "sidebar.php"; ?>

    <main id="main" class="main">
        <a href="novoprojeto.php"><button type="button" class="btn btn-primary float-end">Novo Projeto</button></a>
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Projetos orçados</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <?php 
                                            
                                            $sql = "SELECT * from projeto WHERE projeto.cliente LIKE '%$_SESSION[email]%' && status = 'orçado';";
                                            $resultado = mysqli_query($conn, $sql);

                                            $todos= mysqli_fetch_all($resultado, MYSQLI_ASSOC);

                                            // echo '<pre>';
                                            // print_r($todos);
                                            // echo '</pre>';
                                            
                                            $count= 0;
                                            foreach ($todos as $key => $value) {
                                                // $sql = "SELECT * from orcamentos WHERE projeto_id = " . $value['id'];
                                                // $resultado = mysqli_query($conn, $sql);

                                                // if(!empty(mysqli_fetch_all($resultado)))
                                                    $count++;
                                            }

                                            // if ($resultado = mysqli_query($conn, $sql)) {

                                            //     // Return the number of rows in result set
                                            //     $rowcount = mysqli_num_rows( $resultado );

                                            // ?>
                                        <h6><?php echo $count ?></h6>

                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">


                                <div class="card-body">
                                    <h5 class="card-title">Projetos fechados</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center ">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <?php     
                                            
                                            
                                            $sql = "SELECT * from projeto WHERE cliente LIKE '%$_SESSION[email]%' AND status != 'orçado' AND status !='aguardando'";

                                            if ($resultado = mysqli_query($conn, $sql)) {

                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $resultado );

                                            ?>
                                        <h6><?php echo $rowcount ?></h6>
                                        <?php }; ?>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->
                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                    <h5 class="card-title">Projetos enviados</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <?php 
                                            
                                             $sql = "SELECT * from projeto WHERE cliente LIKE '%$_SESSION[email]%'";

                                            if ($resultado = mysqli_query($conn, $sql)) {

                                                // Return the number of rows in result set
                                                 $rowcount = mysqli_num_rows( $resultado );

                                            ?>
                                        <h6><?php echo $rowcount ?></h6>
                                        <?php }; ?>

                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">


                                <div class="card-body">
                                    <h5 class="card-title">Projetos não orçados</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center ">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <?php 

                                            
                                            $sql = "SELECT * FROM projeto WHERE status = 'aguardando' AND cliente LIKE '%$_SESSION[email]%' ORDER BY id DESC";
                                            $total_nao_orcado= 0;
                                            $resultado = mysqli_query($conn, $sql);
                                                $dados= mysqli_fetch_all($resultado, MYSQLI_ASSOC);
                                            foreach ($dados as $value) {
                                                # code...

                                                // $yx_sql = "SELECT * FROM orcamentos WHERE projeto_id = " . $value['id'];
                                                // $yx_resultado = mysqli_query($conn, $yx_sql);
                                                // $yx_dados= mysqli_fetch_all($yx_resultado);

                                                // if(!empty($yx_dados)) {
                                                //     continue;
                                                // }
                                                $total_nao_orcado++;

                                            }

                                                echo "<div class='ps-3'>
                                                <h6>$total_nao_orcado</h6>
                                                </div>"
                                            ?>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->




                    </div>

                </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title">Projetos Abertos</h5>
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Projeto</th>
                                    <th scope="col">Briefing</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Deletar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = "SELECT * FROM projeto WHERE status = 'Aguardando' AND cliente LIKE '%$_SESSION[email]%' ORDER BY id DESC";
                                    $resultado = mysqli_query($conn, $sql);

                                    while ($dados = mysqli_fetch_assoc($resultado)) {
                                        # code...

                                        // $ax_sql = "SELECT * FROM orcamentos WHERE projeto_id = " . $dados['id'];
                                        // $ax_resultado = mysqli_query($conn, $ax_sql);
                                        // $ax_dados= mysqli_fetch_all($ax_resultado);

                                        // if(!empty($ax_dados)) {
                                        //     continue;
                                        // }
                                    
                                ?>
                                <script>
                                function idHidden(id) {
                                    $("#hidden").val(id);
                                }
                                </script>
                                <tr>
                                    <td><?php echo $dados["nome"]; ?></td>
                                    <td><a target="_blank" href="<?php echo $dados["briefing"]; ?>"><span
                                                class="material-symbols-outlined text-primary">description</a></span>
                                    </td>
                                    
                                    <td><span class="badge bg-success"><?php echo $dados["status"]; ?></span></td>
                                    <td><a href="../scripts.php?deletarprojetovendedor=<?php echo $dados["id"]; ?>" onclick="if(!confirm('Deseja realmente remover este projeto?')) event.preventDefault()"><span
                                            class="material-symbols-outlined text-danger">delete</span></a></td>
                                </tr>
                                <?php }; ?>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div><!-- End Recent Sales -->



            </div>
            </div><!-- End Left side columns -->









            </div>
            </div><!-- End News & Updates -->

            </div><!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->
    <!-- Modal orçamento !-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Enviar orçamento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../scripts.php" method="POST">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Quantas horas você acredita que
                                gastará?</label>
                            <input type="number" name="horas" required="" id="um" class="form-control"
                                id="recipient-name">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Você receberá:</label>
                            <input type="number" readonly="on" id="dois" class="form-control" id="recipient-name">
                        </div>
                        <input type="hidden" name="id" id="hidden" value="">
                        <script>
                        function trim(str) {
                            return str.replace(/[^a-zA-Z0-9]/g, '')
                        }

                        let input = document.getElementById('um')
                        let input2 = document.getElementById('dois')


                        input.onkeyup = function() {
                            if (input.value < 20) {
                                input2.value = trim(input.value) * 25
                                exit();
                            } else {
                                input2.value = trim(input.value) * 17
                            }
                        }
                        </script>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="enviarvalor">Enviar</button>
                </div>
            </div>
            </form>
        </div>

    </div>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span></span></strong> Todos os direitos reservados.
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

    <?php 
    if (isset($_POST["enviar"])) {
        
?>

    <script>
    Swal.fire(
        'Orçamento enviado com sucesso!',
        'Vamos aguardar a resposta do cliente',
        'success'
    )
    </script>

    <?php } ?>


    <?php 
    if (isset($_POST["apagar"])) {
        
?>

    <script>
    Swal.fire(
        'Apagado com sucesso!',
        'Você apagou um projeto.',
        'success'
    )
    </script>

    <?php } ?>


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

<!-- Daqui pra baixo vai o código que deverá enviar mensagem no whatsapp avisando, e salvar os trem no banco de dados !-->

<?php