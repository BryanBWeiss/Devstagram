<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram - @yield('titulo')</title>
        <link href="{{ asset('css/app.css')}}" rel="stylesheet">
        <script src="{{ asset('js/app.js')}}" defer></script>
        </head>
         <body class=" bg-gray-200">
          
            <header class="p-5 border-b bg-white shadow ">
               <div class="container mx-auto flex justify-between items-center">
               <h1 class="text-2xl font-black">
                Devstagram
            
               </h1>
                
                  @auth
                  <nav class="flex gap-2 items-center">
                    <a class="font-bold  text-gray-600 text-sm"href="#">
                      Hola: <span class="font-normal"> {{ auth()->user()->username}}</a>
                            </span>
                            <form method="POST" action="{{route('logout')}}">
                              @csrf
                            <button type="submin" class="font-bold uppercase
                             text-gray-600 text-sm" >Cerrar Session</button>
                            </form>
                            </nav> 
                  @endauth

                  @guest
                  <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm"href="{{'login'}}">Login</a>
                    <a href="{{ route('register') }}" class="font-bold uppercase
                     text-gray-600 text-sm" >Crear Cuenta</a>
                </nav> 
                  @endguest




            </div>  
            </header>   
       
          <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb10 mb-3"> 
              {{-- se agrego mb-3 --}}
                @yield('titulo')
            </h2>
                @yield('contenido')

          </main>
          <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            DevStagram - Todos los derechos Reservados {{now()->year}}
          </footer>

        </body>
    </head>    