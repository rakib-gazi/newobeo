/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./dashboard/**/*.php",
    'node_modules/preline/dist/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        nunito: ['"Nunito Sans"', 'sans-serif'],
      },
    },
  },
  plugins: [require('preline/plugin')],
}

