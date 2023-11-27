const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css", [
        tailwindcss,
    ]);
