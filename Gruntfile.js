module.exports = function(grunt) {

grunt.initConfig({
	pkg: grunt.file.readJSON('package.json'),
	less: {
		development: {
			options: {
				yuicompress: false
			},
			files: {
				'html/project/_ui/css/main.css': 'html/project/_ui/css/main.less',
				'html/project/_ui/css/ie8.css': 'html/project/_ui/css/ie8.less'
			}
		},
		production: {
				options: {
				yuicompress: true
			},
			files: {
				'html/project/_ui/css/main.css': 'html/project/_ui/css/main.less',
				'html/project/_ui/css/ie8.css': 'html/project/_ui/css/ie8.less'
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
				tasks: ['concat'],
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
					'html/project/_ui/js/jquery-<%= pkg.jqueryversion %>.min.js',
					'html/project/_ui/js/modules/main.js'
				],
				dest: 'html/project/_ui/js/main.min.js',
			}
		}
	});

	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-php');
	grunt.loadNpmTasks('grunt-contrib-concat');

	grunt.registerTask('default', ['concat','php:exportPhp','php:dev','less:development','watch']);
	grunt.registerTask('export', ['concat','less:production','php:exportPhp']);

};