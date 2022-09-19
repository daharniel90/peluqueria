<?php

function invoiceTable($invoice, $tableDetail){



$table = "

                  <table id='example2' class='table table-borderless'>";
                 
                      
                        $idInvoice = $invoice["id"];
                        $createAt = $invoice["created_at"];
                        $name = $invoice["name"].' '.$invoice["last_name"];
                        $dni = $invoice["dni"];
                        $address = $invoice["address"];
                        $phone = $invoice["phone"];
                        
                        $table.= "
                          <tr>
                            <td>N# de factura:  $idInvoice</td>
                            <td>fecha: $createAt</td>
                          </tr>
                          <tr>
                            <td>Facturar a: $name</td>
                          </tr>
                          <tr>
                            <td>C.I.: $dni</td>
                          </tr>
                          <tr>
                            <td>Direccion: $address</td>
                          </tr>
                          <tr>
                            <td>Telefono: $phone</td>
                          </tr>";
                     

                    if(isset($tableDetail)){
                      $table.= "<tr>
                                  $tableDetail
                                </tr>" ;
                    }else{
                      $table.= "<tr>
                        <td></td>
                      </tr>" ;
                    }
                
                    
                  $table .= "
                  </table>
";

return $table;

}?>