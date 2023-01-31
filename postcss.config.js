module.exports = {
  plugins: [
    require('postcss-sort-media-queries')({
      sort: 'mobile-first',
    }),
    require('autoprefixer')({
      cascade: false,
      grid: 'no-autoplace',
    }),
    require('cssnano')({
      autoprefixer: false,
      preset: 'default',
    }),
  ],
};
