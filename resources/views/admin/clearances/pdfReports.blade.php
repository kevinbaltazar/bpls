<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>
    <style>
        html,
            body {
                padding: 0;
                margin:0;
            }

            .reports {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            .reports th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
            }

            .reports td, .reports th {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: center;
            }

            .summary {
                display: flex;
                justify-content: space-between;
                font-size: 20px;
            }
            .signatory {
                float: right;
                font-size: 20px;
                margin-right: 100px;
                margin-top: 50px;
            }
    </style>
</head>
<body>
    
    <table class="reports" style="width: 100%">
        <tr>
            <th>Cedula Number</th>
            <th>Sticker Number</th>
            <th>Business Name</th>
            <th>Owner's Name</th>
            <th>Type</th>
            <th>Cost</th>
            <th>Date</th>
        </tr>
        @foreach ($reports as $report)
        <tr>
            <td>
                {{$report->cedula_number}}
            </td>
            <td>
                {{$report->sticker_number}}
            </td>
            <td>
                {{$report->business_name}}
            </td>
            <td>
                {{$report->first_name . ' ' . $report->middle_name ?? '--' . ' '. $report->last_name }}
            </td>
            <td>
                {{$report->business_type}}
            </td>
            <td>
                {{$report->amount}}
            </td>
            <td>
                {{date('d-m-Y', strtotime($report->created_at))}}
            </td>
        </tr>
        @endforeach
    </table>
    <div class="summary">
        <p>Filter to {{date('d-m-Y', strtotime($date_from))}} from {{date('d-m-Y', strtotime($date_to))}}</p>
        <p>Total Released Documents: <strong>{{$count}}</strong> </p>
        <p>Total Amount: <strong>{{$sum}}</strong> </p>
    </div>
    <div class="signatory">
        <p>Approved by:</p>
        <p><strong>{{$captain->name}}</strong></p>
    </div>
</body>
</html>