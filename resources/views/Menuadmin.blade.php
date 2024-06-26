<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>MenuAdmin</title>
</head>
<body>
    
    <section>
        <div class="px-8 py-24 mx-auto md:px-12 lg:px-32 max-w-7xl">
          <div class="text-center">
            <h1 class="text-4xl font-semibold tracking-tighter text-gray-900 lg:text-5xl text-balance">
              Bienvenido al Proyecto de Enlace Biometrico, 
              <span class="text-gray-600">Haciendo las Consultas mas facil y seguras</span>

            </h1>
            <p class="w-1/2 mx-auto mt-4 text-base font-medium text-gray-500 text-balance">
             Seccion para agregar dispositivos biometricos, agregar usuarios en modo moderador o modo visor y tambien poder agregar empleados
            </p>
            <div class="flex flex-col items-center justify-center gap-2 mx-auto mt-8 md:flex-row">
              <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
                Agregar Dispositivo
              </button>
              <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
                <a href="{{ route('user.view')}}">Agregar Usuario</a>
              </button>
              
              <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
                Agregar Empleado
              </button>
              <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
                Consultar
              </button>

              <form action="{{ route('user.logout')}}" method="post">
                @csrf
                <button type="submit"
                class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium duration-200 bg-gray-100 md:w-auto rounded-xl hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-label="Secondary action">
                  Salir
                </button>
              </form>
            </div>
            
          </div>
        </div>
        
      </section>
      
</body>
</html>