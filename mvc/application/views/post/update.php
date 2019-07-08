
<div class="row">
    <div class="col-sm-6">
        <form action="/post/edit/<?=$data['id']?>" method="post" id="update" enctype="multipart/form-data" class="border rounded ">
            <div class="form-group">
                <label for="category_name">Post</label>
                <input type="text" name="name" class="form-control" value="<?= $data['name'] ?>">
            </div>
            <div class="form-group">
                <label for="category_name">Short Description</label>
                <input type="text" name="short_description" class="form-control" value="<?= $data['short_description'] ?>">
            </div>
            <div class="form-group">
                <label for="category_name">Description</label>
                <textarea name="description" class="form-control"><?= $data['description'] ?> </textarea>
            </div>

            <div class = "btn">
                <button type="submit" class="btn btn-primary">Update Post</button>
            </div>
        </form>
    </div>
</div>


