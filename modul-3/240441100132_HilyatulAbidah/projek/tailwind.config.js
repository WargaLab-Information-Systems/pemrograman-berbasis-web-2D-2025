/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./aku.html", // pastikan index.html tercakup
    "./src/input.css/*.{html,js}", // termasuk file HTML atau JS dalam src
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
