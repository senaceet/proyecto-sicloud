


<script type="text/javascript">
    function sugerencias(str) {
        var xmlhttp;
        if (str.length == 0) {
            document.getElementById("txtHint").innerHTML = "";
            return;
        }
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "includes/factura.php?u=" + str, true);
        xmlhttp.send();
    }
</script>

<?php
include_once '../plantillas/nav/navN2.php';
include_once '../plantillas/cuerpo/inihtmlN1.php';
include_once '../clases/class.factura.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
//print_r($datos);
?>
<h3 class="e text-center my-4">Factura</h3>
<!-- col 2 -->
<div class="row">
    <div class="col-lg-2 mx-auto">
        <div class="card card-body">
            <div class="form-group"><label for="">Digite factura</label> <input type="text" id="txt1" class="form-control" name="ID" onkeyup="sugerencias(this.value)" /></div>
        </div>
    </div>
  </div>
  <div id="txtHint"></div>

<?php
include_once '../plantillas/cuerpo/finhtml.php';
?>
</body>
</html>