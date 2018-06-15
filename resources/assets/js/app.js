
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

const ROOT_URL= window.location.protocol + '//' +window.location.host +'/';

/**
*Dropzone options and functions
*
*
*/


   Dropzone.options.uploadImage = {
        paramName: "image_name", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        acceptedFiles: 'image/*',
        

        success: function(file, response){
            if(file.status == 'success'){
                fileUploaded.handleSuccess(response);
            }else{
                fileUploaded.handleError(response);
            }
        }
      };

var fileUploaded = { 
    handleError: function(response){
            
    },
    handleSuccess: function(response){
        var imageContainer = $('#image-gallery-container');
        var imgSrcThumb = '/storage/images/' + response.album_id + '/thumb_' + response.image_name;
        var imgSrc = '/storage/images/' + response.album_id + '/' + response.image_name;
        var ImgEdit = ROOT_URL + 'home/image/' + response.id +'/edit';
        $(imageContainer).append('<div class="col-sm-6 col-md-4">\
        <div class="section-box-eleven thumbnail">\
                        <figure>\
                            <a href="' + ImgEdit +'">Edit</a>\
                        </figure>\
                        <a href="'+ imgSrc +'">\
                        <img class="img-responsive" src="'+imgSrcThumb+'">\
                        </a>\
                    </div>\
        </div>');
        baguetteBox.run('#image-gallery-container');
    }
}


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const truncateString = (str, num) =>
str.length > num ? str.slice(0, num > 3 ? num - 3 : num) + '...' : str;


$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    
    baguetteBox.run('#image-gallery-container');
});

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
