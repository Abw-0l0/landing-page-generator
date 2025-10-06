/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    darkMode: 'class', // Enable class-based dark mode
    theme: {
      extend: {
        fontFamily: {
          syne: ['Syne', 'sans-serif'],
          'noto-sans-jp': ['"Noto Sans JP"', 'sans-serif'],
        },
        colors: {
          primary: '#007CBE',
          secondary: '#253336',
          gray: {
            100: '#F8F9FB',
            200: '#F2F2F6',
            300: '#EEEFF4',
            400: '#EBECF2',
            500: '#C4C5CA',
            600: '#9D9DA1',
            700: '#767679',
            800: '#4E4F51',
          },
          green: {
            500: '#E3F3DE',
            700: '#479A31',
          },
          blue: {
            200: '#F5FAFC',
            300: '#E5F2F8',
          },
        },
      },
    },
    plugins: [],
  }

