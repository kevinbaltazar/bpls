<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <title>{{ config('app.name') }} | Business Clearance</title>

        <style>
            html,
            body {
                padding: 0;
                margin:0;
                font-size: 18px;
                font-family: arial;
            }
            .text-center {
                text-align: center;
                margin-top: 15px;
            }
            .text-center .text {
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
        
           
            .text-center-clearance {
                text-align: center;
            }
            .text-right {
                text-align: right;
            }
            .font-bold {
                font-weight: bold;
            }
            .leading-none {
                line-height: 0;
            }
            .information-table {
                margin: 0 30px; 
                width: 100%;
            }
            .information-table tr {
                vertical-align: top;
            }
            .information-table .label {
                font-weight: bold; 
                font-size: 20px; 
                width: 25%;
            }
            .information-table .value {
                font-weight: bold; 
                font-size: 28px;
                text-transform: uppercase;
            }
            .official-info {
                width: 100%; 
                position: relative; 
                margin-top: 40px; 
            }
            .official-info.captain {
                height: 70px;
            }
            .official-info.secretary {
                height: 70px;
                margin-left: 30px;
            }
            .official-info .text {
                text-align: center;
                line-height: 0;
                position: absolute;
            }
            .official-info .text.text-right {
                right: 80px;    
            }
            .official-info .text .name {
                font-size: 20px;
                font-weight: bold;
            }
            .official-info .text .position {
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
                <h1 class="" style="letter-spacing: 10px; font-size: 40px;">
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
                    <p style="font-size:15px;">STATUS: &nbsp; [ @if($clearance->clearance_id === NULL) X @endif ]NEW  &nbsp;[ @if($clearance->clearance_id !== NULL) X @endif  ]RENEWAL</p>
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
                <p style="text-align: center; line-height:20px;">
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
                    <div style="text-align: center; margin-top: 100px; line-height:0">
                        <p style="font-weight:bold; text-transform:uppercase; text-align:right; margin-right:100px">{{ strtoupper($captain->name ?? 'Juan Dela Cruz') }}</p>
                        <p style="text-transform: capitalize; font-size:15px; text-align:right; font-weight:normal; margin-right:125px;">Barangay Captain</p>
                    </div>
                    <div style="text-align: center; line-height:0">
                        <p style="text-align:left; font-weight:normal; margin-left:100px; margin-bottom:100px;">Attested by:</p>
                        <p style="font-weight:bold; text-transform:uppercase; text-align:left; margin-left:100px">{{ strtoupper($secretary->name ?? 'Juana Dela Cruz') }}</p>
                        <p style="text-transform: capitalize; font-size:15px; text-align:left; font-weight:normal; margin-left:125px;">Barangay Secretary</p>
                    </div>
                </div>
            </div>
        </div>



        <div style="margin-top:250px;">
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

            <div style="padding-bottom: 10px;">
                <p class="text-right font-bold">CTRL. No: {{ $clearance->control_number }}</p>
            </div>

            <div class="text-center-clearance">
                <h1 style="font-size: 40px; font-weight: bold; letter-spacing: 10px; line-height: 0;">
                    CERTIFICATION
                </h1>

                <p style="font-size: 32px;">(Business)</p>
            </div>

            <p style="font-weight: bold; margin-left: 30px;">TO WHOM IT MAY CONCERN:</p>
            <p>
                <span style="margin-left: 30px;">This is to certify that the person whose name, signature and other personal data appearing hereon, has</span> 
                requested for a Business certification from this Office for their tenants. See attached list;
            </p>

            <div style="margin-top: 30px;">
                <table class="information-table">
                    <tbody>
                        <tr>
                            <td class="label">NAME: </td>
                            <td class="value">{{ $clearance->full_name }}</td>
                        </tr>

                        <tr>
                            <td class="label">ADDRESS: </td>
                            <td class="value">{{ $clearance->personal_address }}</td>
                        </tr>

                        <tr>
                            <td class="label">DATE OF BIRTH: </td>
                            <td class="value">
                                {{ \Carbon\Carbon::parse($clearance->birthdate)->toFormattedDateString() }}
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="label">PLACE OF BIRTH: </td>
                            <td class="value">{{ $clearance->birthplace }}</td>
                        </tr>

                        <tr>
                            <td class="label">BUSINESS NAME: </td>
                            <td class="value">{{ $clearance->business_name }}</td>
                        </tr>

                        <tr>
                            <td class="label">ADDRESS OF BUS.: </td>
                            <td class="value">{{ $clearance->business_address }}</td>
                        </tr>
                    </tbody>
                </table>

                <p style="margin-top: 40px; text-align: center">
                    This certification is issued upon request of the same person to be used for Business Clearance application.
                </p>

                <div class="official-info captain">
                    <div class="text text-right" style="margin-top: 50px">
                        <p class="name">{{ strtoupper($captain->name ?? 'Juan Dela Cruz') }}</p>
                        <p class="position" style="font-size:15px">Punong Barangay</p>
                    </div>
                </div>

                <div class="official-info secretary">
                    <p style="margin-bottom: 50px">Attested by:</p>

                    <div class="text">
                        <p class="name">{{ strtoupper($secretary->name ?? 'Juana Dela Cruz') }}</p>
                        <p class="position" style="font-size:15px;">Barangay Secretary</p>
                    </div>
                </div>

                <div style="font-size: 16px; width: 100%; position: relative; height: 320px;">
                    <div style="position: absolute; right: 30px;">
                        <div style="line-height: 5px;">
                            <p style="text-align: center; font-weight: bold; text-transform: uppercase; text-decoration: underline;">
                                {{ $clearance->full_name }}
                            </p>

                            <p>SIGNATURE OVER PRINTED NAME</p>
                        </div>

                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 50%;">CTC NO:</td>
                                    <td style="width: 50%;"> {{$clearance->cedula_number ?? '---'}}</td>
                                </tr>

                                <tr>
                                    <td style="width: 50%;">ISSUED AT:</td>
                                    <td style="width: 50%;">Pulong Buhangin</td>
                                </tr>

                                <tr>
                                    <td style="width: 50%;">ISSUED ON:</td>
                                    <td style="width: 50%;">
                                        {{ now()->toFormattedDateString() }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 50%;">OR NO:</td>
                                    <td style="width: 50%;">
                                        {{ $formData['order_number'] ?? '---' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 50%;">Amount:</td>
                                    <td style="width: 50%;">
                                        {{ isset($formData['amount']) ? 'Php ' . number_format($formData['amount'], 2) : '---' }}
                                    </td>
                                </tr>

                                <tr>
                                    <td style="width: 60%;">STICKER/PLATE:</td>
                                    <td style="width: 40%;">
                                        {{ $formData['sticker_number'] ?? '---' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>