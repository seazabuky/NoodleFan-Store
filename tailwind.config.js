/** @type {import('tailwindcss').Config} */ 
const colors = require('tailwindcss/colors')
module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
      extend: {
        colors: {
          amber: colors.amber,
        },
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