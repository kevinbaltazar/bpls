<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Apply</title>

        <style>
            input::-webkit-inner-spin-button,
            input::-webkit-outer-spin-button{
                -webkit-appearance: none;
                margin: 0;
            }
            input[type=number]{
                -moz-appearance: textfield;
            }

        </style>
    </head>
    <body>
       @yield('application')
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        function checkType(val)
        {
            var element = document.getElementById('type');
            if(val == 'others') 
            {
                element.style.display='block';
            }
            else  
            {
                element.style.display='none';
                
            }
            element.value = val;
            if(element.value == 'others')
            {
                element.value = '';
            }
        }
        
    </script>
</html>
