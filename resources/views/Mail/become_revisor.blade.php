<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presto.it</title>
</head>
<body>
    <h1>Un utente ha richiesto di lavorare con noi.</h1>
    <h2>Ecco i suoi dati:</h2>
    <p>Nome: {{ $user->name }} </p>
    <p>Email: {{ $user->email }} </p>
    <p>Se vuoi accettarlo clicca qui:</p>
    <a href=" {{route('make.revisor', compact('user'))}} ">Rendi revisore</a>

</body>
</html>