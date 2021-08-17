<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>List:</div>
<ul>
    @for($i = 1; $i <= 6; $i++)
        <li>
            <a href="{{ route('posts.show', ['post' => $i]) }}">post {{ $i }}</a> |
            <a href="{{ route('posts.edit', ['post' => $i]) }}">EDIT</a> |
            <form action="{{ route('posts.destroy', ['post' => $i]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button>
            </form>
        </li>
    @endfor
</ul>

</body>
</html>
