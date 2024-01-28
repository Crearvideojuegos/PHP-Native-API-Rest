<?php include 'header.php'; ?>

<div class="px-3 py-3 my-3 text-center">
    <h1 class="display-3 fw-bold">List Characters</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="tablebody_character">
        </tbody>
    </table>

</div>

<script src="assets/js/list-characters.js"></script>

<?php include 'footer.php'; ?>