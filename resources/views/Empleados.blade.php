<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Empleados</title>
  <link rel="icon" href="ManageUsers.png" type="">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body >

  <section>

    <div class="px-8 py-24 mx-auto md:px-12 lg:px-32 max-w-7xl">
      <div class="text-center">
        <h1 class="text-4xl font-semibold tracking-tighter text-gray-900 lg:text-5xl text-balance">
          Bienvenido al Proyecto de Enlace Biometrico,
          <span class="text-gray-600">Haciendo las Consultas mas facil y seguras</span>
        </h1>
        <p class="w-1/2 mx-auto mb-4 mt-4 text-base font-medium text-gray-500 text-balance">
         Seccion para Agregar , Modificar y eliminar Empleados
      </div>
      
      

      <div class="mb-2 flex space-x-4">
        <div class="mb-4 w-1/2">
          <label for="role" class="block text-sm font-medium text-gray-700">Dispositivo</label>
          <select id="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="" disabled selected>Selecciona un Dispositivo</option>
            <option value="moderator">Dispositivo1</option>
            <option value="moderator">Dispositivo2</option>
          </select>
        </div>
        <div class="mb-4 w-1/2">
          <label for="role" class="block text-sm font-medium text-gray-700">Lider de Equipo</label>
          <select id="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="" disabled selected>Selecciona un Lider de Equipo</option>
            <option value="moderator">Adan Perez</option>
            <option value="moderator">Nahum Romero</option>
          </select>
        </div>
      </div>


      <div class="mb-4 flex space-x-4">
        <div class="w-1/2">
          <label for="device-name" class="block text-sm font-medium text-gray-700">Nombre de Empleado</label>
          <input type="text" id="device-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="w-1/2">
          <label for="device-name" class="block text-sm font-medium text-gray-700">DNI</label>
          <input type="text" id="device-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      
        </div>
      </div>
      <div class="mb-4 flex space-x-4">
        <div class="w-1/2">
          <label for="role" class="block text-sm font-medium text-gray-700">Horario</label>
      <select id="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <option value="" disabled selected>Asignacion de Horario</option>
        @foreach($horarios as $horario)
            <option value="{{ $horario->id }}">{{ $horario->name }}</option>
        @endforeach
      </select>
 </div>
        <div class="w-1/2">
          <label for="role" class="block text-sm font-medium text-gray-700">Estado</label>
      <select id="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <option value="" disabled selected>Estado de Empleado</option>
        <option value="admin">Activo</option>
        <option value="moderator">Inactivo</option>
       
      </select>
        </div>
      </div>

      <div class="mb-4 flex space-x-4">
        <div class="w-1/2">
          <label for="device-name" class="block text-sm font-medium text-gray-700">Codigo de Tarjeta</label>
          <input type="text" id="device-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="w-1/2">
          <label for="device-name" class="block text-sm font-medium text-gray-700">Departamento</label>
          <input type="text" id="device-name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      
        </div>
      </div>

  
      
      
                          

       
      
        <div class="flex justify-between mb-4">
          
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Buscar
          </button>
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Guardar
          </button>
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Modificar
          </button>
          <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Eliminar
          </button>
            <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Regresar
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
                <th class="px-4 py-2 border-b border-gray-300">Nombre De Empleado</th>
                <th class="px-4 py-2 border-b border-gray-300">DNI</th>
                <th class="px-4 py-2 border-b border-gray-300">Codigo de Tarjeta</th>
                <th class="px-4 py-2 border-b border-gray-300">Horario</th>
                <th class="px-4 py-2 border-b border-gray-300">departamento</th>
                <th class="px-4 py-2 border-b border-gray-300">Titulo</th>
                <th class="px-4 py-2 border-b border-gray-300">Lider de Equipo</th>
                <th class="px-4 py-2 border-b border-gray-300">Estado de Empleado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="px-4 py-2 border-b border-gray-300">01</td>
                <td class="px-4 py-2 border-b border-gray-300">Lizandro Rio</td>
                <td class="px-4 py-2 border-b border-gray-300">0501-1990-05223</td>
                <td class="px-4 py-2 border-b border-gray-300">5042663555</td>
                <td class="px-4 py-2 border-b border-gray-300">A (6:00 am - 4:00 pm)</td>
                <td class="px-4 py-2 border-b border-gray-300">Produccion</td>
                <td class="px-4 py-2 border-b border-gray-300">Operador</td>
                <td class="px-4 py-2 border-b border-gray-300">Nahum Romero</td>
                <td class="px-4 py-2 border-b border-gray-300">Activo</td>
                
              </tr>
              <tr>
                <td class="px-4 py-2 border-b border-gray-300">02</td>
                <td class="px-4 py-2 border-b border-gray-300">Justo Perez</td>
                <td class="px-4 py-2 border-b border-gray-300">0501-1980-05223</td>
                <td class="px-4 py-2 border-b border-gray-300">5042663555</td>
                <td class="px-4 py-2 border-b border-gray-300">A (6:00 am - 4:00 pm)</td>
                <td class="px-4 py-2 border-b border-gray-300">Produccion</td>
                <td class="px-4 py-2 border-b border-gray-300">Ayudante</td>
                <td class="px-4 py-2 border-b border-gray-300">Adan Perez</td>
                <td class="px-4 py-2 border-b border-gray-300">Activo</td>
                
              </tr>
            </tbody>
          </table>
        </div>
    
        </div>
    </div>

   
    
  </section>


  
  

</body>
</html>
