module.exports = function(grunt) {

grunt.initConfig({
	pkg: grunt.file.readJSON('package.json'),
	less: {
		development: {
			options: {
				compress: false,
				sourceMap: true,
				sourceMapFilename: '<%= pkg.csspath %>main.css.map',
				sourceMapURL: 'main.css.map',
				sourceMapRootpath: '/'
			},
			files: {
				'<%= pkg.csspath %>ie8.css': '<%= pkg.csspath %>ie8.less',
				'<%= pkg.csspath %>main.css': '<%= pkg.csspath %>main.less'
			}
		},
		production: {
			options: {
				compress: true
			},
			files: {
				'<%= pkg.csspath %>ie8.css': '<%= pkg.csspath %>ie8.less',
				'<%= pkg.csspath %>main.css': '<%= pkg.csspath %>main.less'
			}
		}
		},
		watch: {
			css: {
				files: [
					'<%= pkg.csspath %>*.less',
					'<%= pkg.csspath %>modules/*.less',
					'<%= pkg.csspath %>bootstrap/less/*.less',
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
					'<%= pkg.jspath %>modules/*.js'
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
					//'<%= pkg.jspath %>modules/jquery-<%= pkg.jqueryversion %>.min.js',
					'<%= pkg.jspath %>modules/main.js'
				],
				dest: '<%= pkg.jspath %>main.js',
			}
		},
		uglify: {
			options: {
				//
			},
			dist: {
				files: {
					'<%= pkg.jspath %>main-min.js': ['<%= pkg.jspath %>main.js']
				}
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-php');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');

	grunt.registerTask('default', ['compile-js','php:exportPhp','php:dev','compile-css-dev','watch']);
	grunt.registerTask('compile-js', ['concat','uglify']);
	grunt.registerTask('compile-css', ['less:production']);
	grunt.registerTask('compile-css-dev', ['less:development']);
	grunt.registerTask('export', ['compile-js','less:production','php:exportPhp']);
	grunt.registerTask('compile', ['compile-js','less:production']);

};