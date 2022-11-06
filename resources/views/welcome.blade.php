<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>test</title>

    </head>
    <body>
        <table border="2">
            <tr>
                <th>名前</th>
                <th>年齢</th>
                <th>性別</th>
            </tr>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name_kana }}</td>
                    <td>{{ $employee->age }}</td>
                    <td>{{ $employee->gender }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
