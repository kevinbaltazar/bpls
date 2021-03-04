<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Reset Password</title>
</head>
<body>
        <form class="" method="POST">
            @csrf
            <div class="w-64 mx-auto">
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="password">{{ __('Password') }}</label>
            
                    <div>
                        <input class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" id="password" type="password" class="@error('password') is-invalid @enderror"
                               name="password" autocomplete="new-password">
                    </div>
                </div>
                {{-- <input type="hidden" name="email" value="{{ $user->email }}"/> --}}
                <div class="mt-3">
                    <label class="block text-sm font-medium text-gray-700" for="password-confirm">{{ __('Confirm Password') }}</label>
            
                    <div>
                        <input class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" id="password-confirm" type="password" name="password_confirmation"
                               autocomplete="new-password">
                    </div>
                </div>
            
                @error('password')
                <span class="text-red-600 text-xs text-left">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    
            
            
                <div class="mt-5">
                    <button type="submit" class="w-full  text-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Save password') }}
                      </button>
                </div>
            </div>
        </form>

</body>
</html>


