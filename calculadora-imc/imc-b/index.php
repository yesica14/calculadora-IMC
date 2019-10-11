<?php

$mysqli = mysqli_connect("localhost","root","","imc");
if($mysqli==false){
echo"Hubo un problema al conectarse a Maria DB";
die();
}

if (isset($_POST['peso']) && isset($_POST['altura']) && is_numeric($_POST['peso']) && is_numeric($_POST['altura']) ) {
    
  $peso = $_POST['peso'];
  $altura = $_POST['altura'];

  $imc = $peso / ($altura*$altura);

  $imc = round($imc,1);
    
  if($imc<18.5){
    $resultado = "Bajo de peso";
    $color ="red";
  }
  if($imc >= 18.5 && $imc < 24.9){
    $resultado = "Normal";
    $color ="green";
  }
  if($imc >= 24.9 && $imc < 29.9){
    $resultado = "Gordito";
    $color ="yellow";
  }
  if($imc > 30){
    $resultado = "Obeso";
    $color ="orange ";
  }

 $mysqli->query("INSERT INTO `datos` ( `datos_altura`, `datos_peso`, `datos_imc`) VALUES ('".$altura."', '".$peso."', '".$imc."');");
 
 

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IMC Carculator</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/scrolling-nav.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">IMC Calculator</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#eso">IMC</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Consejos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Welcome to IMC Calculator</h1>
      <p class="lead">Health and Wellness</p>
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">

        <div class="col-lg-8 mx-auto">

        <div class="card mb-4">
          <img class="card-img-top" id="eso" src="imagenes/imc.jpg" alt="Card image cap" >
          <div class="card-body">
            <h2 class="card-title" >Calculator IMC</h2>
            <p class="card-text">Health and Wellness</p>
            <div class="row">
             <div class="col-lg-6">
              <form class="" action="index.php#eso" method="post">
              Altura (M): <input type="number" step=".01" name="altura" value="" placeholder="Ingrese su estatura" required><br><br>
              Peso (KG): <input type="number" step=".01" name="peso" value="" placeholder="Ingrese su peso" required><br><br>
              <input class="btn btn-primary" type="submit" name="" value="Calcular">
              </form>
              </div>

              <div class="col-lg-6">
               <?php if (isset($imc)){ ?>
                <?php echo "Tu IMC es de: ".$imc; ?>
                <br>
                <div style="color:<?php echo $color;?>">:<?php echo $resultado; ?></div>
               <?php } ?>
              </div>
            </div> 
          </div>
          <div class="card-footer text-muted">
           For any questions consult in the browser
            <a href="https://www.google.com">Google</a>
          </div>
        </div>
          
        </div>

      </div>
    </div>
  </section>

  <section id="services" class="bg-light">
    <div class="container">
      <div class="row">
       
        <div class="col-lg-8 mx-auto">
          <h2>Una Alimentacion Sena</h2>
          <p class="lead"><strong> Recuerda que:</strong><br>
                          El desayuno es la comida más importante del día y de ella depende la energía con la que inicies tu día.<br>
                          Lo ideal es manejar una alimentación fraccionada: 3 comidas principales (desayuno, almuerzo y cena) y 2 meriendas (nueves y onces).<br>
                          Para un adecuado aporte de vitaminas, minerales y fibra es importante consumir mínimo 3 porciones entre frutas y verduras.<br>
                          Es importante manejar el tamaño de las porciones de los alimentos.<br>
                          Se debe realizar actividad física entre 20 a 30 minutos, mínimo 3 veces por semana.<br>
                          El agua es muy importante para el cuerpo, trata de consumir entre 4 a 6 vasos de agua diarios.</p>
        </div>
        <img src="imagenes/alimentacion.jpg" alt="Card image cap">
      </div>
    </div>
  </section>

 

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="js/scrolling-nav.js"></script>

</body>

</html>
