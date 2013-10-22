'use strict';
module.exports = function(grunt) {

  grunt.initConfig({

    recess: {
      dist: {
        options: {
          compile: true
          //compress: true
        },
        files: {
          'css/main.min.css': [
              'less/main.less'
          ]
        }
      }
    },


    watch: {
      less: {
        files: [
            './less/*.less'
        ],
        tasks: ['recess'],
        options: {
            livereload: true
        }
      }

    }

  });

  // Load tasks
  //grunt.loadTasks('tasks');
  // grunt.loadNpmTasks('grunt-contrib-clean');
  // grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-recess');

  // Register tasks
  grunt.registerTask('default', [
    //'clean',
    'recess',
    //'version'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};