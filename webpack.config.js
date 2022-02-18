const Encore = require('@symfony/webpack-encore');

if (!Encore.isRuntimeEnvironmentConfigured()) {
    Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')

    .addEntry('app', './assets/js/app.js')
    .addEntry('blog', './assets/js/blog.js')
    .splitEntryChunks()
    .enableSingleRuntimeChunk()

    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())

    .copyFiles({
        from: './assets/images',
        to: 'images/[path][name].[hash:8].[ext]'
    })

    .configureBabel(() => {
    }, {
        useBuiltIns: 'usage',
        corejs: 3
    })

    .enableSassLoader(function (options) {
    }, {
        resolveUrlLoader: false
    })

    .autoProvidejQuery()

    .enablePostCssLoader()
;

module.exports = Encore.getWebpackConfig();
