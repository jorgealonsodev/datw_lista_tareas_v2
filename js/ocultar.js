/*
Cuando se pulsa en el enlace "Acceder", se ejecuta la función de evento que está asociada a ese elemento en el archivo JavaScript. En esta función, se comprueba si el contenido de registro está visible y, si lo está, se oculta. Luego, se comprueba si el contenido de inicio de sesión ya está visible o no. Si no está visible, se hace visible estableciendo la clase "ocultar_login" en modo oculto. En cambio, si ya está visible, se oculta estableciendo la misma clase en modo visible. La variable "contenidoVisible" se actualiza con el valor "login" o se borra, según corresponda.

Por lo tanto, el resultado final de hacer clic en el enlace "Acceder" es que el formulario de inicio de sesión se muestra u oculta, dependiendo de su estado anterior, mientras que el formulario de registro se oculta si estaba visible.
*/

const mostrarLogin = document.getElementById('mostrar_login')
const ocultarLogin = document.getElementById('oculto_login')

const mostrarRegistro = document.getElementById('mostrar_registro')
const ocultarRegistro = document.getElementById('oculto_registro')

// Variable para almacenar el estado actual del contenido (mostrado u oculto)
let contenidoVisible = ''

// Agregar un event listener al enlace "mostrar_login"
mostrarLogin.addEventListener('click', function () {
  // Verificar si el contenido de registro está visible y ocultarlo si es necesario

  ocultarRegistro.classList.add('ocultar_registro')

  // Alternar el estado del contenido de login
  if (contenidoVisible !== 'login') {
    ocultarLogin.classList.remove('ocultar_login')
    contenidoVisible = 'login'
  } else {
    ocultarLogin.classList.add('ocultar_login')
    contenidoVisible = ''
  }
})

// Agregar un event listener al enlace "mostrar_registro"
mostrarRegistro.addEventListener('click', function () {
  // Verificar si el contenido de login está visible y ocultarlo si es necesario
  ocultarLogin.classList.add('ocultar_login')

  // Alternar el estado del contenido de registro
  if (contenidoVisible !== 'registro') {
    ocultarRegistro.classList.remove('ocultar_registro')
    contenidoVisible = 'registro'
  } else {
    ocultarRegistro.classList.add('ocultar_registro')
    contenidoVisible = ''
  }
})
