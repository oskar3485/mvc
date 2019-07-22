$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#show_comment').click(function () {
        $('#show_all_comment_by_id').css('display','block');
    });

    $('#show_update_comment').click(function () {
        $('#update_comment_form').css('display','block');
    });

    $('#update_comment').click(function () {
        $('#update_comment_form').css('display','block');
    });

    $('#add_comment').click(function () {
        $('#create').css('display','block');
    });
    $('#hide').click(function () {
        $('#create').css('display','none');
    });
    $('#yes').click(function () {
        let post = $('#delete_post').parents('ul');
        console.log(post);
        let id = $('#delete_post').data('post_id');
        let url = '/post/delete/' + id;
        $.ajax({
            type:"GET",
            dataType:'json',
            url:url,
            success:function (data) {
                post.remove();
                window.location.replace('/');
            }
        });
    });
    $('#no').click(function () {
        window.location.replace('/');
    })
});
