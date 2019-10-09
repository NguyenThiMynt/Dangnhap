$(document).ready(function () {
    // tích hợp ckeditor vào textarea
    // CKEDITOR.replace('category-description');
    CKEDITOR.replace( 'category-description', {
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    } );
});