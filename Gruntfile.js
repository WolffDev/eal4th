module.exports = function(grunt) {

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'), //tells where the json file is



    /**
     * Sass task
     */
     sass: {
       dev: {
         options: {
           style: 'expanded',
           sourcemap: 'none',
         },
         files: {
           'css/style.css': 'sass/style.scss'
         }
       },
       dist: {
         options: {
           style: 'compressed',
           sourcemap: 'none',
         },
         files: {
           'css/style.min.css': 'sass/style.scss'
         }
       }
     },

     /**
      * autoprefixer
      */

     autoprefixer: {
       options: {
         browser: ['last 2 versions']
       },
       // prefix all files
       multiple_files: {
         expand: true,
         flatten: true,
         src: 'css/*.css',
         dest: ''
       }
     },

    /**
     * Watch task
     */
     watch: {
       css: {
         files: '**/*.scss',
         tasks: ['sass', 'autoprefixer']
       }
     }

  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.registerTask('default',['watch']);


}
