<!DOCTYPE html>

<head>
</head>

<body>
    <table>
        @foreach ($events as $e)
        <tr>
            <td>{{ $e->hour }}</td>
            <td>{{ $e->datetime }}</td>
            <td>{{ $e->value }}</td>
            <td>{{ $e->count }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>