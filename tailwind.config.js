module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
    "./resources/js/**/*.{vue,js,ts,jsx,tsx}", 
  ],
  theme: {
    extend: {
      backgroundImage: {
        'header-image': "url('/img/header-bg.png')",
      }
    },
  },
  plugins: [],
}
