<?php
include('action_chose.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
</head>

<body>
  <?php
  include("footer.php"); ?>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
      </div>
      <br><br>
      <div class="row">
        <div class="col-md-4">
          <h3 class="text-center text-info">Add Record</h3>
          <form action="action_chose.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_chose" value="<?= $id_chose; ?>">
            <div class="form-group">
              <label class="my-1 mr-2" for="inlineformCustomSelectPref">type</label>
              <select class="custom-select my-1 mr-sm-2" id="inlineformCustomSelectPref" name="type">
                <option value="">Select any one</option>
                <option value="table">table</option>
                <option value="chambre">chambre</option>
                <option value="chambre">voiture</option>
              </select>
            </div>

            <div class="form-group">
              <label class="my-1 mr-2" for="inlineformCustomSelectPref">description</label>
              <input type="description" name="description" value="<?= $description; ?>" class="form-control" placeholder="Enter description" required>
            </div>

            <div class="form-group">
              <label class="my-1 mr-2" for="inlineformCustomSelectPref">Nbr</label>
              <input type="nbr" name="nbr" value="<?= $nbr; ?>" class="form-control" placeholder="Enter nbr" required>
            </div>

            <div class="form-group">
              <label class="my-1 mr-2" for="inlineformCustomSelectPref">Prix</label>
              <input type="prix" name="prix" value="<?= $prix; ?>" class="form-control" placeholder="Enter prix" required>
            </div>

            <div class="form-group">
              <input type="hidden" name="oldimage" value="<?= $photo; ?>">
              <input type="file" name="image" class="custom-file">
              <img src="<?= $photo; ?>" width="120" class="img-thumbnail">
            </div>


            <div class="form-group">
              <?php if ($update == true) { ?>
                <input type="submit" name="update" class="btn btn-success btn-block" value="Update Record">
              <?php } else { ?>
                <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
              <?php } ?>
            </div>
          </form>
        </div>
        <br><br><br>
        <div class="col-md-8">
          <?php
          $query = "SELECT * FROM chose_a_res";
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
          ?>

          <table class="table table-hover" id="data-table">
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>type</th>
                <th>description</th>
                <th>Nbr</th>
                <th>prix</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php $i = 1;
              $s = 0;
              while ($row = $result->fetch_assoc()) {

              ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><img src="<?= $row['photo']; ?>" width="25"></td>
                  <td><?= $row['type']; ?></td>
                  <td><?= $row['description']; ?></td>
                  <td><?= $row['nbr']; ?></td>
                  <td><?= $row['prix']; ?></td>

                  <td>

                    <a href="action_chose.php?delete=<?= $row['id_chose']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                    <a href="chose_a_reser.php?edit=<?= $row['id_chose']; ?>" class="badge badge-success p-2">Edit</a>
                  </td>
                </tr><?php $i++;
                    }; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#data-table').DataTable({
        paging: true
      });
    });
  </script>
</body>