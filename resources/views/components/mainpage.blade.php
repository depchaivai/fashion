<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <x-Nav/>
        <div class="flex justify-center w-full">
            {{$slot}}
        </div>
                
        <x-footer/>
        
    </body>
    {{ $myjs ?? '' }}
    <script>
        const person = document.querySelector('#person');
        const cart = document.querySelector('#cart');
        const loginpopup = document.querySelector('#loginpopup');
        const loginBtn = document.querySelector('#loginBtn');
        const closeBtn = document.querySelector('#closeBtn');
        const resBtn = document.querySelector('#resBtn');
        const titlePopup = document.querySelector('#titlePopup');
        const resForm = document.querySelector('#resForm');
        const changeToRes = document.querySelector('#changeToRes');
        const changeToLogin = document.querySelector('#changeToLogin');
        const closeCart = document.querySelector('#closeCart');
        const cartPopup = document.querySelector('#cartPopup');
        cart.addEventListener('click',()=>{
            cartPopup.classList.add('flex');
            cartPopup.classList.remove('hidden');
        })
        closeCart.addEventListener('click',()=>{
            cartPopup.classList.remove('flex');
            cartPopup.classList.add('hidden');
        })
        changeToRes.addEventListener('click',()=>{
            loginBtn.classList.add('hidden');
            resBtn.classList.remove('hidden');
            resForm.classList.remove('hidden');
            titlePopup.innerHTML = 'đăng ký';
            changeToLogin.classList.remove('hidden');
            changeToRes.classList.add('hidden');
        })
        changeToLogin.addEventListener('click',()=>{
            resBtn.classList.add('hidden');
            loginBtn.classList.remove('hidden');
            resForm.classList.add('hidden');
            titlePopup.innerHTML = 'đăng nhập';
            changeToLogin.classList.add('hidden');
            changeToRes.classList.remove('hidden');
        })
        closeBtn.addEventListener('click',()=>{
            loginpopup.classList.add('hidden');
        })

        person.addEventListener('click',()=>{
            if (loginpopup.classList.contains('hidden')) {
                loginpopup.classList.remove('hidden');
                loginpopup.classList.add('flex');
            }else{
                loginpopup.classList.remove('flex');
                loginpopup.classList.add('hidden');
            }
        })
    </script>
    <script src="https://unpkg.com/flowbite@1.4.2/dist/flowbite.js"></script>
    <script src="https://kit.fontawesome.com/dab4d8d77a.js" crossorigin="anonymous"></script>
</html>