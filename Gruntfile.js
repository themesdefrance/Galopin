module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			options: {},
			dev: {
				files: {
					'./style.css': 'css/style.scss',
					'css/style.css': 'css/style.scss'
				},
				options: {
					outputStyle: 'nested'
				}
			},
			build: {
				files: {
					'./style.css': 'css/style.scss',
				},
				options: {
					outputStyle: 'compressed'
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
		copy: {
			build: {
				expand: true,
				src: ['**', '!.sass-cache', '!Galopin/', '!node_modules/**', '!Gruntfile.js', '!README.md', '!package.json'],
				dest: 'Galopin/',
			}
		}
	});
	
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-copy');
	
	grunt.registerTask('compile', ['sass:dev', 'autoprefixer:dev']);
	grunt.registerTask('build', ['sass:dev', 'sass:build', 'autoprefixer:dev', 'copy:build']);
};