<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">

        <title>{{ config('app.name') }} | Business Clearance</title>

        <style>
            html,
            body {
                font-size: 18px;
                font-family: arial;
            }
            .text-center {
                text-align: center;
                margin-top: 15px;
            }
            .text {
                text-transform: uppercase; 
                font-weight: bold; 
                font-size:30px; 
                letter-spacing: 1px; 
                line-height:20px;
            }
            .span {
                font-size: 15px; 
                font-weight: normal; 
                letter-spacing: 0;
            }
            
        </style>
    </head>

    <body>
        <div>
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

            <div class="text-center">
                <h1 class="" style="letter-spacing: 10px; font-size: 25px;">
                    BUSINESS CLEARANCE
                </h1>
                <p class="span">This is to certify that</p>
                <div class="text-center">
                    <p class="text">
                        {{ $clearance->full_name}}<br />
                        <span class="span">NAME OF OWNER</span>
                    </p>
                </div>
                <div class="text-center">
                    <p class="text">
                        {{ $clearance->business_name }}<br />
                        <span class="span">NAME OF BUSINESS</span>
                    </p>
                </div>
                <div class="text-center">
                    <p style="font-size:15px;">STATUS: &nbsp; [ X ]NEW  &nbsp;[ X ]RENEWAL</p>
                </div>
                <div class="text-center">
                    <p class="text" style="line-height: 25px; width:80%; margin:auto">
                        {{ $clearance->business_address }}<br />
                        <span class="span" style="line-height: 0;">BUSINESS ADDRESS / OFFICE ADDRESS</span>
                    </p>
                </div>
                <div class="text-center">
                    <p class="text">
                        {{ $clearance->business_type}}<br />
                        <span class="span">TYPE OF BUSINESS</span>
                    </p>
                </div>
                <p style="text-align: center; font-size:15px; line-height:17px;">
                    Is presently operating within the jurisdiction of this Barangay.<br />
                    This certification is being issued under the requirement of the New Local Code under Republic <br />
                    Act 7160 Article IV, Section 152 paragraph C for the purpose of <br />
                    Securing or renewing Mayor's permit/license for the year {{ now()->year }} <br />
                    <br />
                    Given and signed this {{ now()->day}} day of {{ strtoupper(DateTime::createFromFormat('!m', now()->month)->format('F')) }} {{ now()->year }} at Barangay Pulong Buhangin, Santa Maria, Bulacan.
                    <br />
                    <br />
                    <br />
                    <br />
                    <span style="font-weight: bold;">Note: Any violation(s) or illegal act(s) commited by a business will be a cause for cancellation of this clearance.</span>
                </p>

                <div>
                    <div style="text-align: center; margin-top:100px;">
                        <p style="font-size:15px; font-weight:bold; text-transform:uppercase; text-align:right; margin-right:100px">{{ strtoupper($captain->name ?? 'Juan Dela Cruz') }}</p>
                        <p style="text-transform: capitalize; font-size:12px; text-align:right; font-weight:normal; margin-right:150px;">Punong Barangay</p>
                    </div>
                </div>

                <div>
                    <div style="text-align: center;">
                        <p style="font-size:12px; text-align:left; font-weight:normal; margin-left:100px; margin-bottom:50px;">Attested by:</p>
                        <p style="font-size:15px; font-weight:bold; text-transform:uppercase; text-align:left; margin-left:100px">{{ strtoupper($secretary->name ?? 'Juana Dela Cruz') }}</p>
                        <p style="text-transform: capitalize; font-size:12px; text-align:left; font-weight:normal; margin-left:125px;">Barangay Secretary</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>