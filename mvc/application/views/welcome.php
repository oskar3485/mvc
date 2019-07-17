<div class="container-fluid">
    <?php if(empty($_SESSION['token'])) {  ?>
    <div id  ="auth"><a class="btn btn-primary " href="/register/checkUser">Авторизоваться</a> </div>
    <?php } else { ?>
        <div id ="add_post"><a class="btn btn-primary " href="/post/create">Добавить пост</a></div>
    <?php } ?>


    <div class="container">
        <?php foreach ($data['posts'] as $item) { ?>
                <ul class="list-group>">
                    <li class="list-group-item">
                    <h3><a href="/post/show/<?=$item->id?>"> <?=$item->name;?></a></h3>
                    <p><?=$item->short_description;?></p>
                </li>
                <li class="list-group-item post_footer">
                    <span class="post_created"><?=$item->created_at;?></span>
                    <span class="post_actions">
                <?php if($_SESSION['id'] == $item->user_id) { ?>
                        <a href="/post/delete/<?=$item->id?>">Удалить</a>
                        <a href="/post/update/<?=$item->id?>">Редактировать</a>
                <?php } ?>
                    </span>

                </li>
            </ul>
        <?php } ?>

    </div>
</div>

