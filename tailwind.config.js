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
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '4rem',
                xl: '5rem',
                '2xl': '6rem',
            },
        },
        extend: {
            fontFamily: {
                'cinzel': ['Cinzel', 'serif'],
                'montserrat': ['Montserrat', 'sans-serif']
            },
            colors: {
                'primary': {
                    '50': '#fbf6f1',
                    '100': '#f7e9dd',
                    '200': '#edd0bb',
                    '300': '#e2af8f',
                    '400': '#d58862',
                    '500': '#cc6a43',
                    '600': '#b45135',
                    '700': '#9e4330',
                    '800': '#7f372d',
                    '900': '#672f27',
                    '950': '#371713',
                }
            }
        }
    }
}
