<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Contacts</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>
<body>

    <div class="container">
        <h3>RestAPI Contacts</h3>
        <hr>
        <form action="" method="POST">
            <div class="form-group">
                <label for="search">Busque pelo nome</label>
                <br>
                    <input name="search" id="search-text" class="form-control form-control-lg" type="text" placeholder="Search..." required />
            </div>
        </form>
        <hr>
        <?php
            include 'config.php';
            $stmt=$conn->prepare("SELECT name,phone FROM contacts");
            $stmt->execute();
            $result=$stmt->get_result();
        ?>
        <table class="table table-striped" id="table-data">
            <thead>
                <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Contato</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row=$result->fetch_assoc()){ ?>
                <tr>
                    <td><img src="logo.png" alt="" height="30" /></td>    
                    <td class="result"><?= $row['name']; ?></td>
                    <td class="result"><?= $row['phone']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#search-text").keyup(function() {
                var search = $(this).val();
                $.ajax({
                    url: 'action.php',
                    method: 'post',
                    data:{query:search},
                    success:function(res) {
                        $('#table-data').html(res);
                    }
                })
            })
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>