const mix = require("laravel-mix");

mix
	.sourceMaps(false, "source-map")
	.js("src/js/stayawake.js", "dist/js/stayawake.js")
	.sass("src/scss/admin.scss", "dist/css/")
	.options({
		processCssUrls: false,
	});
