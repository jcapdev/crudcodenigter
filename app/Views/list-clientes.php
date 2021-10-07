<!DOCTYPE html>
<html lang="en">
<head>
    <title>Codeigniter 4 CRUD Operation With Ajax Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-11">
            <h2>Clientes biblioteca</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal">Add</a>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="Clientes/obclient/" data-toggle="modal" data-target="#suscModal">Total Suscriptores</a>
        </div>
    </div>
 
    <table class="table table-bordered" id="studentTable">
<thead>
<tr>
<th>Folio</th>
<th>Nombre</th>
<th>apellido paterno</th>
<th>apellido materno</th>
<th>correo</th>
<th width="280px">Action</th>
</tr>
</thead>
<tbody>


       <?php
foreach($clientes_detail as $row){
?>
<tr id="<?php echo $row['idclient']; ?>">
<td><?php echo $row['folio']; ?></td>
<td><?php echo $row['nombre']; ?></td>
<td><?php echo $row['a_paterno']; ?></td>
<td><?php echo $row['a_materno']; ?></td>
<td><?php echo $row['seccion']; ?></td>
<td>
<a data-id="<?php echo $row['id']; ?>" data-folio="<?php echo $row['folio'];?>"  data-nombre="<?php echo $row['nombre']; ?>" data-apepat = "<?php echo $row['a_paterno']; ?>" data-apemat = "<?php echo $row['a_materno']; ?>" data-seccion = "<?php echo $row['id_seccionintt']; ?>" data-correo = "<?php echo $row['correo']; ?>"  class="btn btn-primary btnEdit">Edit</a>
<a data-id="<?php echo $row['id']; ?>" class="btn btn-danger btnDelete">Delete</a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
<!-- Add Student Modal -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- User Student content-->
<div class="modal-content">
  <div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Agregar Cliente</h4>
  </div>
  <div class="modal-body">
    <form id="addStudent" name="addStudent" action="<?php echo site_url('clientes/store');?>" method="post">
      <div class="form-group">
        <label for="txtFirstName">Nombre:</label>
        <input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name="txtFirstName">
      </div>
      <div class="form-group">
        <label for="txtLastName">Apellido Paterno:</label>
        <input type="text" class="form-control" id="txtAppPat" placeholder="Enter Last Name" name="txtAppPat">
      </div>
      <div class="form-group">
        <label for="txtLastName">Apellido Materno:</label>
        <input type="text" class="form-control" id="txtAppMat" placeholder="Enter Last Name" name="txtAppMat">
      </div>
      <div class="form-group">
        <label for="txtLastName">Correo:</label>
        <input type="text" class="form-control" id="txtCorreo" placeholder="Enter Last Name" name="txtCorreo">
      </div>
      <div class="form-group">
        <label for="txtLastName">Seccion:</label>
        <input type="text" class="form-control" id="txtSeccion" placeholder="Enter Last Name" name="txtSeccion">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
  </div>
</div>
<!-- Update User Modal -->
<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- User Modal content-->
<div class="modal-content">
  <div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Update Student</h4>
  </div>
  <div class="modal-body">
<form id="updateStudent" name="updateStudent" action="<?php echo site_url('clientes/update');?>" method="post">
<input type="hidden" name="hdnClientId" id="hdnClientId"/>
<div class="form-group">
        <label for="txtFirstName">Nombre:</label>
        <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre">
</div>
<div class="form-group">
        <label for="txtLastName">Apellido Paterno:</label>
        <input type="text" class="form-control" id="AppPat" placeholder="Apellido paterno" name="AppPat">
</div>
<div class="form-group">
        <label for="txtLastName">Apellido Materno:</label>
        <input type="text" class="form-control" id="AppMat" placeholder="Apellido paterno" name="AppMat">
</div>
<div class="form-group">
        <label for="txtLastName">Correo:</label>
        <input type="text" class="form-control" id="Correo" placeholder="Correo" name="Correo">
</div>
<div class="form-group">
        <label for="txtLastName">Seccion:</label>
        <input type="text" class="form-control" id="Seccion" placeholder="Enter Last Name" name="Seccion">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
  <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
  </div>
</div>


<div id="suscModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- User Modal content-->
<div class="modal-content">
  <div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Update Student</h4>
  </div>
  <div class="modal-body">

  </div>
  <div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
  </div>
</div>

<script>
  $(document).ready(function () {
//Add the Student  
$("#addStudent").validate({
rules: {
txtFirstName : "required",
txtAppPat : "required",
txtAppMat : "required",
txtCorreo : "required",
txtSeccion : "required"
},
messages: {
},
submitHandler: function(form) {
  var form_action = $("#addStudent").attr("action");
  $.ajax({
  data: $('#addStudent').serialize(),
  url: form_action,
  type: "POST",
  dataType: 'json',
  success: function (res) {
      location.reload();
  },
  error: function (data) {
  }
  });
}
});
  
//When click edit Student
$('body').on('click', '.btnEdit', function () {
     const id         = $(this).data('id');   
     const folio      = $(this).data('folio');  
     const nombre     = $(this).data('nombre');
     const a_paterno  = $(this).data('apepat');
     const a_materno  = $(this).data('apemat');
     const seccion    = $(this).data('seccion');
     const correo     = $(this).data('correo');    
    
    
      // Set data to Form Edit
      $('#Nombre').val(nombre);
      $('#AppPat').val(a_paterno);
      $('#AppMat').val(a_materno);
      $('#Correo').val(correo);
      $('#Seccion').val(seccion);
      $('#hdnClientId').val(id);
      $('#updateModal').modal('show');    

      

 });


// Update the Student
$("#updateStudent").validate({
rules: {

Nombre: "required",
AppPat: "required",
AppMat: "required",
Correo: "required",
Seccion: "required",
hdnClientId: "required",
updateModal: "required"
},
messages: {
},
submitHandler: function(form) {
  var form_action = $("#updateStudent").attr("action");
  $.ajax({
  data: $('#updateStudent').serialize(),
  url: form_action,
  type: "POST",
  dataType: 'json',
  success: function (res) {
  /*var student = '<td>' + res.data.id + '</td>';
  student += '<td>' + res.data.first_name + '</td>';
  student += '<td>' + res.data.last_name + '</td>';
  student += '<td>' + res.data.address + '</td>';
  student += '<td><a data-id="' + res.data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + res.data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
  $('#studentTable tbody #'+ res.data.id).html(student);
  $('#updateStudent')[0].reset();*/
  $('#updateModal').modal('hide');
  },
  error: function (data) {
  }
  });
}
});
   //delete student
$('body').on('click', '.btnDelete', function () {
    var student_id = $(this).attr('data-id');
      $.get('Clientes/delete/'+student_id, function (data) {
      $('#studentTable tbody #'+ student_id).remove();
      })
   });
});   
</script>
</div>
</body>
</html>