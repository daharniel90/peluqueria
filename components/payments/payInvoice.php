
<?php
include("./components/invoices/invoiceTableComponent.php");

function payClientService($conn, $idInvoice){

error_reporting(E_ALL);



 
 if(!$conn->connect_error){


  $sql= "SELECT * FROM banks";
    $query_banks= mysqli_query($conn, $sql); 

    $sql= "SELECT PM.*, B.name bank FROM payment_methods PM
    JOIN banks B ON PM.id_bank = B.id
    ";
    $query_payment_methods= mysqli_query($conn, $sql); 


  $sql= "SELECT I.*, C.name,last_name,dni,phone,address, Q.amount FROM invoices I
  JOIN clients C ON I.id_client = C.id
  JOIN quote Q ON I.id_quote = Q.id 
  WHERE I.id = $idInvoice
  ";
  $query_invoice= mysqli_query($conn, $sql);
  
  if(mysqli_num_rows($query_invoice) > 0){
    $tableDetail = getInvoiceDetail($conn, $sql, $idInvoice, 'modal');
    $invoice = mysqli_fetch_array($query_invoice); 
  }

}

?>


  <div class="modal" id="modalpayInvoice<?php echo $idInvoice?>" tabindex="-1" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn-primary">
          <h5 class="modal-title textUpper"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="?" id="form<?php echo $idInvoice?>">
         <div class="modal-body">

         <div>
            <?php echo invoiceTable($invoice, $tableDetail);?>
            </div>
          
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Banco:</label>
              <select type="select" class="form-control" id="id_bank" name="id_bank">

                <option value="">-</option>
                <?php while($bank=mysqli_fetch_array($query_banks)){?>
                <option value="<?php echo $bank["id"]?>"><?php echo $bank["name"]?></option>
                  <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Metodo de pago:</label>
              <select type="select" class="form-control" id="id_payment_method" name="id_payment_method">

                <option value="">-</option>
                <?php while($paymen_method=mysqli_fetch_array($query_payment_methods)){?>
                <option value="<?php echo $paymen_method["id"]?>"><?php echo $paymen_method["name"]?></option>
                  <?php }?>
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Monto a pagar:</label>
              <input type="text" class="form-control" id="amount" name="amount">

            </div>

            
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" name="pay_invoice<?php echo $idInvoice?>" onClick="payInvoice(<?php echo $idInvoice?>)">Pagar</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <?php
  if(isset($msg)){
    ?>
    <div class="modal <?php echo isset($msg) ? 'itemBlock' : '' ?>" id="modalpayInvoiceMsg<?php echo $idInvoice?>" tabindex="-1" aria-labelledby="modalpayInvoice" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn-success">
          <h5 class="modal-title textUpper">Exitoso!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="closeModalMsg()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <div class="modal-body">
          
            <?php echo $msg?>
          
        </div>


      </div>
    </div>
  </div>
    <?php
  }else   if(isset($error)){
    ?>
    <div class="modal <?php echo isset($error) ? 'itemBlock' : '' ?>" id="modalpayInvoiceMsg<?php echo $idInvoice?>" tabindex="-1" aria-labelledby="modalpayInvoice" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn-danger">
          <h5 class="modal-title textUpper">Error</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="closeModalMsg()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
         <div class="modal-body">
          
            <?php echo $error?>
          
        </div>


      </div>
    </div>
  </div>
    <?php
  }
  ?>

<?php
}
?>




<script>
 function payInvoice(id){
   document.getElementById("form"+id).submit();
 } 

 function closeModal(id){
   $("#modalpayInvoice"+id).removeClass("itemBlock");
   window.location.href = "index.php";
 }

 function closeModalMsg(id){
   $("#modalpayInvoiceMsg"+id).removeClass("itemBlock");
   window.location.href = "index.php";
 }
</script>