<?php
// Output messages
$response = '';
// Check if the form was submitted
/* 
Pregunta 1 -->Tiempo_de_conocer
Pregunta 2 -->Como_conociste
Pregunta 3 -->Frequency
Pregunta 4 -->Juego_Favorito
Pregunta 5 -->position
Pregunta 6 -->game_suggest
Pregunta 7 -->position2
Pregunta 8 -->Platillos_Preferidos
Pregunta 9 -->Bebidas_Preferidas
Pregunta 10 -->Platillos_Sugerencias
Pregunta 11 -->Recommendar
Pregunta 12 -->Satisfaction
Pregunta 13 -->comments
Pregunta 14 -->email
Pregunta 15 -->Sexo
Pregunta 16 -->Ocupacion
Pregunta 17 -->hijos
Pregunta 18 -->CP
Pregunta 19 -->NEstudios
*/

if ($_POST)
{
	// Process form data 
	// Assign POST variables

	$val = "";
	$val = $val.(isSet($_POST['Tiempo_de_conocer']) ? "" : "Falta Tiempo_de_conocer\n");
	$val = $val.(isSet($_POST['Como_conociste']) ? "" : "Falta Como_conociste\n");
	$val = $val.(isSet($_POST['known_Store']) ? "" : "Falta known_Store\n");
	$val = $val.(isSet($_POST['Fav_Suc']) ? "" : "Falta Fav_Suc\n");
	$val = $val.(isSet($_POST['Frequency']) ? "" : "Falta Frequency\n");
	$val = $val.(isSet($_POST['Juego_Favorito']) ? "" : "Falta Juego_Favorito\n");
	$val = $val.(isSet($_POST['position']) ? "" : "Falta position\n");
	$val = $val.(isSet($_POST['game_suggest']) ? "" : "Falta game_suggest\n");
	$val = $val.(isSet($_POST['position2']) ? "" : "Falta position2\n");
	$val = $val.(isSet($_POST['position3']) ? "" : "Falta position3\n");
	$val = $val.(isSet($_POST['position4']) ? "" : "Falta position4\n");
	$val = $val.(isSet($_POST['position5']) ? "" : "Falta position5\n");
	$val = $val.(isSet($_POST['Recommendar']) ? "" : "Falta Recommendar\n");
	$val = $val.(isSet($_POST['Satisfaction']) ? "" : "Falta Satisfaction\n");
	$val = $val.(isSet($_POST['comments']) ? "" : "Falta Tiempo_de_conocer\n");
	$val = $val.(isSet($_POST['email']) ? "" : "Falta email\n");
	$val = $val.(isSet($_POST['bday']) ? "" : "Falta bday\n");
	$val = $val.(isSet($_POST['Sexo']) ? "" : "Falta Sexo\n");
	$val = $val.(isSet($_POST['Ocupacion']) ? "" : "Falta Ocupacion\n");
	$val = $val.(isSet($_POST['hijos']) ? "" : "Falta hijos\n");
	$val = $val.(isSet($_POST['CP']) ? "" : "Falta CP\n");
	$val = $val.(isSet($_POST['NEstudios']) ? "" : "Falta NEstudios\n");




	//$val = $val.(isSet(var1) ? "" : "Var 1 not set");
	//$contact_pref = implode(', ', $_POST['contact_pref']);

	$Tiempo_de_conocer = $_POST['Tiempo_de_conocer'];
	$Como_conociste = $_POST['Como_conociste'];
	$Suc_Conoc = implode(', ',$_POST['known_Store']);
	$Suc_Fav = $_POST['Fav_Suc'];
	$Frequency = $_POST['Frequency'];
	$Juego_Favorito = $_POST['Juego_Favorito'];
	$position = $_POST['position'];
	$game_suggest = implode(', ',$_POST['game_suggest']);
	$position2 = $_POST['position2'];
	$position3 = $_POST['position3'];
	$position4 = $_POST['position4'];
	$position5 = $_POST['position5'];
	$Platillos_Preferidos =implode (', ',$_POST['Platillos_Preferidos']);
	$Bebidas_Preferidas =implode (', ',$_POST['Bebidas_Preferidas']);
	$Platillos_Sugerencias =implode (', ',$_POST['Platillos_Sugerencias']);
	$Recommendar = $_POST['Recommendar'];
	$Satisfaction = $_POST['Satisfaction'];
	$comments = $_POST['comments'];
	$email = $_POST['email'];
	$bday = $_POST['bday'];
	$Sexo = $_POST['Sexo'];
	$Ocupacion = $_POST['Ocupacion'];
	$hijos = $_POST['hijos'];
	$CP = $_POST['CP'];
	$NEstudios = $_POST['NEstudios'];

	//$contact_pref = implode(', ', $_POST['contact_pref']);
	// Where to send the mail? It should be your email address
	$to      = 'badillo.delgado.jorge@gmail.com';
	// Mail from
	$from    = 'gutete@gutetesurveys.com';
	// Mail subject
	$subject = 'A user has submitted a survey';
	// Mail headers
	$headers = 'From: ' . $from . "\r\n" . 'Reply-To: ' . $from . "\r\n" . 'Return-Path: ' . $from . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n" . 'MIME-Version: 1.0' . "\r\n" . 'Content-Type: text/html; charset=UTF-8' . "\r\n";
	// Capture the email template file as a string
	ob_start();
	include 'email-template.php';
	$email_template = ob_get_clean();
	if (empty($val)){


		$messagetxt= $Tiempo_de_conocer . PHP_EOL . $Como_conociste . PHP_EOL . $Suc_Conoc . PHP_EOL . $Suc_Fav .  PHP_EOL . $Frequency . PHP_EOL . $Juego_Favorito . PHP_EOL . $position . PHP_EOL . $game_suggest . PHP_EOL . $position2 . PHP_EOL . $position3 . PHP_EOL . $position4 . PHP_EOL . $position5 . PHP_EOL . $Platillos_Preferidos . PHP_EOL . $Bebidas_Preferidas . PHP_EOL . $Platillos_Sugerencias . PHP_EOL . $Recommendar . PHP_EOL . $Satisfaction . PHP_EOL . $comments . PHP_EOL . $email . PHP_EOL . $bday . PHP_EOL . $Sexo . PHP_EOL . $Ocupacion . PHP_EOL . $hijos . PHP_EOL . $CP . PHP_EOL . $NEstudios . PHP_EOL . PHP_EOL;
		$fp = fopen('data.txt', 'a');

		fwrite($fp,$messagetxt);
		fclose($fp);





		if (mail($to, $subject, $email_template, $headers)) {
		// Success
			$counter = file_get_contents("counter.txt");
			file_put_contents("counter.txt", $counter+1);
			$counter = file_get_contents("counter.txt");
			echo "PREMIO ID $counter";

			$response = '<img src="asf.png" id="imgpremio" class="survey-form">';		
		} else {
		// Fail
			$response = '<h3>Error!</h3><p>Message could not be sent! Please check your mail server settings!</a>';
		}
	}
	else{
		$response = "<h3>$val</h3><p><div class='buttons'><a href='#' class='btn alt' data-set-step='5'>Anterior</a></div>";
	}
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1">
	<title>Encuesta C&D</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form class="survey-form" method="post" action="">
		<h1> <img src="CDLOGO.jpg" id="imgprinc"></h1>
		<div class="steps">
			<div class="step current"></div>
			<div class="step"></div>
			<div class="step"></div>
			<div class="step"></div>
			<div class="step"></div>	
		</div>
		<!-- Primera Sección -->
		

		<div class="step-content current" data-step="1">
			<div class="fields">
			<p>¿Cuál es el nombre de la empresa en la que trabajas?</p>
				<div>
					<select name="Juego_Favorito" id="JFavorito" style="text-align: center;">

						<option disabled selected value>Pícale acá</option>
						<option value="Catán">Catán</option>
						<option value="Carcassone">Carcassone</option>
						<option value="Azul">Azul</option>
						<option value="Splendor">Splendor</option>
						<option value="Century">Century: la ruta de las especias</option>
						<option value="King">King of Tokio/King of New York</option>
						<option value="Fantasma">Fantasma blitz</option>
						<option value="Sushi">Sushi go</option>
						<option value="Código">Código secreto</option>
						<option value="Desconozco">No conozco ninguno de éstos</option>
					</select>
				</div>	

			</div>
			<div class="buttons">
				<a href="#" class="btn" data-set-step="2">Siguiente</a>
			</div>
		</div>
		<!-- Segunda Sección -->
		<!-- Pregunta 5 -->
		<div class="step-content" data-step="2">
			<div class="fields">
				



			</div>
			<div class="buttons">
				<a href="#" class="btn alt" data-set-step="1">Anterior</a>
				<a href="#" class="btn" data-set-step="3">Siguiente</a>
			</div>
		</div>

		<!-- Sección 3 -->
		<!-- Pregunta 8 -->
		<div class="step-content" data-step="3">
			<div class="fields">
				
			</div>
			<div class="buttons">
				<a href="#" class="btn alt" data-set-step="2">Anterior</a>
				<a href="#" class="btn" data-set-step="4">Siguiente</a>
			</div>
		</div>
	</div>


	<!-- Sección 4-->
	<div class="step-content" data-step="4">
		<div class="fields">

		</div>

		<div class="buttons">
			<a href="#" class="btn alt" data-set-step="3">Anterior</a>
			<input type="submit" class="btn" name="submit" value="Submit" id="checkBtn">
		</div>


	</div>
	<div class="step-content" data-step="5">
		<div class="result"><?=$response?></div>
	</div>


</form>




<script>
	const setStep = step => {
		document.querySelectorAll(".step-content").forEach(element => element.style.display = "none");
		document.querySelector("[data-step='" + step + "']").style.display = "block";
		document.querySelectorAll(".steps .step").forEach((element, index) => {
			index < step-1 ? element.classList.add("complete") : element.classList.remove("complete");
			index == step-1 ? element.classList.add("current") : element.classList.remove("current");
		});
	};
	document.querySelectorAll("[data-set-step]").forEach(element => {
		element.onclick = event => {
			event.preventDefault();
			setStep(parseInt(element.dataset.setStep));
		};
	});
	<?php if (!empty($_POST)): ?>
		setStep(5);
	<?php endif; ?>
</script>

<script>

	function changeradioother(){
		var other= document.getElementById("other");
		other.value=document.getElementById("inputother").value;
	}
	function setRequired(){

		document.getElementById("inputother").required=true;
	}

	function removeRequired(){
		if(document.getElementById("inputother").required == true){
			document.getElementById("inputother").required=false;
		}
	}
</script>



</body>
</html>