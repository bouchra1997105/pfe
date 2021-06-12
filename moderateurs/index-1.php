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
include("footer.php");?>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
    </div>
    <br><br>
    <div class="row">
      <div class="col-md-4">
        <h3 class="text-center text-info">Add Record</h3>
        <form action="action.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id_biens" value="<?= $id_biens; ?>">
          <div class="form-group">
            <input type="text" name="name" value="<?= $name; ?>" class="form-control" placeholder="Enter name" required>
          </div>
          <div class="form-group">
          <label class="my-1 mr-2" for="inlineformCustomSelectPref" >Description</label>
            <input type="description" name="description" value="<?= $description; ?>" class="form-control" placeholder="Enter description" required>
          </div>
          <div class="form-group">
          <label class="my-1 mr-2" for="inlineformCustomSelectPref" >Latitudde</label>
            <input type="latitude" name="latitude" value="<?= $latitude; ?>" class="form-control" placeholder="Enter latitude" required>
          </div>
          <div class="form-group">
          <label class="my-1 mr-2" for="inlineformCustomSelectPref" >Longitude</label>
            <input type="longitude" name="longitude" value="<?= $longitude; ?>" class="form-control" placeholder="Enter longitude" required>
          </div>
          <?php $cat= ["hotel","restaurant","voiture"]; 
            $s = (isset($_GET['category']) && $_GET['category']!= null)? $_GET['category'] :"";
          ?>
          <div class="form-group">
          <label class="my-1 mr-2" for="inlineformCustomSelectPref" >Category</label>
          <select class="custom-select my-1 mr-sm-2" id="inlineformCustomSelectPref"name="category" >
          <option value="">Select any one</option>
          <?php if(!empty($s)) {
             foreach($cat as $c){ ?>
              <option value="<?php echo $c;?>" <?php if($s == $c) echo 'selected="selected"'; ?>><?php echo $c;?></option>
              <?php
             }
            }else{
          ?>
    
               <option value="hotel">hotel</option>
               <option value="restaurant">restaurant</option>
               <option value="voiture">Voiture</option></select>
               <?php } ?>
               </div>

         
               <div class="form-group">
          <label class="my-1 mr-2" for="inlineformCustomSelectPref" >Ville</label>
          <select class="custom-select my-1 mr-sm-2" id="inlineformCustomSelectPref"name="ville" >
               <option value="">Select any one</option>
               <option value="Adrar">1 Adrar</option>
               <option value="Chlef">2 Chlef</option>
               <option value="Laghouat">3 Laghouat</option>
               <option value="Oum El Bouaghi">4 Oum El Bouaghi</option>
               <option value="Batna">5 Batna</option>
               <option value="Béjaia">6 Béjaia</option>
               <option value="Biskra">7 Biskra</option>
               <option value="Béchar">8 Béchar</option>
               <option value="Blida">9 Blida</option>
               <option value="Bouira">10 Bouira</option>
               <option value="Tamanrasset">11 Tamanrasset</option>
               <option value="Tébessa">12 Tébessa</option>
               <option value="Télemcen">13 Télemcen</option>
               <option value="Tiaret">14 Tiaret</option>
               <option value="Tizi Ouzou">15 Tizi Ouzou</option>
               <option value="Alger">16 Alger</option>
               <option value="Djelfa">17 Djelfa</option>
               <option value="Jijel">18 Jijel</option>
               <option value="Sétif">19 Sétif</option>
               <option value="Saida">20 Saida</option>
               <option value="Skikda">21 Skikda</option>
               <option value="Sidi Bel Abbès">22 Sidi Bel Abbès</option>
               <option value="Annaba">23 Annaba </option>
               <option value="Guelma">24 Guelma</option>
               <option value="Constantine">25 Constantine</option>
               <option value="Médéa">26 Médéa</option>
               <option value="Mostaganem">27 Mostaganem</option>
               <option value="M'Sila">28 M'Sila</option>
               <option value="Mascara">29 Mascara</option>
               <option value="Ouargla">30 Ouargla</option>
               <option value="Oran">31 Oran</option>
               <option value="El Bayadh">32 El Bayadh</option>
               <option value="Illizi">33 Illizi</option>
               <option value="Bordj Bou Arreridj">34 Bordj Bou Arreridj</option>
               <option value="Boumerdes">35 Boumerdes</option>
               <option value="El Tarf">36 El Tarf</option>
               <option value="Tindouf">37 Tindouf </option>
               <option value="Tissemsilt">38 Tissemsilt</option>
               <option value="El Oued">39 El Oued</option>
               <option value="Khenchla">40 Khenchla</option>
               <option value="Souk Ahras">41 Souk Ahras</option>
               <option value="Tipaza">42 Tipaza</option>
               <option value="Mila">43 Mila  </option>
               <option value="Ain Defla">44 Ain Defla</option>
                <option value="Naama">45 Naama</option>
                <option value="Ain Témouchent">46 Ain Témouchent</option>
               <option value="Ghardaia">47 Ghardaia</option>
               <option value="Relizane">48 Relizane</option>
               <option value="Timimoun"> 49 Timimoun</option>
               <option value="Bordj Badji Mokhtar">50 Bordj Badji Mokhtar</option>
               <option value="Ouled Djallal">51 Ouled Djallal</option>
               <option value="Béni Abbès">52 Béni Abbès</option>
               <option value="In Salah">53 In Salah</option>
               <option value="In Guezzam">54 In Guezzam </option>
               <option value="Touggourt"> 55 Touggourt</option>
               <option value="Djanet"> 56 Djanet</option>
               <option value="El M'Ghair">57 El M'Ghair</option>
               <option value="Meniaa">58 Meniaa</option>
</div>

        
          


               </select></div>
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
      </div><br><br><br>
      <div class="col-md-8">
        <?php
        //session_start();
          $query = "SELECT * FROM biens where id_mod=".$_SESSION['id'];
          $stmt = $conn->prepare($query);
          $stmt->execute();
          $result = $stmt->get_result();
        ?>
        
        <table class="table table-hover" id="data-table">
          <thead>
            <tr>
           <th>#</th>
          <th>Image</th>
		     	<th>Name</th>
          <th>Description</th>
			    <th>Latitude</th>
          <th>Longitude</th>
			    <th>category</th>
          <th>Ville</th>
          <th>Action</th>
          <th>Chose a reservé</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=1;$s=0;
             while ($row = $result->fetch_assoc()) { 
              
              ?>
            <tr>
            <td><?php echo $i;?></td>
              <td><img src="<?= $row['photo']; ?>" width="25"></td>
              <td><?= $row['name']; ?></td>
              <td><?= $row['description']; ?></td>
              <td><?= $row['latitude']; ?></td>
              <td><?= $row['longitude']; ?></td>
              <td><?= $row['category']; ?></td>
              <td><?= $row['ville']; ?></td>
              
              <td>
                <a href="details.php?details=<?= $row['id_biens']; ?>" class="badge badge-primary p-2">View</a> |
                <a href="action.php?delete=<?= $row['id_biens']; ?>" class="badge badge-danger p-2" onclick="return confirm('Do you want delete this record?');">Delete</a> |
                <a href="index.php?edit=<?= $row['id_biens']; ?>&category=<?= $row['category']; ?>" class="badge badge-success p-2">Edit</a>
                
              </td>
              <td> <a href="chose_a_reser.php?add=<?= $row['id_biens']; ?>" class="badge badge-success p-2">add chose</a></td>
            </tr>
            <?php $i++;};?>
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