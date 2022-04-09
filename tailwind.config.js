// tailwind.config.js
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  mode: 'jit',
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.svelte',
  ],
  theme: {
    screens: {
      xs: '360px',
      ...defaultTheme.screens,
    },
    extend: {
      fontFamily: {
        sans: ['Inter var', 'sans-serif'],
      },
    },
  },
  plugins: [require('daisyui')],
  daisyui: {
    themes: ['light'],
  },
};
