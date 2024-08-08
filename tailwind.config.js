/** @type {import('tailwindcss').Config} */

import preset from './vendor/filament/support/tailwind.config.preset'

export default {
  presets: [preset],
  darkMode: 'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",

    './app/Filament/**/*.php',
    './resources/views/filament/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('daisyui'),
  ],
  daisyui: {
    themes: true, // atau Anda bisa mengatur tema spesifik di sini
  },
}

