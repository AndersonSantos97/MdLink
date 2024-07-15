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

      <form id ="empleadoForm" action="{{ route('Empleados.guardar')}}" method="POST">
        @csrf
        <!-- Campo oculto para el método -->
        <input type="hidden" name="_method" id="method" value="POST">
        <!-- Campo oculto para el ID del dispositivo -->
        <input type="hidden" name="FEMP_ID" id="FEMP_ID">
        <div class="mb-4 flex space-x-4">

            
                <div class="w-1/2">
                  <label for="FEMP_NOMBRE" class="block text-sm font-medium text-gray-700">Nombre de Empleado</label>
                  <input type="text" id="FEMP_NOMBRE" name="FEMP_NOMBRE" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>

        <div class="mb-4 flex space-x-4">
            <div class="w-1/2">
              <label for="FEMP_FECHA_NAC" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
              <input type="text" id="FEMP_FECHA_NAC" name="FEMP_FECHA_NAC" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="w-1/2">
                <label for="FEMP_DNI" class="block text-sm font-medium text-gray-700">DNI</label>
                <input type="text" id="FEMP_DNI" name="FEMP_DNI" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
        </div> 
        
        <div class="mb-4 flex space-x-4">
            <div class="w-1/2">
              <label for="FEMP_HORARIO" class="block text-sm font-medium text-gray-700">Horario</label>
              <select id="FEMP_HORARIO" name="FEMP_HORARIO" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($empleados as $empleado)
                      <option>{{ $empleado -> EMP_HORARIO }}</option>
                    @endforeach
              </select>
            </div>
            
              <div class="w-1/2">
                <label for="FEMP_DEPARTAMENTO" class="block text-sm font-medium text-gray-700">Departamento</label>
                <input type="text" id="FEMP_DEPARTAMENTO" name="FEMP_DEPARTAMENTO" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
          </div>

          <div class="mb-4 flex space-x-4">
            <div class="w-1/2">
                <label for="FEMP_ESTADO" class="block text-sm font-medium text-gray-700">Estado</label>
                <select id="FEMP_ESTADO" name="FEMP_ESTADO" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" disabled selected>Estado de Empleado</option>
                      @foreach ($empleados as $empleado)
                        <option>{{ $empleado -> EMP_ESTADO }}</option>
                      @endforeach
                </select>
            </div>
            <div class="w-1/2">
              <label for="FEMP_RFID" class="block text-sm font-medium text-gray-700">Codigo de Tarjeta</label>
              <input type="text" id="FEMP_RFID" name="FEMP_RFID" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
          </div>

          

          <div class="mb-2 flex space-x-4">
          <div class="mb-4 w-1/2">
              <label for="FEMP_LIDER" class="block text-sm font-medium text-gray-700">Lider de Equipo</label>
              <select id="FEMP_LIDER" name="FEMP_LIDER" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" disabled selected>Selecciona un Lider de Equipo</option>
                  @foreach ($empleados as $empleado)
                    <option>{{ $empleado -> EMP_LIDER }}</option>
                  @endforeach
              </select>
          </div>
            <div class="mb-4 w-1/2">
              <label for="FEMP_DISPOSITIVO" class="block text-sm font-medium text-gray-700">Dispositivo</label>
              <select id="FEMP_DISPOSITIVO" name="FEMP_DISPOSITIVO" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="" disabled selected>Selecciona un Dispositivo</option>
                  @foreach ($empleados as $empleado)
                    <option>{{ $empleado -> EMP_DISPOSITIVO }}</option>
                  @endforeach
              </select>
            </div>
        
      </div>

        <div class="flex justify-between mb-4">
  
          <button onclick="submitForm('agregar')" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Guardar
          </button>
            @csrf <button onclick="submitForm('actualizar')" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Modificar
          </button>
          </form>
          <button onclick="submitForm('eliminar')" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Eliminar
          </button>
          <button id="buscarEmpleadoBtn" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            Buscar
          </button>
            <button class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
            <a href="{{ route('admin.menu') }}">Regresar</a>
          </button>
          <button onclick="" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium duration-200 bg-gray-100 md:w-auto rounded-xl hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-label="Secondary action">
            <a href="{{ route('home') }}">Salir</a>
          </button>

        </div>
        
        <div class="text-center">
          <table class="min-w-full bg-white border border-gray-300">
            <thead>
              <tr>
                <th class="px-4 py-2 border-b border-gray-300">ID</th>
                <th class="px-4 py-2 border-b border-gray-300">Nombre De Empleado</th>
                <th class="px-4 py-2 border-b border-gray-300">DNI</th>
                <th class="px-4 py-2 border-b border-gray-300">Fecha de Nacimiento</th>
                <th class="px-4 py-2 border-b border-gray-300">Horario</th>
                <th class="px-4 py-2 border-b border-gray-300">Departamento</th>
                <th class="px-4 py-2 border-b border-gray-300">Codigo de Tarjeta</th>
                <th class="px-4 py-2 border-b border-gray-300">Lider de Equipo</th>
                <th class="px-4 py-2 border-b border-gray-300">Dispositivo</th>
                <th class="px-4 py-2 border-b border-gray-300">Estado de Empleado</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($empleados as $empleado)
              <tr class = "empleado-row" 
                data-id = "{{ $empleado -> ID }}" 
                data-nom ="{{ $empleado->EMP_NOMBRE }}" 
                data-dni="{{ $empleado->EMP_DNI }}"
                data-fechanac="{{ $empleado->EMP_FECHA_NAC }}"
                data-horario="{{ $empleado->EMP_HORARIO }}"
                data-dep="{{ $empleado->EMP_DEPARTAMENTO }}"
                data-rfid="{{ $empleado->EMP_RFID }}"
                data-lider="{{ $empleado->EMP_LIDER }}"
                data-disp="{{ $empleado->EMP_DISPOSITIVO }}"
                data-est="{{ $empleado->EMP_ESTADO }}">
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->ID }}</td>
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->EMP_NOMBRE }}</td>
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->EMP_DNI }}</td>
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->EMP_FECHA_NAC }}</td>
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->EMP_HORARIO }}</td>
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->EMP_DEPARTAMENTO }}</td>
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->EMP_RFID }}</td>
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->EMP_LIDER }}</td>
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->EMP_DISPOSITIVO  }}</td>
                  <td class="px-4 py-2 border-b border-gray-300">{{ $empleado->EMP_ESTADO }}</td>
                  
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
        </div>
    </div>
  </section>


  <script>
    document.querySelectorAll('.empleado-row').forEach(row=>{
      row.addEventListener('click',function(){
        document.getElementById('FEMP_ID').value = parseInt(this.getAttribute('data-id'));
        document.getElementById('FEMP_NOMBRE').value = this.getAttribute('data-nom');
        document.getElementById('FEMP_DNI').value = this.getAttribute('data-dni');
        document.getElementById('FEMP_FECHA_NAC').value = this.getAttribute('data-fechanac');
        document.getElementById('FEMP_HORARIO').value = parseInt(this.getAttribute('data-horario'));
        document.getElementById('FEMP_DEPARTAMENTO').value = parseInt(this.getAttribute('data-dep'));
        document.getElementById('FEMP_RFID').value = parseInt(this.getAttribute('data-rfid'));
        document.getElementById('FEMP_LIDER').value = this.getAttribute('data-lider');
        document.getElementById('FEMP_DISPOSITIVO').value = parseInt(this.getAttribute('data-disp'));
        document.getElementById('FEMP_ESTADO').value = parseInt(this.getAttribute('data-est'));
      });
    });

    function clearForm() {
    document.getElementById('FEMP_ID').value = '';
    document.getElementById('FEMP_NOMBRE').value = '';
    document.getElementById('FEMP_DNI').value = '';
    document.getElementById('FEMP_FECHA_NAC').value = '';
    document.getElementById('FEMP_HORARIO').value = '';
    document.getElementById('FEMP_DEPARTAMENTO').value = '';
    document.getElementById('FEMP_RFID').value = '';
    document.getElementById('FEMP_LIDER').value = '';
    document.getElementById('FEMP_DISPOSITIVO').value = '';
    document.getElementById('FEMP_ESTADO').value = '';
    document.getElementById('method').value = 'POST';
    document.getElementById('empleadoForm').action = '{{ route("Empleados.guardar") }}';
  }

function submitForm(action){
      const form = document.getElementById('empleadoForm');
      const methodField = document.getElementById('method');
      if(action === 'actualizar'){
        form.action = "{{ route('Empleados.actualizar', ':id')}}".replace(':id',document.getElementById('FEMP_ID').value);
        methodField.value ='PUT';
      }else{
        form.action = '{{ route("Empleados.guardar")}}';
        form.method = 'POST';
      }

      form.submit();
    }

    function deleteUser(action){
      const form = document.getElementById('empleadoForm');
      const methodField = document.getElementById('method');
      if(action === 'eliminar'){
        form.action = "{{ route('Empleados.eliminar', ':id')}}".replace(':id',document.getElementById('FEMP_ID').value);
        methodField.value ='PUT';
      }else{
        form.action = '{{ route("Empleados.guardar")}}';
        form.method = 'POST';
      }

      form.submit();
    }


  </script>


</body>
</html>