/** @type {import('tailwindcss').Config} */

import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './app/Livewire/**/*.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './vendor/filament/**/*.blade.php'
    ],
    theme: {
        extend: {
            fontFamily: {
                'cinzel': ['Cinzel', 'serif'],
                'montserrat': ['Montserrat', 'sans-serif']
            }
        }
    }
}
