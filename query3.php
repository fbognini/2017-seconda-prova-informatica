<?
	include_once("./config.php");
	
	if(!isset($_POST["data"]) || empty($_POST["data"]))
		$_POST["data"] = '2018-01-01';
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
					<h4>Controlla prenotazioni</h4>
					<input type="number" name="nviaggio" class="form-control" value="<? echo $_POST["nviaggio"] ?>" placeholder="Numero viaggio" required autofocus>
					<input type="number" name="votomin" class="form-control" value="<? echo $_POST["votomin"] ?>" placeholder="Voto minimo" required autofocus>
					<button type="submit" class="btn btn-primary btn-lg btn-block">CONTROLLA</button>
				</form>
			</div>
			<div class="col-12 col-md-9">
			<?
				echo '<h4>Controlla prenotazioni</h4>';
				echo '<p>I viaggi hanno ID da 1 a 2000<br>Valutazioni da 1 a 10</p>';
				if(empty($_POST["nviaggio"]))
					echo '<p>Indicare il viaggio e la valutazione minima [1-10]</p>';
				else {
					$nviaggio = $_POST["nviaggio"];
					$votomin = $_POST["votomin"];
					// echo "$nviaggio $votomin";
					echo '<h4>Valuta prenotazioni</h4>';
					$query="SELECT car_utenti.id, car_utenti.nome, car_utenti.cognome, AVG(car_feedbacks.voto) AS votoMedio FROM car_utenti INNER JOIN car_prenotazioni ON car_utenti.id=car_prenotazioni.id_passeggero INNER JOIN car_feedbacks ON car_feedbacks.a=car_utenti.id WHERE car_prenotazioni.id_viaggio=".$nviaggio." GROUP BY car_utenti.id HAVING AVG(car_feedbacks.voto)>=".$votomin.";";
					//echo $query;
					
					$result = mysqli_query($mysqli, $query);
					
					if($result->num_rows > 0) {
						echo '<table class="table table-bordered"><thead><tr><th>ID</th><th>Nome</th><th>Cognome</th><th>Voto Medio</th></tr></thead><tbody>';
						while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							$id = $row['id'];
							$nome = $row['nome'];
							$cognome = $row['cognome'];
							$votoMedio = $row['votoMedio'];
							echo '<tr><td>'.$id.'</td><td>'.$nome.'</td><td>'.$cognome.'</td><td>'.$votoMedio.'</td></tr>';
						}
						echo '</tbody></table>';
					}
					else
						echo '<p><i>Non è stato trovata nessun prenotazione per il viaggio selezionato</i></p>';
						
						
					echo "<hr>";
					echo "<h5>Query effettuata</h5>";
					echo "<i><p>$query</p></i>";	
				}
						

			?>
			</div>
		</div>
		<footer class="container">
			<hr>
        <p>&copy; Franceso Bognini - I sorgenti sono disponibili su <a href="https://github.com/fbognini/2017-seconda-prova-informatica" target="_blank">GitHub</a></p>
		</footer>
	</div>
  </body>
</html>