<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset ('assets/css/register/style.css')}}">
    <title>Evento | register</title>
</head>

<body>



    <div class="formulair">

        <div class="top">
        </div>


        <div class="bottom">
            <form action="{{ route('register')}}" method="POST">
                @csrf

                <div class="name">
                    
                <x-text-input id="email" class="block mt-1 w-full" type="name" name="name" placeholder="User Name" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="email">
                    
                    <input type="email" name="email" placeholder="User Email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>


                <div class="password">
                 
                    <input type="password" name="password" placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="reset-password">
                   
                    <input type="password" name="password_confirmation" placeholder="Confirm Password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                    <button type="submit">Register</button>
                    <a href="{{ route('login')}}">Already Have an Account !!</a>

            </form>
        </div>

    </div>



</body>

</html>