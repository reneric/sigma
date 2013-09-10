module.exports = function(grunt) {

  // Configuration of the project and plugins
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
      watch: {
        css: {
          files: ['scss/*.scss'],
          tasks: ['autoprefixer', 'sass:deploy'],
        },
        img:{
          files: ['img/*'],
          tasks: ['imagemin'],
        }
      },
      sass: {
        // This will be executed when we run the 'development' task below
        development: {
          options: {
            style: 'expanded'
          },
          files: {
            'css/custom.css': 'css/custom.scss'
          }
        },
        // This will be executed when we run the 'deploy' task below
        deploy: {
          options: {
            style: 'compressed'
          },
          files: {
             'css/custom.css': 'scss/custom.scss'
          }
        }
      },
        imagemin: {
    png: {
      options: {
        optimizationLevel: 10
      },
      files: [
        {
          // Set to true to enable the following options…
          expand: true,
          // cwd is 'current working directory'
          cwd: 'img/',
          src: ['**/*.png'],
          // Could also match cwd line above. i.e. project-directory/img/
          dest: 'compressed/',
          ext: '.png'
        }
      ]
    },
    jpg: {
      options: {
        progressive: true
      },
      files: [
        {
          // Set to true to enable the following options…
          expand: true,
          // cwd is 'current working directory'
          cwd: 'img/',
          src: ['**/*.jpg'],
          // Could also match cwd. i.e. project-directory/img/
          dest: 'compressed/',
          ext: '.jpg'
        }
      ]
    }
  },
  autoprefixer: {
  dev: {
    options: {
      // What latest browsers it should support,
      // Global usage of more than 1%,
      // What IE versions
      browsers: ['last 3 versions', '> 1%', 'ie 8', 'ie 7']
    },
    files: {
      'css/test.css': ['css/custom.css'],
      'style.min.css': ['style.css']
    }
  }
}

  });
grunt.event.on('watch', function(action, filepath, target) {
  grunt.log.writeln(target + ': ' + filepath + ' has ' + action);
});
  // Load the plugin that provides the "sass" task.
  grunt.loadNpmTasks('grunt-contrib-watch'); 
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-imagemin');  
   
  grunt.loadNpmTasks ('grunt-autoprefixer');
  // Our tasks
  grunt.registerTask('development', ['sass:development']);
  grunt.registerTask('deploy', ['sass:deploy']);
  grunt.registerTask('default', ['imagemin']);
  grunt.registerTask('def', ['imagemin:png']);
  grunt.registerTask('auto', ['autoprefixer']);

};