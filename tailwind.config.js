/** @type {import('tailwindcss').Config} */ 
const colors = require('tailwindcss/colors');
module.exports = {
  content: ["./src/**/*.{html,js,php,ts}"],
  theme: {
    extend: {
      scale: {
          '115': '1.15'
        }
      ,h: {
        '182': '46rem'
      },
      colors: {
        gray: colors.trueGray,
        blue: colors.lightBlue,
        red: colors.rose,
        yellow: colors.amber

    },
  },
  plugins: [],
  darkMode: 'class',
  }
}