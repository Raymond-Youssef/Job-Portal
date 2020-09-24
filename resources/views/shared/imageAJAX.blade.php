<script>
    $(document).ready(function (){
        $('#image-form').on('submit', function (event){
            event.preventDefault();
            $.ajax({
                url:'{{route('image.store')}}',
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
                        $('#profile_image').attr('src', data.uploaded_image);
                    }
                }
            })
        });
    });
</script>
