        <?php
        if (isset($_POST['reg_p'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pixpresenze";

            $conn = new mysqli($servername, $username, $password, $dbname);
            
            $codice = mysqli_real_escape_string($conn, $_POST['codice']);
            $codfisc = mysqli_real_escape_string($conn, $_POST['codfisc']);
            $nomintivo = mysqli_real_escape_string($conn, $_POST['nomintivo']);
            $contratto = mysqli_real_escape_string($conn, $_POST['contratto']);
            $orario = mysqli_real_escape_string($conn, $_POST['orario']);
            $operativo = mysqli_real_escape_string($conn, $_POST['operativo']);

            // Check connessione
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "INSERT INTO presenze_personale (codice_op,cod_fisc,nominativo,id_tipo_contratto,id_tipo_orario,operativo)
                    VALUES ('$codice','$codfisc','$nominativo','$contratto','$orario','$operativo')";
            if ($conn->query($sql) === true) {
                echo "alert('Nuovo record inserito')";
            } else {
                //echo "Error: " . $sql . "<br>" . $conn->error;
                echo '<div class = "alert alert-danger alert-dismissible fade show" role = "alert" >
                      <strong >Error: </strong > ' . $sql . '.<br />' . $conn->error . '
                      <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close" >
                      <span aria-hidden = "true" > &times; </span >
                      </button >
                      </div >';
            }
            $conn->close();
            //echo "<script>alert('ci sono passato')</script>";
        }
        ?>
        <div class="card mb-3">
            <div class="card-header"> <i class="fas fa-user"></i> Inserimento nuovo Personale</div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="index.php?dataarea=add_pers">
                        <div class="row">
                            <div class="col">
                                <label class="control-label" for="focusedInput">Codice:</label>
                                <input class="form-control" name="codice" id="focusedInput" type="text" placeholder="Codice (o username)">
                            </div>
                            <div class="col">
                                <label class="control-label" for="focusedInput">Codice Fiscale:</label>
                                <input class="form-control" name="codfisc" id="focusedInput" type="text" placeholder="Codice Fiscale">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="control-label" for="focusedInput">Nominativo:</label>
                                <input class="form-control" name="nominativo" id="focusedInput" type="text" placeholder="Nome e Cognome">
                            </div>
                            <div class="col">
                                <label class="control-label" for="focusedInput">Contratto:</label>
                                <!-- <input class="form-control" name="contratto" id="focusedInput" type="text" placeholder="Contratto"> -->
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="contratto">
                                    <option selected value="">Scegli il Contratto da attribuire.</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="control-label" for="focusedInput">Oario:</label>
                                <!-- <input class="form-control" name="orario" id="focusedInput" type="text" placeholder="Orario"> -->
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="orario">
                                    <option selected value="">Scegli l'Orario da attribuire.</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option> 
                                </select>
                            </div>
                            <div class="col">
                                <label class="control-label" for="focusedInput">Operativo:</label>
                                <!-- <input class="form-control" name="operativo" id="focusedInput" type="text" placeholder="Operativo o meno"> -->
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="operativo">
                                    <option selected value="">Scegli l'Orario da attribuire.</option>
                                    <option value="1">Sì</option>
                                    <option value="2">No</option>
                                </select>
                            </div> 
                        </div><br />                              
                        <button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="reg_p">Inserisci</button>
                    </form>
				</div>
			</div><!--/span-->
		</div><!--/row-->
