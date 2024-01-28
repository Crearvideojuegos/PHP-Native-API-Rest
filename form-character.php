<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <form>
            <div class="mb-3">
                <label for="name_character" class="form-label">Name</label>
                <input type="text" class="form-control" name="name_character" id="name_character" value="">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" value="">
            </div>

            <button type="button" class="btn btn-primary" id="send">Submit</button>
        </form>
    </div>
</div>

<script src="assets/js/form-characters.js"></script>

<?php include 'footer.php'; ?>
