module.exports = {

	plugins: [

		require('postcss-import'),
		require('postcss-mixins'),
		require('postcss-nested'),
		require('precss'),
		require('postcss-preset-env')({
			stage: 1,
			browsers: 'last 2 versions'
		}),
		require('cssnano'),

	]
}