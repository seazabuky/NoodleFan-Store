/** @type {import('tailwindcss').Config} */ 
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
      extend: {
        scale: {
            '115': '1.15'
          }
        ,h: {
          '182': '46rem'
        }

      },
    },
    plugins: [],
    darkMode: 'class',
  }