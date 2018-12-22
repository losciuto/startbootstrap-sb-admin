          <!-- DataTables Example -->
          <div class="card mb-3 shadow">
            <div class="card-header">
              <i class="fas fa-table"></i>
             Anagrafica Personale</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="text-center">
                    <tr>
                      <th>Codice</th>
                      <th>Nominativo</th>
                      <th>Cod. Fisc.</th>
                      <th>Tipo Conratto</th>
                      <th>Tipo Orario</th>
                      <th>Ore Maturate</th>
                      <th>Operativo</th>
                      <th>Presente</th>
                      <th>In Pausa</th>
                      <th>Azioni</th>
                    </tr>
                  </thead>
                  <tfoot class="text-center">
                    <tr>
                      <th>Codice</th>
                      <th>Nominativo</th>
                      <th>Cod. Fisc.</th>
                      <th>Tipo Conratto</th>
                      <th>Tipo Orario</th>
                      <th>Ore Maturate</th>
                      <th>Operativo</th>
                      <th>Presente</th>
                      <th>In Pausa</th>
                      <th>Azioni</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                        include('server.php');
                        $sql = "SELECT * FROM presenze_personale";
                        $results = mysqli_query($db,$sql) or die("Errore: " . $sql . "<br/>" . mysqli_error($db));
                        while ($row = mysqli_fetch_array($results)) {
                    ?>
                    <tr>
                      <td class="text-right"><?php echo $row['codice_op']; ?></td>
                      <td><?php echo $row['nominativo']; ?></td>
                      <td class="text-center"><?php echo $row['cod_fisc']; ?></td>
                      <td class="text-right"><?php echo $row['id_tipo_contratto']; ?></td>
                      <td class="text-right"><?php echo $row['id_tipo_orario']; ?></td>
                      <td class="text-right"><?php echo $row['ore_maturate']; ?></td>
                      <td class="text-right"><?php if($row['operativo'] == 1) echo "Sì"; else echo "No"; ?></td>
                      <td class="text-right"><?php if($row['presente'] == 1) echo "Sì"; else echo "No"; ?></td>
                      <td class="text-right"><?php if($row['inpausa'] == 1) echo "Sì"; else echo "No"; ?></td>
                      <td class="text-center">
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Modifica">
                          <a class="btn btn-info btn-primary" href="index.php?area=edit_pers&uID=<?php echo $row['id']; ?>">
                              <i class="fas fa-edit"></i>
                          </a>
                        </span>
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Cancella">
                          <a class="btn btn-danger" onclick="return confirmDel()" href="index.php?area=del_pers&delID=<?php echo $row['id']; ?>">
                              <i class="fas fa-trash-alt"></i>
                          </a>
                        </span>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>
