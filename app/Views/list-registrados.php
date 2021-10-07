<!DOCTYPE html>
<html lang="en">
<head>
    <title>Suscriptores registrados</title>
    <meta charset="utf-8">   
</head>
<body>
    <table class="table" id="RegistradosTable">
      <thead>
        <tr>
        <th>Total</th>
        <th>Secciones</th>    
        </tr>
    </thead>
    <tbody>
      <?php
        foreach($registrados_detail as $row){
        ?>
      <td><?php echo $row['total']; ?></td>
      <td><?php echo $row['seccion']; ?></td>      
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
</body>
</html>