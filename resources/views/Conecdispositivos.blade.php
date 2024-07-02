<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conexion a Dispositivos</title>
   <link rel="icon" href="ManageUsers.png" type="">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
         Seccion para poder agregar y eliminar Dispositivos        
        
      </div>

                          

      <div class="p-8 bg-white shadow-lg rounded-lg w-full max-w-7xl">

        <div class="mb-4">
          <label for="device-name" class="block text-sm font-medium text-gray-700">Nombre de Dispositivo</label>
          <input type="text" id="device-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
          <label for="ip-address" class="block text-sm font-medium text-gray-700">Dirección IP</label>
          <input type="text" id="ip-address" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
          <label for="port" class="block text-sm font-medium text-gray-700">Puerto</label>
          <input type="text" id="port" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      
        <div class="flex justify-between mb-4">
          
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Agregar
          </button>
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Eliminar
          </button>
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium duration-200 bg-gray-100 md:w-auto rounded-xl hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-label="Secondary action">
            Salir
          </button>
    
        </div>
        <div class="text-center">
          <table class="min-w-full bg-white border border-gray-300">
            <thead>
              <tr>
                <th class="px-4 py-2 border-b border-gray-300">ID</th>
                <th class="px-4 py-2 border-b border-gray-300">Nombre Dispositivo</th>
                <th class="px-4 py-2 border-b border-gray-300">Direccion IP</th>
                <th class="px-4 py-2 border-b border-gray-300">Puerto</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 py-2 border-b border-gray-300">01</td>
                <td class="px-4 py-2 border-b border-gray-300">Depto 6</td>
                <td class="px-4 py-2 border-b border-gray-300">192.168.1.5</td>
                <td class="px-4 py-2 border-b border-gray-300">473</td>
              </tr>
            </tbody>
          </table>
        </div>
    
        </div>
    </div>

   
    
  </section>


  
    
</body>
</html>
