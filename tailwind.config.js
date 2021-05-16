module.exports = {
  purge: [
  	'./storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        primary: "#F3B391",
        secondary: "#F6D4BA",
        third: "#FEFADC",
        fourth: "#FEEA00",
        fifth: "#3F612D",
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
