<?php require_once 'process.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBD - Activity 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="style.css"> -->

    <style>
        body {
            background: url(bg1.gif) no-repeat;
            background-size: cover;
        }

        .w-20 {
            width: 20%;
        }

        .w-70 {
            width: 70%;
        }
    </style>
</head>

<body>
    <div class="d-md-flex w-100 justify-content-evenly align-items-center" style="height: 100vh;">

        <div class="w-20 card shadow">
            <form action="process.php" method="POST" class="p-3">
                <input class="form-control" type="hidden" name="id" value="<?php echo $id; ?>">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="text" name="name" value="<?php echo $name; ?>" placeholder="Name">

                <label class="form-label" for="location">Age</label>
                <input class="form-control" type="text" name="age" value="<?php echo $age; ?>" placeholder="Age">

                <label class="form-label" for="location">Location</label>
                <input class="form-control" type="text" name="location" value="<?php echo $location; ?>" placeholder="Location">

                <label class="form-label" for="location">Email Address</label>
                <input class="form-control" type="text" name="email" value="<?php echo $email; ?>" placeholder="Email Address">

                <label class="form-label" for="location">Contact Number</label>
                <input class="form-control" type="text" name="contactnumber" value="<?php echo $contactnumber; ?>" placeholder="Contact Number">

                <div class="button-container mt-2">
                    <?php if ($update == true) : ?>
                        <div class="updateContainer">
                            <button class="btn btn-primary" type="submit" name="update">Update</button>
                            <a href="index.php"><button class="btn btn-secondary" type="button" name="cancel" id="cancel">Cancel Update</button></a>
                        </div>
                    <?php else : ?>
                        <button class="btn btn-primary" type="submit" name="save">Save</button>
                        <input class="btn btn-secondary" type="reset" name="cancel" id="cancel" value="Reset">
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="w-70">

            <a href="login.php">
                <button class="btn btn-primary mb-2">LOGOUT</button>
            </a>

            <?php

            if (isset($_SESSION['message'])) : ?>

                <div class="">
                    <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                    ?>
                </div>
            <?php endif; ?>
            <?php
            $mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);

            ?>

            <div class="table-responsive">
                <table class="table table-hover align-middle shadow">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 20%;">Name</th>
                            <th scope="col" style="width: 5%;">Age</th>
                            <th scope="col" style="width: 28%;">Location</th>
                            <th scope="col" style="width: 20%;">Email Address</th>
                            <th scope="col" style="width: 12%;">Contact Number</th>
                            <th scope="col" style="width: 15%; text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['age']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['contactnumber']; ?></td>
                            <td class="text-center">
                                <a class="btn btn-primary" href="home.php?edit=<?php echo $row['id']; ?>">Edit</a>
                                <a class="btn btn-danger" href="process.php?delete=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>


        </div>
    </div>
    <script>
        // const getCellValue = (tr, idx) => tr.children[idx].innerText || tr.children[idx].textContent;

        // const comparer = (idx, asc) => (a, b) => ((v1, v2) => 
        //     v1 !== '' && v2 !== '' && !isNaN(v1) && !isNaN(v2) ? v1 - v2 : v1.toString().localeCompare(v2)
        //     )(getCellValue(asc ? a : b, idx), getCellValue(asc ? b : a, idx));

        // // do the work...
        // document.querySelectorAll('th').forEach(th => th.addEventListener('click', (() => {
        //     const table = th.closest('table');
        //     Array.from(table.querySelectorAll('tr:nth-child(n+2)'))
        //         .sort(comparer(Array.from(th.parentNode.children).indexOf(th), this.asc = !this.asc))
        //         .forEach(tr => table.appendChild(tr) );
        // })));

        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>