module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      dist: {
        files: {
          'foundation.min.js': ['foundation.js']
        }
      }
    },
    imagemin: {
      options: {
        cache: false,
        optimizationLevel: 7,
      },

      dist: {
        files: [{
          expand: true,
          cwd: 'raw/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'img/'
        }]
      }
    },
    sass: {                              // Task
        dev: {                            // Target
          options: {                       // Target options
            style: 'nested',
            sourcemap: 'none',
            compass: true,
          },
          files: {                         // Dictionary of files
              'app.css': './foundation/scss/style.scss'      // 'destination': 'source'
          }
        },
        editor: {                            // Target
          options: {                       // Target options
            style: 'nested',
            sourcemap: 'none',
            compass: true,
          },
          files: {                         // Dictionary of files
              'editor-style.css': './foundation/scss/editor-style.scss'      // 'destination': 'source'
          }
        },
        dist: {                            // Target
            options: {                       // Target options
                style: 'compressed',
            sourcemap: 'none',
                compass: true,
            },
            files: {                         // Dictionary of files
                'app.css': './foundation/scss/style.scss'      // 'destination': 'source'
            }
        }
      },
      watch: {
          dist: {
              files: '**/*.scss',
              tasks: ['dist', 'autoprefixer','css-min','concatcss'],
              options: {
                  spawn: false
              }
          },
          dev: {
              files: '**/*.scss',
              tasks: ['dev', 'autoprefixer','concatcss'],
              options: {
                  spawn: false
              }
          },
      },
      concat: {
          options: {
              separator: '',
          },
          dist: {
              src: ['style-heading.css', 'app.css'],
              dest: 'style.css',
          },
      },
      autoprefixer:{
          options: {
              browsers: ['last 3 versions'],
          },
          dist: {
              files: {
                  'app.css' : 'app.css', // Destination : Source
              },
          },
      },
      cssmin: {
          minify: {
              src: 'style.css',
              dest: 'style.css'
          }
      },
  });

  
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-imagemin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-autoprefixer');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('dev', ['sass:dev']);
    grunt.registerTask('dist', ['sass:dist']);
    grunt.registerTask('watch-dist',['watch:dist']);
    grunt.registerTask('watch-dev',['watch:dev']);
    grunt.registerTask('image',['imagemin']);
    grunt.registerTask('default', ['uglify']);
    grunt.registerTask('concatcss',['concat']);
    grunt.registerTask('prefix',['autoprefixer']);
    grunt.registerTask('css-min',['cssmin']);

};