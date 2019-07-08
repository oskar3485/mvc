<div class="container-fluid">
    <div class="container">

            <ul class="list-group>">
                <li class="list-group-item">
                    <h3><a href="/post/show/<?=$data['id']?>"> <?=$data['name'];?></a></h3>
                    <p><?=$data['short_description'];?></p>
                    <p><?=$data['description'];?></p>
                    <p><?=$data['created_at'];?></p>
                </li>
                <div id="main_button" ><a class="btn btn-primary " href="/"> Главная</a></div>
                <div ><a id="update_button"class="btn btn-primary " href="/post/update/<?=$data['id']?>"> Редактировать</a></div>
                <div ><a id="delete_button" class="btn btn-primary " href="/post/delete/<?=$data['id']?>"> Удалить</a></div>
            </ul>

    </div>
</div>

