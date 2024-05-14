<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert and Update Data</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <h2>Insert Data</h2>
    
    <form id="insertForm">
        <label for="name">Name :</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Add</button>
    </form>

    <h2>Update Data</h2>

    <?php foreach ($data as $row): ?>
        <form class="updateForm" data-id="<?= $row['id']; ?>">
            <label for="name">Name :</label>
            <input type="text" id="name" name="name" value="<?= $row['name']; ?>" required>
            <button type="submit">Update</button>
        </form>
    <?php endforeach; ?>

    <script>
        $(document).ready(function () {
            $('#insertForm').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('/insert') ?>',
                    data: $('#insertForm').serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            // You can redirect or perform any other action after successful insert
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });

            $('.updateForm').submit(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    type: 'PUT',
                    url: '<?= base_url('/update/') ?>' + id,
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            // You can redirect or perform any other action after successful update
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
        });
    </script>

</body>
</html>
