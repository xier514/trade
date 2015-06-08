function checkImgType(ths) {
    var filename = ths.value;
    var mime = filename.toLowerCase().substr(filename.lastIndexOf("."));
    if (mime != ".jpg") {
        alert("请选择jpg格式的照片上传");
        ths.outerHTML = ths.outerHTML;
        return false;
    }
}