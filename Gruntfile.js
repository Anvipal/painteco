module.exports = function(grunt) {
    // config
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        // clean: {
        //     src: [
        //         '<%= pkg.assetsDir %>/css',
        //         // '<%= pkg.assetsDir %>/js',
        //         // '<%= pkg.assetsDir %>/svg'
        //     ]
        // },
        // uglify: {
        //     options: {
        //         preserveComments: false
        //     },
        //     build: {
        //         files: [{
        //             expand: true,
        //             cwd: '<%= pkg.sourceDir %>/js',
        //             src: '**/*.js',
        //             dest: '<%= pkg.assetsDir %>/js'
        //         }]
        //     }
        // },
        sass: {
            dist: {
                files: {
                    '<%= pkg.assetsDir %>/style.css': '<%= pkg.assetsDir %>/sass/style.scss'
                }
            }
        },
        postcss: {
            options: {
                processors: [
                    require('autoprefixer')({browsers: 'last 2 versions'})
                ]
            },
            dist: {
                src: '<%= pkg.assetsDir %>/style.css'
            }
        },
        cssmin: {
            combine: {
                options: {
                    keepSpecialComments: 0
                },
                files: {
                    '<%= pkg.assetsDir %>/style.css': '<%= pkg.assetsDir %>/style.css'
                }
            }
        },
        // svg_sprites: {
        //     options: {
        //       // Task-specific options go here.
        //     },
        //     files: {
        //         src: '<%= pkg.sourceDir %>/svg/*.svg',
        //         dest: '<%= pkg.assetsDir %>/svg'
        //     }
        // },
        watch: {
            styles: {
                files: [
                    '<%= pkg.sourceDir %>/sass/**'
                ],
                tasks: ['sass', 'postcss', 'cssmin']
            },
            // scripts: {
            //     files: [
            //         '<%= pkg.sourceDir %>/js/app/*'
            //     ],
            //     tasks: ['uglify']
            // }
        }
    });

    // plugins
    // grunt.loadNpmTasks('grunt-contrib-clean');
    // grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-watch');
    // grunt.loadNpmTasks('grunt-svg-sprites');

    // tasks
    grunt.registerTask('default', ['sass', 'postcss', 'cssmin'/*, 'clean', 'svg_sprites', 'uglify'*/]);
};