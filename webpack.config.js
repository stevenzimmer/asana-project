const 	path 			= require('path'),
		entryPath 		= __dirname + '/src/js/',
		webpack 		= require('webpack'),
		miniCssExtract 	= require('mini-css-extract-plugin'),
	  	uglifyJsPlugin 	= require('uglifyjs-webpack-plugin'),
	  	optimizeCssAssets = require('optimize-css-assets-webpack-plugin');
	  	browserSync 	= require('browser-sync-webpack-plugin');

module.exports = {

	entry: {
		main: entryPath + 'main.js'
	},

	output: {

		filename: '[name].min.js',
		path: path.resolve( __dirname, 'prod/js' )

	},

	mode: 'none',

	module: {

		rules: [
			{
				test: /\.css$/,
				use: [
					miniCssExtract.loader,
					'css-loader',
					'postcss-loader'
				]
			},

			{
				test: /\.js$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						plugins: [
							'transform-class-properties',
							'@babel/plugin-syntax-dynamic-import'
						]
					}
				}
			}
		]
	},

	plugins: [

		new browserSync({
			proxy: 'asana',
			port: 3000,
			files: [
				'**/*.php'
			],
			ghostMode: false,
			injectCss: true,
			injectChanges: true,
			notify: true,
			reloadDelay: 0
		}),

		new miniCssExtract({
			filename: '../css/[name].min.css',
		}),

		new uglifyJsPlugin(),

		new optimizeCssAssets(),

		new webpack.ProvidePlugin({
			$: 'jquery',
			jQuery: 'jquery'
		}),

		new webpack.ProgressPlugin()

	]

}