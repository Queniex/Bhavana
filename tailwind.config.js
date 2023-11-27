/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {},
    // colors: {
    //   'yel-primary': '#FFDD63',
    //   'yel-secondary': '#FFF8E0',
    //   'white-secondary': '#FF3838',
    //   'white-tertiary': '#FFF8E0',
    //   'text-main': '#F3D464',
    //   'text-secondary': '#676767',
    //   'bg-admin': '#FBF6E4',
    //   'white-primary': '#F1F1F1',
    //   'red-primary': '#C70039',
    // },
    fontFamily: {
      sans: ['Poppins', 'sans-serif'],
    },
  },
  plugins: [
  ],
}

