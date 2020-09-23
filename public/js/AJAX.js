// Resumes
$(document).ready(function (){
    $('#resume-form').on('submit', function (event){
        event.preventDefault();
        $.ajax({
            url:'/profile/resume/add',
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function (data)
            {
                $('#message').css('display','block');
                $('#message').html(data.message);
                $('#message').attr('class',data.class_name);
                if(data.success) {
                    window.setTimeout(function (){
                        location.reload();
                        }, 2000);
                }
            }
        })
    });
});
//==================================================================================
