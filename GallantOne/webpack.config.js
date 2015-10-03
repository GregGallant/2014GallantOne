module.exports = {
    //context: './src/jsx/Application',
	entry: {
        javascript: './src/jsx/Application/GallantOne.jsx'
    },
	output: {
		filename: 'bundle.js',
        path: 'assets/js'
	},
	module: {
		loaders: [
			{
                test: /\.jsx$/,
                loader: 'babel-loader',
                exclude: '/node_modules/'
            }
		]
	}

};
