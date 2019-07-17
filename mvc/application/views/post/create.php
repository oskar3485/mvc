
<div class="row">
    <div class = "col-sm-6">
        <form action="/post/save" method="post" id="create" enctype="multipart/form-data" class="border  rounded ">
            <div class="form-group">
                <label for="category_name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Please input post name">
            </div>
            <div class="form-group">
                <label for="category_name">Short Description</label>
                <input type="text" name="short_description" class="form-control" placeholder="Please write post short_description">
            </div>
            <div class="form-group">
                <label for="category_name">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Please write post description">
            </div>
            <div class = "btn">
                <button id="create_post" type="submit"  class="btn btn-primary">Create Post</button>
            </div>
        </form>
    </div>

    <?php print_r($data['comment']); ?>
</div>
