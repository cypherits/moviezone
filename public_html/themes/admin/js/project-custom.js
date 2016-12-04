$('body').on('change', '.usersPic', function(){
    var gfile = this.files[0];
    var fd = new FormData();
    fd.append('profile_pic', gfile);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', base_url + 'users/upload_profile_pic', true);
    $('.profile-pic-upload-feed').show();
    xhr.upload.addEventListener('progress', function(e){
        if (e.lengthComputable) {
            var percent = Math.round(e.loaded / e.total * 100) + '%';
            $('.profile-pic-upload-progress').width(percent);
            $('.profile-pic-upload-progress').html(percent);
        }
    });
    xhr.addEventListener('readystatechange', function(){
        if(this.readyState === 4){
            if(this.status === 200){
                var response = this.response;
                $('#ProfilePicPath').val(response);
                $('.profile-pic-upload-feed').hide();
            }
        }
    });
    xhr.send(fd);
});
$('body').on('change', '.newsFeatureImageUpload', function(){
    var gfile = this.files[0];
    var fd = new FormData();
    fd.append('featueImage', gfile);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', base_url + 'news/upload_pic', true);
    $('.profile-pic-upload-feed').show();
    xhr.upload.addEventListener('progress', function(e){
        if (e.lengthComputable) {
            var percent = Math.round(e.loaded / e.total * 100) + '%';
            $('.profile-pic-upload-progress').width(percent);
            $('.profile-pic-upload-progress').html(percent);
        }
    });
    xhr.addEventListener('readystatechange', function(){
        if(this.readyState === 4){
            if(this.status === 200){
                var response = this.response;
                $('#newsFeatureImage').val(response);
                $('.profile-pic-upload-feed').hide();
            }
        }
    });
    xhr.send(fd);
});