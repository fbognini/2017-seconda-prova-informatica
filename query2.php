<?
	include_once("./config.php");

?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Foursquare</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href='css/style.css' rel='stylesheet' type='text/css'>
	<!--link href='css/bootstrap.css' rel='stylesheet' type='text/css'-->
	<script>
		function updateStatus(status){
			document.getElementById("status").value = status;
			document.getElementById("form").submit();			
		}
	</script>
  </head>
  <body>
	<div class="jumbotron">
		<div class="container">
			<h1 class="display-3">Prova di maturita' 2017</h1>
			<p>Terza prova di maturità - indirizzo informatica</p>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-3">
				<form method="POST" name="form" id="form">
					<h4>Inserisci prenotazione</h4>
					<input type="text" name="nprenotazione" class="form-control" value="<? echo $_POST["nprenotazione"] ?>" placeholder="Numero prenotazione" required autofocus>
					<button type="submit" class="btn btn-primary btn-lg btn-block">RIEPILOGO</button>
				</form>
			</div>
			<div class="col-12 col-md-9">
			<?
				echo '<h4>Riepilogo prenotazione</h4>';
				echo '<p>Le prenotazioni hanno ID da 1 a 4000</p>';
				if(empty($_POST["nprenotazione"]))
					echo '<p>Indicare il numero della prenotazione</p>';
				else {
					$prenotazione = $_POST["nprenotazione"];
					
					$query_autista = 'SELECT car_utenti.nome, car_utenti.cognome, car_viaggi.partenza, car_viaggi.destinazione, car_viaggi.data FROM car_utenti INNER JOIN car_viaggi ON car_utenti.id=car_viaggi.id_autista INNER JOIN car_prenotazioni ON car_prenotazioni.id_viaggio=car_viaggi.id WHERE car_prenotazioni.id="'.$prenotazione.'"';
					$query_passeggero = 'SELECT * FROM car_utenti INNER JOIN car_prenotazioni ON car_prenotazioni.id_passeggero=car_utenti.id WHERE car_prenotazioni.id="'.$prenotazione.'"';
					$result_passeggero = mysqli_query($mysqli, $query_passeggero);
					$result_autista = mysqli_query($mysqli, $query_autista);
					
					if(mysqli_num_rows($result_passeggero)>0 && mysqli_num_rows($result_autista)>0){  
						$passeggero = mysqli_fetch_assoc($result_passeggero);
						$autista = mysqli_fetch_assoc($result_autista);
						echo '<table class="table table-bordered">';
						echo '<tr><td>Mail</td><td>'.$passeggero['email'].'</td></tr>';
						echo '<tr><td>Oggetto</td><td>Promemoria prenotazione</td></tr>';
						echo '<tr><td colspan="2">';
						echo '<p>Buongiorno Sig./ Sig.ra '.$passeggero['nome'].' '.$passeggero['cognome'].'.</p>';
						echo '<p>La nostra azienda le conferma la prenotazione N.'.$prenotazione.'.<br> Il viaggio verrà effettuato il giorno '.$autista['data'].', partirà da '.$autista['partenza'].' e arriverà '.$autista['destinazione'].'.</p>';
						echo '<p>L\'autista sarà il Sig./ Sig.ra '.$autista['nome'].' '.$autista['cognome'].'</p>';
						echo '<p>La ringraziamo per la scelta, <br>FrancescoBognini CarPooling SRL</p>';
						echo '</td></tr>';
						echo '</table>';
					}
					
					echo "<hr>";
					echo "<h5>Query effettuate</h5>";
					echo "<h6>Query autista</h6>";
					echo "<i><p>$query_autista</p></i>";
					echo "<h6>Query passeggero</h6>";
					echo "<i><p>$query_passeggero</p></i>";

					
						/*
						$result = mysqli_query($mysqli, $query);
						if(mysqli_num_rows($result)>0){  
							$row = mysqli_fetch_assoc($result);
						}
						*/
				}
			
			?>
			</div>
		</div>

		<footer class="container">
			<hr>
        <p>&copy; Franceso Bognini - I sorgenti sono disponibili su <a href="https://github.com/fbognini/2017-seconda-prova-informatica" target="_blank">GitHub</a></p>
		</footer>
  </body>
</html>