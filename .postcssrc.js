/**
 * PostCSS Config
 */
module.exports = (ctx) => {
  return {
    map: ctx.options.map,
    plugins: {
      autoprefixer: {
        /**
         * @module autoprefixer
         * @url https://www.npmjs.com/package/autoprefixer
         * --------------------------------------------------------- */
        cascade: false,
        grid: 'no-autoplace',
      },
    },
  }
}