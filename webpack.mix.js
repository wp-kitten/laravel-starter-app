const mix = require( 'laravel-mix' );

let distPath = 'public/dist';

//#! Configure
mix.setPublicPath( distPath );
mix.options( {
    imgLoaderOptions: { enabled: false },
} );

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

//#! Compile SCSS
mix
    .sass( 'resources/compile/styles.scss', distPath )
;

//#! Compile JS
mix
    //#! Helpers
    .js( 'resources/compile/main.js', distPath )
    .react()
;
