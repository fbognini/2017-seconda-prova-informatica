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
		<!--div class="card header">
			<h2>CARPOOLING - Prova maturita' informatica 2017</h2>
		</div-->

		<div class="row">
			<div class="col-12 col-md-3">
				<form method="POST" name="form" id="form">
					<h4>Cerca viaggio</h4>
					<input type="text" name="partenza" class="form-control" value="<? echo $_POST["partenza"] ?>" placeholder="Partenza" required autofocus>
					<input type="text" name="destinazione" class="form-control" value="<? echo $_POST["destinazione"] ?>" placeholder="Destinazione" required>
					<input type="date" name="data" class="form-control" value="<? echo $_POST["data"] ?>" required>
					<button type="submit" class="btn btn-primary btn-lg btn-block">CERCA IL VIAGGIO</button>
				</form>
			</div>
			<div class="col-12 col-md-9">
			<?
			echo '<h3>Viaggi disponibili</h3>';
			echo '<p>Le città di partenza destinazione sono BERGAMO, FIRENZE, LECCE, LECCO, MILANO, ROMA, TORINO e VENEZIA</p>';
			echo '<p>I viaggi sono disponibili dal 01/01/2018 al 31/01/2018</p>';
			if(empty($_POST["partenza"]))
				echo '<p>Indicare la città di partenza e destinazione</p>';
			else {
				$partenza = strtoupper($_POST["partenza"]);
				$destinazione = strtoupper($_POST["destinazione"]);
				$data = $_POST["data"];
				// $data = date('d M Y', strtotime($_POST["data"]));
				// $fine_prenotazione = date('Y-m-d');
				$fine_prenotazione = '2017-31-12';
				echo '<p><b>Viaggi da '.$partenza.' a '.$destinazione.' il giorno '.$data.'</b></p>';	
				$query = 'SELECT * FROM car_utenti INNER JOIN car_viaggi ON car_utenti.id=car_viaggi.id_autista WHERE partenza="'.$partenza.'" AND destinazione="'.$destinazione.'" AND data="'.$data.'" AND chiusura_prenotazione>="'.$fine_prenotazione.'" ORDER BY ora;';
				// echo $query;
				$result = mysqli_query($mysqli, $query);
				if($result->num_rows > 0) {
					echo '<table class="table table-bordered"><thead><tr><th colspan="2">Autista</th><th colspan="2">Auto</th><th colspan="3">Viaggio</th></tr><tr><th>Nome</th><th>Cognome</th><th>Modello</th><th>Targa</th><th>Costo</th><th>Ora</th><th>Durata</th></tr></thead><tbody>';
					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						$nome = $row['nome'];
						$cognome = $row['cognome'];
						$modello = $row['modello_auto'];
						$targa = $row['targa_auto'];
						$importo = $row['importo'];
						$ora = $row['ora'];
						$durata = $row['durata'];
						echo '<tr><td>'.$nome.'</td><td>'.$cognome.'</td><td>'.$modello.'</td><td>'.$targa.'</td><td>€ '.$importo.'</td><td>'.$ora.'</td><td>'.$durata.'</td></tr>';
					}
					echo '</tbody></table>';
				}
				else
					echo '<p><i>Non è stato trovato nessun viaggio disponibile</i></p>';
					
				
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