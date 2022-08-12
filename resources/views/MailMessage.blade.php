<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <h1> {{ $data['title'] }}</h1>
        <h2> {{ $data['message'] }} {{ $data['demandeOwner']->name }}</h2>
        <p>Email : {{ $data['demandeOwner']->email }} </p>
        <p>Job : {{ $data['demandeOwner']->job }} </p>
        <p>adress : {{ $data['demandeOwner']->country }},{{ $data['demandeOwner']->city }}</p>
        <p>for more informations visite <a href="http://127.0.0.1:8000/profile/{{ $data['demandeOwner']->id }}"> profile
            </a> </p>
    </body>

</html>
