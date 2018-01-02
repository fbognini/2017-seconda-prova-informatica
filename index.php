<!DOCTYPE html>
<html>
  <head>
    <title>Prova di maturità</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
    <!--link href='css/bootstrap.css' rel='stylesheet' type='text/css'-->
	<script>
		function updateStatus(status){
			document.getElementById("status").value = status;
			document.getElementById("form").submit();
		}
	</script>
  </head>
	<body>
	<div role="main">
        <div class="jumbotron">
			<div class="container">
				<h1 class="display-3">Prova di maturita' 2017</h1>
				<p>Terza prova di maturità - indirizzo informatica</p>
			</div>
        </div>
        <div class="container">
			<h4>Seleziona cosa vuoi fare</h4>
            <div class="row">
                <div class="col-md-4 col-12">
                    <h2>Viaggio</h2>
                    <p>Data una città di partenza, una di arrivo e una data, elencare gli autisti che propongono un viaggio
corrispondente con prenotazioni non ancora chiuse, in ordine crescente di orario, riportando i dati
dell’auto e il contributo economico richiesto</p>
					<a href="query1.php" class="btn btn-primary" role="button">Cerca un viaggio</a>

                </div>
                <div class="col-md-4 col-12">
                    <h2>Mail</h2>
                    <p>Dato il codice di una prenotazione accettata, estrarre i dati necessari per predisporre l’email di
promemoria da inviare all’utente passeggero</p>
					<a href="query2.php" class="btn btn-primary" role="button">Invia la mail</a>
                </div>
                <div class="col-md-4 col-12">
                    <h2>Prenotazione</h2>
                    <p>Dato un certo viaggio, consentire all’autista di valutare le caratteristiche dei passeggeri visualizzando l’elenco di coloro che lo hanno prenotato, con il voto medio dei feedback ricevuti da ciascun passeggero, presentando solo i passeggeri che hanno voto medio superiore ad un valore indicato dall’autista</p>
					<a href="query3.php" class="btn btn-primary" role="button">Controlla le prenotazioni</a>
                </div>
            </div>
        </div>
    </div>
    <footer class="container">
        <hr>
        <p>&copy; Franceso Bognini - I sorgenti sono disponibili su <a href="https://github.com/fbognini/2017-seconda-prova-informatica" target="_blank">GitHub</a></p>
    </footer>
	</body>
</html>