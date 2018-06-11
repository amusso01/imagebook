
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const truncateString = (str, num) =>
str.length > num ? str.slice(0, num > 3 ? num - 3 : num) + '...' : str;

   Dropzone.options.uploadImage = {
        paramName: "image_name", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        // maxFiles: 1,
        acceptedFiles: 'image/*',
        success: function(file, response){
            console.log(file);
            // console.log(response);
        }
      };



$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

});

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
