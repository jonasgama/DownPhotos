var gulp = require('gulp');
var uncss = require('gulp-uncss');
 
gulp.task('uncss', function() {
  return gulp.src([
  	'public/css/app.css'
  	])
  .pipe(uncss({
      html: [
        'http://downphotos.dev/',
		'http://downphotos.dev/sobre',
		'http://downphotos.dev/time',
		'http://downphotos.dev/usuario',
		'http://downphotos.dev/envio'
      ],
    })).pipe(gulp.dest('new/'));
});

