const mix = require("laravel-mix");

mix
	.sourceMaps(false, "source-map")
	.js("src/js/stayawake.js", "dist/js/stayawake.js")
	.options({
		processCssUrls: false,
	})
	.browserSync({
		proxy: "http://localhost",
		port: 3000,
		open: false,
		files: [
			"**/*.php",
			"img/**/*.{png,jpg,gif}",
			"dist/js/*.js",
			"dist/css/*.css",
		],
	});
