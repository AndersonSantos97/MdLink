
<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios</title>
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
         Seccion para Agregar , Modifica y eliminar Usarios, quienes podran ingresar al Sistema de Enlace        

      </div>

                          
      <form id="userForm" action="{{ route('users.save')}}" method="POST">
        
        @csrf
        <!--—Campo oculto para el método PUT -->
        <input type="hidden" name="_method" id="method" value="POST">
        
        <!--—Campo oculto para el ID del usuario -->
        <input type="hidden" name="usu_id" id="usu_id">

        <div class="p-8 bg-white shadow-lg rounded-lg w-full max-w-7xl">
        <div class="mb-4">
            <label for="usu_nombre" class="block text-sm font-medium text-gray-700">Nombre de Usario</label>
            <input name="usu_nombre" type="text" id="usu_nombre" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        <div class="mb-4">
          <label for="usu_password" class="block text-sm font-medium text-gray-700">Contraseña</label>
          <input name="usu_password" type="text" id="usu_password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>
        
        
        <div class="mb-4">
        <label for="usu_rol" class="block text-sm font-medium text-gray-700">ROL</label>
        <select name="usu_rol" id="usu_rol" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          <option value="" disabled selected>Selecciona un rol</option>
          @foreach ($roles as $rol)
            <option value={{ $rol->ID}}>{{ $rol->ROL_DESCRIPCION}}</option>
          @endforeach
        
        </select>
        </div>
        
        
          <div class="flex justify-between mb-4">
            
            <button type="button" onclick="submitForm('add')" name="action" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
              Agregar
            </button>
            <button type="button" onclick="submitForm('modify')" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
              Modificar
            </button>
            <button type="button" onclick="deleteUser('delete')" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
              Eliminar
            </button>
            <button type="button" onclick="back('back')" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium text-white duration-200 bg-gray-900 md:w-auto rounded-xl hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-black" aria-label="Primary action">
              Regresar
            </button>

            <button type="button" onclick="logOut('logout')" class="inline-flex items-center justify-center w-full h-12 gap-3 px-5 py-3 font-medium duration-200 bg-gray-100 md:w-auto rounded-xl hover:bg-gray-200 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-label="Secondary action">
              Salir
            </button>
      
          </div>
      </form>

        <div class="text-center">
          <table class="min-w-full bg-white border border-gray-300">
            <thead>
              <tr>
                <th class="px-4 py-2 border-b border-gray-300">ID</th>
                <th class="px-4 py-2 border-b border-gray-300">Nombre De Usuario</th>
                <th class="px-4 py-2 border-b border-gray-300">Rol</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr class="user-row" data-id="{{ $user->id}}" data-username="{{ $user->username}}" data-rol="{{ $user->rol}}">
                <td class="px-4 py-2 border-b border-gray-300">{{ $user->id}}</td>
                <td class="px-4 py-2 border-b border-gray-300">{{ $user->username}}</td>
                <td class="px-4 py-2 border-b border-gray-300">{{ $user->rol_descripcion}}</td>
              </tr>
              @endforeach
              {{-- <tr>
                <td class="px-4 py-2 border-b border-gray-300">01</td>
                <td class="px-4 py-2 border-b border-gray-300">Moderador1</td>
                <td class="px-4 py-2 border-b border-gray-300">Tempo2024#1</td>
                <td class="px-4 py-2 border-b border-gray-300">Moderador</td>
              </tr> --}}
            </tbody>
          </table>
        </div>
    
        </div>
    </div>

   
    
  </section>

  <script>
    document.querySelectorAll('.user-row').forEach(row=>{
      row.addEventListener('click',function(){
        document.getElementById('usu_id').value = this.getAttribute('data-id')
        document.getElementById('usu_nombre').value = this.getAttribute('data-username');
        document.getElementById('usu_password').value = ''; // Asumiendo que la contraseña no se muestra
        document.getElementById('usu_rol').value = this.getAttribute('data-rol');
      });
    });

    function clearForm(){
      document.getElementById('usu_id').value ='';
      document.getElementById('usu_nombre').value='';
      document.getElementById('usu_password').value = '';
      document.getElementById('usu_rol').value = '';
      document.getElementById('method').value = 'POST';
      document.getElementById('userForm').action = '{{ route("users.save")}}';
    }

    function submitForm(action){
      const form = document.getElementById('userForm');
      const methodField = document.getElementById('method');
      if(action === 'modify'){
        form.action = "{{ route('users.update', ':id')}}".replace(':id',document.getElementById('usu_id').value);
        methodField.value ='PUT';
        //const methodField = document.createElement('input');
        // methodField.setAttribute('type','hidden');
        // methodField.setAttribute('name','method');
        // methodField.setAttribute('value','PUT');
        // form.appendChild(methodField);
      }else{
        form.action = '{{ route("users.save")}}';
        form.method = 'POST';
      }

      form.submit();
    }

    // function clearForm(){
    //   document.getElementById('usu_nombre').value = '';
    //   document.getElementById('usu_password').value = '';
    //   document.getElementById('usu_rol').value = '';
    // }

    function deleteUser(action){
      //alert('Eliminar Usuario');
      const form = document.getElementById('userForm');
      const methodField = document.getElementById('method');
      if(action === 'delete'){
        form.action = "{{ route('users.delete', ':id')}}".replace(':id',document.getElementById('usu_id').value);
        methodField.value ='PUT';
      }else{
        form.action = '{{ route("users.save")}}';
        form.method = 'POST';
      }

      form.submit();
    }

    function logOut(action){
      //alert('Eliminar Usuario');
      const form = document.getElementById('userForm');
      const methodField = document.getElementById('method');
      if(action === 'logout'){
        form.action = "{{ route('user.logout')}}";
        methodField.value ='POST';
      }else{
        form.action = '{{ route("users.save")}}';
        form.method = 'POST';
      }

      form.submit();
    }
    function back(action){
      const form = document.getElementById('userForm');
      const methodField = document.getElementById('method');
      if(action == 'back'){
        form.action = "{{ route('admin.menu')}}"
        methodField.value = 'GET';
      }

      form.submit();
    }
  </script>


  
    
</body>
</html>
