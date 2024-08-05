/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {

    extend: {
        screens: {
            xs: '380px',
            sm: '576px',
          },
        fontFamily: {
            'nunito-sans': [ "Nunito Sans", 'sans-serif'],
            lora: ["Lora", 'serif'],
        },
        colors: {

    'tia': {
        '50': '#fff8ec',
        '100': '#ffefd2',
        '200': '#ffdba4',
        '300': '#ffc06b',
        '400': '#ff9a2f',
        '500': '#ff7a07',
        '600': '#f95d00',
        '700': '#c04000',
        '800': '#a33609',
        '900': '#832f0b',
        '950': '#471503',
    },

'java': {
        '50': '#eefdfc',
        '100': '#d3faf9',
        '200': '#adf4f4',
        '300': '#74eaec',
        '400': '#34d7dc',
        '500': '#18b7be',
        '600': '#1796a3',
        '700': '#1a7884',
        '800': '#1e626c',
        '900': '#1d525c',
        '950': '#0d363f',
    },

        }
    },
  },
  plugins: [],
}

