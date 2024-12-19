<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>
<body>
    <div>
        <h1>Un utente ha chiesto di lavorare con noi</h1>
        <h2>I suoi dati:</h2>
        <p>{{$user->name}}</p>
        <p>{{$user->email}}</p>
        <p>Se vuoi renderlo revisore clicca qui</p>
        <a href="{{route('make.revisor', compact('user'))}}">Rendi Revisore</a>

    </div>
    
</body>
</html>