/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",           // Escanea todos los archivos PHP en la raíz y subcarpetas
    "./js/**/*.js",         // Escanea tus scripts JS
    "./inc/**/*.php"        // Escanea la carpeta inc si la creamos
  ],
  theme: {
    extend: {
      colors: {
        // Colores extraídos de tu código actual para estandarizar
        lidium: {
          primary: '#481262',   // El morado oscuro
          secondary: '#7732a8', // El morado claro/lila
          dark: '#1f1f1f',      // El casi negro del footer
        }
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'], // Coincide con tu import de Google Fonts
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'), // Necesario para la clase 'prose' en single.php
  ],
}