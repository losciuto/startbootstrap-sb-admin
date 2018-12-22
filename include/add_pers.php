        <?php
        if (isset($_POST['reg_p'])) {

            $errors = array();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "pixpresenze";

            $conn = new mysqli($servername, $username, $password, $dbname);
            
            $codice = mysqli_real_escape_string($conn, trim($_POST['codice']));
            $codfisc = mysqli_real_escape_string($conn, trim($_POST['codfisc']));
            $nominativo = mysqli_real_escape_string($conn, trim($_POST['nominativo']));
            $idinps = mysqli_real_escape_string($conn, trim($_POST['idinps']));
            $email = mysqli_real_escape_string($conn, trim($_POST['email']));
            $contratto = mysqli_real_escape_string($conn, trim($_POST['contratto']));
            $orario = mysqli_real_escape_string($conn, trim($_POST['orario']));
            $operativo = mysqli_real_escape_string($conn, trim($_POST['operativo']));
            $orematurate = $_POST['orematurate'];
            $oregiornaliere = $_POST['oregiornaliere'];

            if (empty($codice)) {
                array_push($errors, "Codice necessario");
            }
            if (empty($codfisc)) {
                array_push($errors, "Codice Fiscale necessario");
            }
            if (empty($nomintivo)) {
                array_push($errors, "Nominativo necessario");
            }
            if (empty($idinps)) {
                array_push($errors, "Identificativo INPS necessario");
            }
            if (empty($contratto)) {
                array_push($errors, "Codifica Contratto necessaria");
            }
            if (empty($orario)) {
                array_push($errors, "Codifica Orario necessaria");
            }
            if (empty($operativo)) {
                array_push($errors, "Condizione operativa necessaria");
            }

            if (count($errors) == 0) {         
                // Check connessione
                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }
                $sql = "INSERT INTO presenze_personale (codice_op,cod_fisc,nominativo,email,id_inps,id_tipo_contratto,id_tipo_orario,operativo,ore_maturate,ore_giornaliere)
                        VALUES ('$codice','$codfisc','$nominativo','$email','$idinps','$contratto','$orario','$operativo', '$orematurate', '$oregiornaliere')";
                if ($conn->query($sql) === true) {
                    echo "alert('Nuovo record inserito')";
                } else {
                    //echo "Error: " . $sql . "<br>" . $conn->error;
                    echo '<div class = "alert alert-danger alert-dismissible fade show" role = "alert" >
                        <strong >Errore: </strong > ' . $sql . '.<br />' . $conn->error . '
                        <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close" >
                        <span aria-hidden = "true" > &times; </span >
                        </button >
                        </div >';
                }
                $conn->close();
                //echo "<script>alert('ci sono passato')</script>";
            } else { // in presenza di errori

                foreach ($errors as $error) {
                    $errori .= $error . "<br />";
                }

                echo '<div class = "alert alert-danger alert-dismissible fade show" role = "alert" >
                    <strong >Errori: </strong ><br />' . $errori . '
                    <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close" >
                    <span aria-hidden = "true" > &times; </span >
                    </button >
                    </div >'; 

            }

        }
        ?>
        <div class="card mb-3 shadow">
            <div class="card-header"> <i class="fas fa-user"></i> Inserimento nuovo Personale</div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="index.php?area=add_pers">
                        <div class="row">
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Codice:</label>
                                <input class="form-control" name="codice" id="focusedInput" type="text" placeholder="Codice (o username)" required>
                            </div>
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">C.Fisc.:</label>
                                <input class="form-control" name="codfisc" id="focusedInput" type="text" placeholder="Codice Fiscale" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Nominativo:</label>
                                <input class="form-control" name="nominativo" id="focusedInput" type="text" placeholder="Nome e Cognome" required>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Id. INPS:</label>
                                <input class="form-control" name="idinps" id="focusedInput" type="text" placeholder="Identificativo INPS" required>
                            </div>
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Email:</label>
                                <input class="form-control" name="email" id="focusedInput" type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Contratto:</label>
                                <!-- <input class="form-control" name="contratto" id="focusedInput" type="text" placeholder="Contratto"> -->
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="contratto" required>
                                    <option selected value="">Scegli il Contratto da attribuire.</option>
                                    <?php 
                                    $contratti = lookup("presenze_contratti", "descrizione");
                                    foreach ($contratti as $key => $opcontratto) {
                                        echo '<option value="' . $key . '">' . $opcontratto . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Ore lavorative giornaliere:</label>
                                <input class="form-control" name="oregiornaliere" id="focusedInput" type="text" placeholder="Ore lavorative giornaliere" value="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Orario:</label>
                                <!-- <input class="form-control" name="orario" id="focusedInput" type="text" placeholder="Orario"> -->
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="orario" required>
                                    <option selected value="">Scegli l'Orario da attribuire.</option>
                                    <?php 
                                    $orari = lookup("presenze_orari", "descrizione");
                                    foreach ($orari as $key => $oporario) {
                                        echo '<option value="' . $key . '">' . $oporario . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Operativo:</label>
                                <!-- <input class="form-control" name="operativo" id="focusedInput" type="text" placeholder="Operativo o meno"> -->
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="operativo" required>
                                    <option selected value="">Scegli l'Orario da attribuire.</option>
                                    <option value="1">Sì</option>
                                    <option value="0">No</option>
                                </select>
                            </div> 
                        </div><br />     
                        <input type="hidden" name="orematurate" value="0">                         
                        <button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="reg_p">Inserisci</button>
                    </form>
				</div>
			</div><!--/span-->
		</div><!--/row-->
