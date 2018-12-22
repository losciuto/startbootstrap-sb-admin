 <?php
 if(isset($_POST['mod_p'])){

    //header("location: index.php?area=dettpers");

 }
 if(isset($_GET['uID'])){
      $id = $_GET['uID'];
      $dati = lookup("presenze_personale","*","id='". $id . "'","","1");
} else {
        header("location: index.php");
}

 ?>
 <style>
.outerDivFull { margin:50px; } 

.switchToggle input[type=checkbox]{height: 0; width: 0; visibility: hidden; position: absolute; }
.switchToggle label {cursor: pointer; text-indent: -9999px; width: 70px; max-width: 70px; height: 30px; background: #ed1010; display: block; border-radius: 100px; position: relative; }
.switchToggle label:after {content: ''; position: absolute; top: 2px; left: 2px; width: 26px; height: 26px; background: #fff; border-radius: 90px; transition: 0.3s; }
.switchToggle input:checked + label, .switchToggle input:checked + input + label  {background: #218838; }
.switchToggle input + label:before, .switchToggle input + input + label:before {content: 'No'; position: absolute; top: 5px; left: 35px; width: 26px; height: 26px; border-radius: 90px; transition: 0.3s; text-indent: 0; color: #fff; }
.switchToggle input:checked + label:before, .switchToggle input:checked + input + label:before {content: 'Sì'; position: absolute; top: 5px; left: 10px; width: 26px; height: 26px; border-radius: 90px; transition: 0.3s; text-indent: 0; color: #fff; }
.switchToggle input:checked + label:after, .switchToggle input:checked + input + label:after {left: calc(100% - 2px); transform: translateX(-100%); }
.switchToggle label:active:after {width: 60px; } 
.toggle-switchArea { margin: 10px 0 10px 0; }
 </style>
        <div class="card mb-3 shadow">
            <div class="card-header"> <i class="fas fa-user"></i> Inserimento nuovo Personale (progressivo: <?=$dati['id']?>)</div>
            <div class="card-body">
                <div class="table-responsive">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Codice:</label>
                                <input class="form-control" name="codice" id="focusedInput" type="text" placeholder="Codice (o username)" value="<?=$dati['codice_op']?>" required>
                            </div>
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">C.Fisc.:</label>
                                <input class="form-control" name="codfisc" id="focusedInput" type="text" placeholder="Codice Fiscale" value="<?= $dati['cod_fisc'] ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Nominativo:</label>
                                <input class="form-control" name="nominativo" id="focusedInput" type="text" placeholder="Nome e Cognome" value="<?= $dati['nominativo'] ?>" required>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Id. INPS:</label>
                                <input class="form-control" name="idinps" id="focusedInput" type="text" placeholder="Identificativo INPS" value="<?= $dati['id_inps'] ?>" required>
                            </div>
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Email:</label>
                                <input class="form-control" name="email" id="focusedInput" type="email" placeholder="Email" value="<?= $dati['email'] ?>">
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
                                        if($key == $dati['id_tipo_contratto']) $selected = "selected"; else $selected = "";
                                        echo '<option value="' . $key . '" '. $selected .'>' . $opcontratto . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Ore lavorative giornaliere:</label>
                                <input class="form-control" name="oregiornaliere" id="focusedInput" type="text" placeholder="Ore lavorative giornaliere" value="<?= $dati['ore_giornaliere'] ?>">
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
                                        if ($key == $dati['id_tipo_orario']) $selected = "selected";
                                        else $selected = "";
                                        echo '<option value="' . $key . '" ' . $selected . '>' . $oporario . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="col-sm-4 col-form-label" for="focusedInput">Ore Maturate:</label>
                                <input class="form-control" name="orematurate" id="focusedInput" type="text" placeholder="Ore Maturate"> 
                            </div>
                        </div>   
                        <div class="row">
                            <div class="col">
                                <label class="col-sm-5 col-form-label" for="focusedInput">Operativo?</label>
                                <div class="switchToggle">
                                    <?php $checked = "";
                                    if ($dati['operativo'] == "1") $checked = "checked"; ?>
                                    <input type="checkbox" id="switch" <?= $checked ?> name="operativo"> 
                                    <label for="switch">Operativo?</label>
                                </div>
                            </div> 
                            <div class="col">
                                <label class="col-sm-5 col-form-label" for="inlineFormCustomSelect">Presente?</label>
                                <div class="switchToggle">
                                    <?php $checked = "";
                                    if ($dati['presente'] == "1") $checked = "checked"; ?>
                                    <input type="checkbox" id="switch1" <?= $checked ?> name="presente"> 
                                    <label for="switch1">Presente?</label>
                                </div>
                            </div> 
                            <div class="col">
                                <label class="col-sm-5 col-form-label" for="inlineFormCustomSelect">In Pausa?</label>
                                <div class="switchToggle">
                                    <?php $checked = "";
                                    if ($dati['inpausa'] == "1") $checked = "checked"; ?>
                                    <input type="checkbox" id="switch2" <?= $checked ?> name="inpausa"> 
                                    <label for="switch2">In Pausa?</label>
                                </div>
                            </div> 
                        </div><br />     
                        <input type="hidden" name="orematurate" value="0">                         
                        <button type="submit" onclick="return confirmMod()" class="btn btn-primary" name="mod_p">Conferma Modifica</button>
                    </form>
				</div>
			</div><!--/span-->
		</div><!--/row-->
