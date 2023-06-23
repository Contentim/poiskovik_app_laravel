// vue.config.js
// ...

const CKEditorWebpackPlugin = require( '@ckeditor/ckeditor5-dev-webpack-plugin' );

// ...

module.exports = {
    // ...

    configureWebpack: {
        plugins: [
            // CKEditor needs its own plugin to be built using webpack.
            new CKEditorWebpackPlugin( {
                // The UI language. Language codes follow the https://en.wikipedia.org/wiki/ISO_639-1 format.
                language: 'ru',

                // Append translations to the file matching the `app` name.
                translationsOutputFile: /app/
            } )
        ]
    },

    // ...
}
