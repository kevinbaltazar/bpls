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
                font-family: arial;
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

            .summarize {
                font-size: 20px;

            }
    </style>
</head>
<body>
    <table style="width: 100%; border-spacing: 20px; border-collapse: separate;">
        <tbody>
            <tr style="height: 100px;">
                <td style="width: 20%;">
                    <img src="{{ asset('png/pulo-logo.png') }}" style="width: 150px; height: auto;" />
                </td>

                <td style="width: 60%;">
                    <h4 style="text-align: center; font-size: 16px; line-height: 22px;">
                        REPUBLIC OF THE PHILIPPINES <br /> 
                        PROVINCE OF BULACAN <br /> 
                        MUNICIPALITY OF SANTA MARIA <br /> 
                        BARANGAY PULONG BUHANGIN <br /> 
                        OFFICE OF THE PUNONG BARANGAY
                    </h4>
                </td>

                <td class="text-right" style="width: 20%;">
                    <img src="{{ asset('png/pulo-logo-2.png') }}" style="width: 150px; height: auto;" />
                </td>
            </tr>
        </tbody>
    </table>

    <div style="text-align:center;">
        <h1 class="" style="letter-spacing: 10px; font-size: 40px;">
           SUMMARY OF  REPORTS
        </h1>
        <div class="summarize">
            <p><strong>{{ \Carbon\Carbon::parse($date_from)->format('F-j-Y') }}</strong> to <strong>{{ \Carbon\Carbon::parse($date_to)->format('F-j-Y') }}</strong></p>
        </div>   
    </div>
    
    <table class="reports" style="width: 100%">
        <tr>
            <th>Cedula Number</th>
            <th>Sticker Number</th>
            <th>Business Name</th>
            <th>Business Address</th>
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
                {{$report->business_address}}
            </td>
            <td>
                {{$report->first_name . ' ' . $report->middle_name . ' ' . $report->last_name }}
            </td>
            <td>
                {{$report->business_type}}
            </td>
            <td>
                {{$report->amount}}
            </td>
            <td>
                {{\Carbon\Carbon::parse($report->created_at)->format('F-j-Y')}}
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <p>Total Released Documents:{{$count}} </p>
        <p>Total Amount: {{$sum}} </p>
    </div>
   
    <div class="signatory">
        <p>Approved by:</p>
        <p><strong>{{$captain->name ?? 'N/A'}}</strong></p>
    </div>
</body>
</html>