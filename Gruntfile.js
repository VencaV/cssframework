module.exports = function(grunt) {

grunt.initConfig({
	pkg: grunt.file.readJSON('package.json'),
	less: {
		development: {
			options: {
				compress: false,
				sourceMap: true,
				sourceMapFilename: 'html/project/_ui/css/main.css.map',
				sourceMapURL: 'main.css.map',
				sourceMapRootpath: '/'
			},
			files: {
				'html/project/_ui/css/ie8.css': 'html/project/_ui/css/ie8.less',
				'html/project/_ui/css/main.css': 'html/project/_ui/css/main.less'
			}
		},
		production: {
			options: {
				compress: true
			},
			files: {
				'html/project/_ui/css/ie8.css': 'html/project/_ui/css/ie8.less',
				'html/project/_ui/css/main.css': 'html/project/_ui/css/main.less'
			}
		}
		},
		watch: {
			css: {
				files: [
					'html/project/_ui/css/*.less',
					'html/project/_ui/css/modules/*.less',
					'html/project/_ui/bootstrap/less/*.less',
					'php/*.php',
					'php/common/*.php'
				],
				tasks: ['less:development'],
					options: {
					livereload: 1337
				}
			},
			js: {
				files: [
					'html/project/_ui/js/modules/*.js'
				],
				tasks: ['compile-js'],
					options: {
					livereload: 1337
				}
			}
		},
		php: {
			dev: {
				options: {
					open: true,
					hostname: '127.0.0.1',
					port: 35729
				}
			},
			exportPhp: {
				options: {
					hostname: '127.0.0.1',
					port: 35728,
					base: 'lib'
				}
			}
		},
		concat: {
			options: {
				separator: ';',
			},
			dist: {
				src: [
					//'html/project/_ui/js/modules/jquery-<%= pkg.jqueryversion %>.min.js',
					'html/project/_ui/js/modules/main.js'
				],
				dest: 'html/project/_ui/js/main.js',
			}
		},
		uglify: {
			options: {
				//
			},
			dist: {
				files: {
					'html/project/_ui/js/main-min.js': ['html/project/_ui/js/main.js']
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-php');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('default', ['compile-js','php:exportPhp','php:dev','less:development','watch']);
	grunt.registerTask('compile-js', ['concat','uglify']);
	grunt.registerTask('compile-css', ['less:production']);
	grunt.registerTask('export', ['compile-js','less:production','php:exportPhp']);
	grunt.registerTask('compile', ['compile-js','less:production']);

};