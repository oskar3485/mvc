
<div class="container-fluid">
    <div class="container">

            <ul class="list-group>">
                <li class="list-group-item">
                    <h3><a href="/post/show/<?=$data['id']?>"> <?=$data['name'];?></a></h3>
                    <p><?=$data['short_description'];?></p>
                    <p><?=$data['description'];?></p>
                    <p><?=$data['created_at'];?></p>
                </li>
            </ul>
    <div id="main_button" ><a class="btn btn-primary " href="/"> Главная</a></div>
    <div ><a id="update_button"class="btn btn-primary " href="/post/update/<?=$data['id']?>"> Редактировать</a></div>
    <div ><a id="delete_button" class="btn btn-primary " href="/post/delete/<?=$data['id']?>"> Удалить</a></div>
    <div ><a id="add_comment" class="btn btn-primary " href="/comment/create/<?=$data['id']?>"> Добавить комментарий</a></div>
<!--    <div ><a id="delete_comment" class="btn btn-primary " href="/comment/create/--><?//=$data['id']?><!--"> Добавить комментарий</a></div>-->
        <div ><a id="add_comment" class="btn btn-primary " href="/comment/showById/<?=$data['id']?>"> Показать комментарии</a></div>

    </div>
    <form action="/comment/create/<?= $data['id']?>" method="post" id="create" enctype="multipart/form-data" class="border  rounded ">
        <div class="form-group">
            <label for="category_name">Name</label>
            <input type="text" name="text" class="form-control" placeholder="Please input comment text">
        </div>
        <div class = "btn">
            <button id="create_post" type="submit"  class="btn btn-primary">Добавить Комментарий</button> <!-- Будет скрыто -->
        </div>
    </form>
</div>

