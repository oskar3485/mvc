<div class="container" id="update_comment">
    <form action="/comment/edit/<?= $data['id'] ?>" method="post" id="update_comment_form">
        <div class="form-group">
            <label for="category_name">Comment Text</label>
            <textarea name="description" class="form-control"><?= $data['text']?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </form>
</div>

<!-- Пока не придумал как передавать id редактируемого комментария во вью post/show поэтому временно на отдельной страницк -->