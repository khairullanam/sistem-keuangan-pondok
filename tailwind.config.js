// tailwind.config.js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {
      // Anda bisa menambahkan warna kustom jika perlu, misalnya:
      colors: {
        'light-blue-glass': 'rgba(255, 255, 255, 0.4)', // Sangat terang, sedikit transparan
        'dark-blue-glass': 'rgba(30, 41, 59, 0.4)', // Dark mode version
      },
      // Anda mungkin perlu mengaktifkan experimental features untuk backdrop-filter jika tidak berfungsi:
      // Arahkan Tailwind untuk menghasilkan utilitas untuk properti CSS yang belum ada secara default
      // Ini lebih baik ditangani oleh PostCSS, tapi ini opsi langsung jika perlu.
      // screens: {
      //   '2xl': '1536px',
      // },
      // You might need to add a custom plugin for backdrop-filter if your Tailwind version doesn't support it directly.
      // Tailwind CSS v3 supports arbitrary values, so it's usually `backdrop-filter-[blur(10px)]`
    },
  },
  plugins: [], // Tambahkan plugin kustom di sini jika Anda membuat utilitas khusus.
  // Untuk memastikan backdrop-filter tidak dihapus oleh PurgeCSS jika Anda menggunakannya:
  // safelist: ['backdrop-blur-md', 'backdrop-brightness-100', 'bg-white/40'],
};