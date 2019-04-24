@extends('layouts.app')
<!doctype html>
<html>
<head>
<meta charset=”utf-8″>
<meta http-equiv=”X-UA-Compatible” content=”IE=edge”>
<meta name=”viewport” content=”width=device-width, initial-scale=1″>

<link rel="stylesheet" href="plugins/sweetalert2/dist/sweetalert2.min.css'">
<script src="plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
function mensaje(){
swal('Mensaje Simple!','texto adicional en el mensaje','success');
}
</script>
</head>
<body>
<button onclick='mensaje()'>Pulsar</button></button>
</body>
</html>
    <!-- /.content -->


