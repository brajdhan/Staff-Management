const mix = require('laravel-mix');

// Your Laravel Mix configuration goes here

mix.js('resources/js/app.js', 'public/js');

// More Laravel Mix configurations if needed

// mix.sass('resources/sass/app.scss', 'public/css');

// Additional asset compilation rules

mix.version();


mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            ['@babel/preset-env', { modules: 'commonjs' }]
                        ],
                        plugins: ['@babel/plugin-transform-modules-commonjs']
                    }
                }
            }
        ]
    }
});

// const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js');


// import('choices').then((module) => {
//    // Use the imported module
//    console.log('YES');
//    // choices.get('/scripts/choices.js')
//    //    .then((response) => {
//    //       console.log(response.data);
//    //    })
//    //    .catch((error) => {
//    //       console.error(error);
//    //    });
// }).catch((error) => {
//    // Handle any import error
//    console.log('NO');
//    // console.error(error);

// });
