function eyeToggle (e,eyeImage) {
    // $(this).toggleClass("fa-eye fa-eye-slash");
    
    // let eyeImage = e.target
    
    let a = e.target;
    
    var input = $(eyeImage).closest('div').find('input');
    
    if (input.attr("type") === "password") {
        input.attr("type", "text");
        eyeImage.src = "assets/images/open-eye.png"
    } else {
        input.attr("type", "password");
        eyeImage.src = "assets/images/close-eye.png"
    }
};

$('.close_eye').each(function () {
    // console.log(this);
    $(this).on('click',function(e){
        eyeToggle(e,this)
    })
})