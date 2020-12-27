<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List</title>

    <h1>Jokes</h1>
    @if($jokes)
        <ul>
            @foreach($jokes as $joke)
                <li>{{ $joke }}</li>
            @endforeach
        </ul>
    @else
        <h4>There have been an error, please try again.</h4>
    @endif
    <a href="/">Back</a>
</head>
<body>

</body>
</html>
