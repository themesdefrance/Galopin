module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			options: {},
			dev: {
				files: {
					'./style.css': 'css/style.scss'
				},
				options: {
					outputStyle: 'nested'
				}
			}
		},
		autoprefixer: {
			options: {},
			dev: {
				src: './style.css',
				dest: './style.css'
			}
		},
		watch: {
			compile: {
				files: ['css/**/*.scss'],
				tasks: ['compile']
			},
		},
	});
	
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	
	grunt.registerTask('compile', ['sass:dev', 'autoprefixer:dev']);
};