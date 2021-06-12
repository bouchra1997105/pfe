<?php
include('action.php');

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
   

      <div class="col-md-8">
        <?php
        //session_start();

        
        $query = "SELECT * FROM reservation r INNER JOIN chose_a_res c ON c.id_chose = r.id_chose
        ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>

        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
              <th>#</th>
              <th>date debut</th>
              <th>date fin</th>
              <th>Name chose</th>
              <th>description</th>
              <th>prix</th>


              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            $s = 0;
            while ($row = $result->fetch_assoc()) {

            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?= $row['date_deb']; ?></td>
                <td><?= $row['date_fin']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['description']; ?></td>  
                 <td><?= $row['prix']; ?></td>
                

                <td>
                <?php 
            
                ?>
               </td>
               </tr>
            <?php $i++;}; ?>
          </tbody>
        </table>
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