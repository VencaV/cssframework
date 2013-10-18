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
		uglify: {
			minJs: {			
				options: {
					report: 'gzip'
				},
				files: {
					'html/project/_ui/js/main.min.js': ['html/project/_ui/js/main.js']
			}
		}
	}
});

grunt.loadNpmTasks('grunt-contrib-less');
grunt.loadNpmTasks('grunt-contrib-watch');
grunt.loadNpmTasks('grunt-php');
grunt.loadNpmTasks('grunt-contrib-uglify');

grunt.registerTask('default', ['php:exportPhp','php:dev','less:development','watch']);
grunt.registerTask('export', ['less:production','php:exportPhp']);
grunt.registerTask('minjs', ['uglify:minJs']);


};