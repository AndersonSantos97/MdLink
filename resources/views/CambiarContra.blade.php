<!DOCTYPE html>
<html class="h-full bg-white">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cambiar Contraseña</title>
  <link rel="icon" href="ManageUsers.png" type="">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

  <section>
    <div class="px-8 py-24 mx-auto md:px-12 lg:px-32 max-w-7xl">
      <div class="text-center">
        <h1 class="text-4xl font-semibold tracking-tighter text-gray-900 lg:text-5xl text-balance">
          Bienvenido al Proyecto de Enlace Biometrico,
          <span class="text-gray-600">Haciendo las Consultas más fáciles y seguras</span>
        </h1>
        <p class="w-1/2 mx-auto mt-4 text-base font-medium text-gray-500 text-balance">
          Debes Cambiar la Contraseña - No la compartas, al menos una letra mayúscula, al menos un número, debe contener 8 caracteres
        </p>
      </div>
      <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Ingresa La Nueva Contraseña</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form id="passwordForm" class="space-y-6" method="POST">
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña Nueva</label>
              </div>
              <div class="mt-2 relative">
                <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <i class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer" id="togglePassword"></i>
              </div>
            </div>
            <div>
              <div class="flex items-center justify-between">
                <label for="confirmPassword" class="block text-sm font-medium leading-6 text-gray-900">Repite la Contraseña Nueva</label>
              </div>
              <div class="mt-2 relative">
                <input id="confirmPassword" name="confirmPassword" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <i class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer" id="toggleConfirmPassword"></i>
              </div>
            </div>
            <div id="error-message" class="text-red-500 text-sm hidden">
              La contraseña debe contener al menos 8 caracteres, una letra mayúscula y un número.
            </div>
            <div id="match-error-message" class="text-red-500 text-sm hidden">
              Las contraseñas no coinciden.
            </div>
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-800 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Cambiar Contraseña</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script>
    document.getElementById('passwordForm').addEventListener('submit', function(event) {
      event.preventDefault();

      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;
      const errorMessage = document.getElementById('error-message');
      const matchErrorMessage = document.getElementById('match-error-message');

      const passwordRegex = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;

      let valid = true;

      if (!passwordRegex.test(password)) {
        errorMessage.classList.remove('hidden');
        valid = false;
      } else {
        errorMessage.classList.add('hidden');
      }

      if (password !== confirmPassword) {
        matchErrorMessage.classList.remove('hidden');
        valid = false;
      } else {
        matchErrorMessage.classList.add('hidden');
      }

      if (valid) {
        // Aquí puedes enviar el formulario, por ejemplo usando AJAX o descomentando la línea siguiente
        // this.submit();
      }
    });

    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
      // Alternar el tipo de input entre password y text
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // Alternar el icono
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });

    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
    const confirmPassword = document.getElementById('confirmPassword');

    toggleConfirmPassword.addEventListener('click', function () {
      // Alternar el tipo de input entre password y text
      const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
      confirmPassword.setAttribute('type', type);
      // Alternar el icono
      this.classList.toggle('fa-eye');
      this.classList.toggle('fa-eye-slash');
    });
  </script>

</body>
</html>
