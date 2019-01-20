let mix = require('laravel-mix');
let build = require('./tasks/build.js');
let tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');

mix.disableSuccessNotifications();
mix.webpackConfig({
    plugins: [
        build.jigsaw,
        build.browserSync(),
        build.watch([
            'config.php',
            'source/**/*.md',
            'source/**/*.php',
            'source/**/*.scss',
            '*.php',
            '*.js',
        ]),
    ],
});

mix.setPublicPath('source')

mix.js('source/_assets/js/app.js', 'source/js')
    .js('source/_assets/js/main.js', 'source/js')
    .sass('source/_assets/sass/main.scss', 'source/css')
    .sourceMaps()
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.js')],
    })
    .purgeCss({
        extensions: ['html', 'md', 'js', 'php', 'vue'],
        folders: ['source'],
        whitelistPatterns: [/language/, /hljs/, /algolia/],
    })
    .version();
