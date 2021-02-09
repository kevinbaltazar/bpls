<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="border: 1px">
        <th>
            cedula number
        </th>
        <th>
            name
        </th>
        <th>
            business name
        </th>
        @foreach ($reports as $report)
        <tr>
            <td>
                {{$report->}}
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>