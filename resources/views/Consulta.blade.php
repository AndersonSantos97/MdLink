<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta</title>
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
        Seccion para Consultar Registros de Entrada y Salida, Tambien puede descargar el resgistro consultado        </p>
        
        
      </div>
      

      <div class="p-8 bg-white shadow-lg rounded-lg w-full max-w-4xl">

        <div class="mb-4">
          <label for="role" class="block text-sm font-medium text-gray-700">Dispositivo</label>
          <select id="role" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option value="" disabled selected>Selecciona un Dispositivo</option>
            <option value="moderator">Dispositivo1</option>
            <option value="moderator">Dispositivo2</option>
          </select>
        </div>

        <form id="punchForm" action="{{ route('punch.search')}}" method="GET">
          @csrf
          <div class="flex justify-between mb-4">
            <div class="flex items-center space-x-2">
              <label for="from-date" class="block text-sm font-medium text-gray-700">De</label>
              <input type="date" id="from-date" name="from_date" value="2024-01-05" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="flex items-center space-x-2">
              <label for="to-date" class="block text-sm font-medium text-gray-700">A</label>
              <input type="date" id="to-date" name="to_date" value="2024-01-31" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <button type="button" onclick="submitForm('search')" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
              Consultar
            </button>
            <button type="button" onclick="download('download')" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
              Descargar
            </button>
          </div>
        </form>

        <form id="logoutForm" action="{{ route('user.logout')}}" method="POST">
          @csrf
          <button type="submit"  class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium duration-200 bg-gray-100 md:w-auto rounded-xl hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-label="Secondary action">
            Salir
          </button>
        </form>


        <div class="text-center">
          <table class="min-w-full bg-white border border-gray-300">
            <thead>
              <tr>
                <th class="px-4 py-2 border-b border-gray-300">ID</th>
                <th class="px-4 py-2 border-b border-gray-300">Nombre de Empleado</th>
                <th class="px-4 py-2 border-b border-gray-300">Fecha y Hora de Registro</th>
                <th class="px-4 py-2 border-b border-gray-300">Estado</th>
                <th class="px-4 py-2 border-b border-gray-300">Lider de Equipo</th>
              </tr>
            </thead>
            <tbody>
              @if (isset($punches) && count($punches)>0)
                @foreach ($punches as $punch)
                  <tr>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $punch->id}}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $punch->emp_nombre}}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $punch->fecha}} {{ $punch->hora}}</td>
                    <td class="px-4 py-2 border-b border-gray-300">Ingreso</td>
                    <td class="px-4 py-2 border-b border-gray-300">Adan Perez</td>
                  </tr>
                @endforeach

              @else
                <tr>
                  <td colspan="5" class="px-4 py-2 border-b border-gray-300 text-center">No hay registros para mostrar</td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
    
        </div>
    </div>

   
    
  </section>

  <script>
    function submitForm(action){
      const form = document.getElementById('punchForm');
      const methodField = document.getElementById('method');
      if(action == 'search'){
        form.action = '{{ route("punch.search")}}';
        form.method = 'GET';
      }
      form.submit();
    }

    function logOut(action){
      const form = document.getElementById('punchForm');
      const methodField = document.getElementById('method');

      if(action === 'logout'){
        form.action = "{{ route('user.logout')}}";
        methodField.value = 'POST';
      }

      form.submit();
    }
  </script>
  
    
</body>
</html>
