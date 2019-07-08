<div class="container-fluid">
    <div id ="add_post"><a class="btn btn-primary " href="/post/create">Добавить пост</a></div>
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
                        <a href="/post/delete/<?=$item->id?>">Удалить</a>
                        <a href="/post/update/<?=$item->id?>">Редактировать</a>
                    </span>

                </li>
            </ul>
        <?php } ?>

    </div>
</div>

