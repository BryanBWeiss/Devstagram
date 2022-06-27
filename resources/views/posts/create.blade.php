@extends('layout.app')

@section('titulo')
Crear Nueva Publicacion
@endsection

@section('contenido')
<div class="md:flex md:items-center">
      <div class="md:w-1/2 px-10">
        <form action="/Imagenes" id="dropzone" class=" bg-gray-300 dropzone border-dashed
        border-2 w-full h-96 rounded flex flex-col justify-center items-center">
        </form>
        

      </div>

         <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action="{{ route('register') }}" method="POST">
                @csrf
    <div class="mb-5">
            <label for="titulo" class="mb-2   block uppercase text-gray-400 font-bold">
             Titulo
            </label>
              <input id="titulo" name="titulo" type="text" placeholder="Titulo de la publicacion"
                class="border p-3 w-full rounded-lg  @error('titulo') border-red-500 @enderror"
                value="{{ old('titulo') }}" />
              @error('titulo')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
           {{ $message }}
            </p>
          @enderror
      </div>

      <div class="mb-5">
        <label for="descripcion" class="mb-2   block uppercase text-gray-400 font-bold">
         Descripcion
        </label>
          <textarea id="descripcion" name="descripcion" type="text" placeholder="Descripcion de la publicacion"
            class="border p-3 w-full rounded-lg  @error('descripcion') border-red-500 @enderror"
            value="{{ old('descripcion') }}"></textarea>
          @error('descripcion')
        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
       {{ $message }}
        </p>
      @enderror
  </div>
  <input type="submit" value="Crear Publicacion"
  class="bg-sky-600 hover:bg-sky-
  transition-colors cursor-pointer uppercase  
  font-bold w-full p-3 text-white rounded-lg text-center" />


            </form>
         </div>
      </div>
</div>

@endsection