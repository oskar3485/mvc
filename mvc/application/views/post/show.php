<?php include 'application/views/popup/delete.php'?>
<div class="container-fluid">
    <div class="container">



        <ul class="list-group>">
            <li class="list-group-item">
                <h3><a href="/post/show/<?=$data['id']?>"> <?=$data['name'];?></a></h3>
                <p><?=$data['short_description'];?></p>
                <p><?=$data['description'];?></p>
                <p><?=$data['created_at'];?></p>
                <?php if($data['user_id'] == $_SESSION['id']){ ?>
                    <div ><a id="update_button" class="btn btn-primary " href="/post/update/<?=$data['id']?>"> Редактировать</a></div>
                    <div ><a id="delete_post"  data-post_id="<?=$data['id']?>" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" href="/post/delete/<?=$data['id']?>"> Удалить</a></div>
                <?php } ?>
            </li>
        </ul>

        <div class="navigation_button">
            <div id="main_button" ><a class="btn btn-primary " href="/"> Главная</a></div>
            <div><button id="add_comment" class="btn btn-primary">Добавить комментарий</button></div>
            <div ><button id="show_comment" class="btn btn-primary "> Показать комментарии</button></div>
        </div>

    </div>
    <div id="create" style="display:none">
    <form action="/comment/create/<?= $data['id']?>" method="post"enctype="multipart/form-data" class="border  rounded ">
        <div id="create_comment_form">
            <label for="category_name">Текст комментария</label>
            <input type="text" name="text" class="form-control" placeholder="Please input comment text">
        </div>
        <div class = "btn">
            <button id="create_comment" type="submit"  class="btn btn-primary">Добавить Комментарий</button>
        </div>
    </form>
    <button id="hide" class="btn btn-primary">Скрыть форму</button>
    </div>

    <div class="container" id="show_all_comment_by_id" style="display: none" ">
    <?php foreach ($element as $item) { ?>
        <ul class="list-group>">
            <li class="list-group-item">
                <h5> <?=$item['text'];?></h5>
            </li>
            <li class="list-group-item comment_footer">
                <span class="comment_actions">
                        <?php  if (!empty($_SESSION['token'])) { ?>
                            <?php if (($_SESSION['id'] == $item['user_id']) ) { ?>
                                <a id="delete_comment"   href="/comment/delete/<?= $item['id'] ?>" >Удалить</a>
                                <a id="update_comment"   href="/comment/update/<?= $item['id'] ?>" >Редактировать</a>
                            <?php }
                        }
                        ?>
                </span>
            </li>
        </ul>
    <?php } ?>
</div>
</div>




