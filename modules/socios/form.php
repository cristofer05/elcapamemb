 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar nuevo socio
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=socios"> Socios </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/socios/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo,6) as codigo FROM socios
                                                ORDER BY codigo DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 1;
              }


              $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
              $codigo = "CAP-$buat_id";
              ?>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo QR</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombres</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombres" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidos" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Cedula / RNC</label>
                <div class="col-sm-5">
                  <input type="number" id="cedula" class="form-control" name="cedula" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                <div class="col-sm-5">
                  <input type="date" name="fnacimiento" class="form-control" autocomplete="off" step="1" value="<?php echo date("Y-m-d");?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="sexo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Localidad</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="localidad" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Azua">Azua</option>
                    <option value="Bahoruco">Bahoruco</option>
                    <option value="Barahona">Barahona</option>
                    <option value="Dajabón">Dajabón</option>
                    <option value="Distrito Nacional">Distrito Nacional</option>
                    <option value="Duarte">Duarte</option>
                    <option value="Elías Piña">Elías Piña</option>
                    <option value="El Seibo">El Seibo</option>
                    <option value="Espaillat">Espaillat</option>
                    <option value="Hato Mayor">Hato Mayor</option>
                    <option value="Hermanas Mirabal">Hermanas Mirabal</option>
                    <option value="Independencia">Independencia</option>
                    <option value="La Altagracia">La Altagracia</option>
                    <option value="La Romana">La Romana</option>
                    <option value="La Vega">La Vega</option>
                    <option value="María Trinidad Sánchez">María Trinidad Sánchez</option>
                    <option value="Monseñor Nouel">Monseñor Nouel</option>
                    <option value="Monte Cristi">Monte Cristi</option>
                    <option value="Monte Plata">Monte Plata</option>
                    <option value="Pedernales">Pedernales</option>
                    <option value="Peravia">Peravia</option>
                    <option value="Puerto Plata">Puerto Plata</option>
                    <option value="Samaná">Samaná</option>
                    <option value="San Cristóbal">San Cristóbal</option>
                    <option value="San José de Ocoa">San José de Ocoa</option>
                    <option value="San Juan">San Juan</option>
                    <option value="San Pedro de Macorís">San Pedro de Macorís</option>
                    <option value="Sánchez Ramírez">Sánchez Ramírez</option>
                    <option value="Santiago">Santiago</option>
                    <option value="Santiago Rodríguez">Santiago Rodríguez</option>
                    <option value="Santo Domingo">Santo Domingo</option>
                    <option value="Valverde">Valverde</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Ocupacion</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="ocupacion" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Abogado">Abogado</option>
                    <option value="Académico">Académico</option>
                    <option value="Adjunto">Adjunto</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Agrónomo">Agrónomo</option>
                    <option value="Alergólogo">Alergólogo</option>
                    <option value="Alergista">Alergista</option>
                    <option value="Almacenero">Almacenero</option>
                    <option value="Almacenista">Almacenista</option>
                    <option value="Anatomista">Anatomista</option>
                    <option value="Anestesiólogo">Anestesiólogo</option>
                    <option value="Anestesista">Anestesista</option>
                    <option value="Antologista">Antologista</option>
                    <option value="Antropólogo">Antropólogo</option>
                    <option value="Arabista">Arabista</option>
                    <option value="Archivero">Archivero</option>
                    <option value="Arqueólogo">Arqueólogo</option>
                    <option value="Arquitecto">Arquitecto</option>
                    <option value="Asesor">Asesor</option>
                    <option value="Asistente">Asistente</option>
                    <option value="Astrofísico">Astrofísico</option>
                    <option value="Astrólogo">Astrólogo</option>
                    <option value="Astrónomo">Astrónomo</option>
                    <option value="Atleta">Atleta</option>
                    <option value="ATS">ATS</option>
                    <option value="Autor">Autor</option>
                    <option value="Auxiliar">Auxiliar</option>
                    <option value="Avicultor">Avicultor</option>
                    <option value="Bacteriólogo">Bacteriólogo</option>
                    <option value="Bedel">Bedel</option>
                    <option value="Bibliógrafo">Bibliógrafo</option>
                    <option value="Bibliotecario">Bibliotecario</option>
                    <option value="Biofísico">Biofísico</option>
                    <option value="Biógrafo">Biógrafo</option>
                    <option value="Biólogo">Biólogo</option>
                    <option value="Bioquímico">Bioquímico</option>
                    <option value="Botánico">Botánico</option>
                    <option value="Cancerólogo">Cancerólogo</option>
                    <option value="Cardiólogo">Cardiólogo</option>
                    <option value="Cartógrafo">Cartógrafo</option>
                    <option value="Castrador">Castrador</option>
                    <option value="Catedrático">Catedrático</option>
                    <option value="Cirujano">Cirujano</option>
                    <option value="Citólogo">Citólogo</option>
                    <option value="Climatólogo">Climatólogo</option>
                    <option value="Codirector">Codirector</option>
                    <option value="Comadrón">Comadrón</option>
                    <option value="Consejero">Consejero</option>
                    <option value="Conserje">Conserje</option>
                    <option value="Conservador">Conservador</option>
                    <option value="Coordinador">Coordinador</option>
                    <option value="Cosmógrafo">Cosmógrafo</option>
                    <option value="Cosmólogo">Cosmólogo</option>
                    <option value="Criminalista">Criminalista</option>
                    <option value="Cronólogo">Cronólogo</option>
                    <option value="Decano">Decano</option>
                    <option value="Decorador">Decorador</option>
                    <option value="Defensor">Defensor</option>
                    <option value="Delegado">Delegado</option>
                    <option value="Delineante">Delineante</option>
                    <option value="Demógrafo">Demógrafo</option>
                    <option value="Dentista">Dentista</option>
                    <option value="Dermatólogo">Dermatólogo</option>
                    <option value="Dibujante">Dibujante</option>
                    <option value="Directivo">Directivo</option>
                    <option value="Director">Director</option>
                    <option value="Dirigente">Dirigente</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Documentalista">Documentalista</option>
                    <option value="Ecólogo">Ecólogo</option>
                    <option value="Economista">Economista</option>
                    <option value="Educador">Educador</option>
                    <option value="Egiptólogo">Egiptólogo</option>
                    <option value="Endocrinólogo">Endocrinólogo</option>
                    <option value="Enfermero">Enfermero</option>
                    <option value="Enólogo">Enólogo</option>
                    <option value="Entomólogo">Entomólogo</option>
                    <option value="Epidemiólogo">Epidemiólogo</option>
                    <option value="Especialista">Especialista</option>
                    <option value="Espeleólogo">Espeleólogo</option>
                    <option value="Estadista">Estadista</option>
                    <option value="Estadístico">Estadístico</option>
                    <option value="Etimólogo">Etimólogo</option>
                    <option value="Etimologista">Etimologista</option>
                    <option value="Etnógrafo">Etnógrafo</option>
                    <option value="Etnólogo">Etnólogo</option>
                    <option value="Etólogo">Etólogo</option>
                    <option value="Examinador">Examinador</option>
                    <option value="Facultativo">Facultativo</option>
                    <option value="Farmacéutico">Farmacéutico</option>
                    <option value="Farmacólogo">Farmacólogo</option>
                    <option value="Filólogo">Filólogo</option>
                    <option value="Filósofo">Filósofo</option>
                    <option value="Fiscal">Fiscal</option>
                    <option value="Físico">Físico</option>
                    <option value="Fisiólogo">Fisiólogo</option>
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                    <option value="Fonetista">Fonetista</option>
                    <option value="Foníatra">Foníatra</option>
                    <option value="Fonólogo">Fonólogo</option>
                    <option value="Forense">Forense</option>
                    <option value="Fotógrafo">Fotógrafo</option>
                    <option value="Funcionario">Funcionario</option>
                    <option value="Gemólogo">Gemólogo</option>
                    <option value="Genetista">Genetista</option>
                    <option value="Geobotánica">Geobotánica</option>
                    <option value="Geodesta">Geodesta</option>
                    <option value="Geofísico">Geofísico</option>
                    <option value="Geógrafo">Geógrafo</option>
                    <option value="Geólogo">Geólogo</option>
                    <option value="Geomántico">Geomántico</option>
                    <option value="Geómetra">Geómetra</option>
                    <option value="Geoquímica">Geoquímica</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Geriatra">Geriatra</option>
                    <option value="Gerontólogo">Gerontólogo</option>
                    <option value="Gestor">Gestor</option>
                    <option value="Grabador">Grabador</option>
                    <option value="Graduado social">Graduado social</option>
                    <option value="Grafólogo">Grafólogo</option>
                    <option value="Gramático">Gramático</option>
                    <option value="Hematólogo">Hematólogo</option>
                    <option value="Hepatólogo">Hepatólogo</option>
                    <option value="Hidrogeólogo">Hidrogeólogo</option>
                    <option value="Hidrógrafo">Hidrógrafo</option>
                    <option value="Hidrólogo">Hidrólogo</option>
                    <option value="Higienista">Higienista</option>
                    <option value="Hispanista">Hispanista</option>
                    <option value="Historiador">Historiador</option>
                    <option value="Homeópata">Homeópata</option>
                    <option value="Informático">Informático</option>
                    <option value="Ingeniero">Ingeniero</option>
                    <option value="Ingeniero técnico">Ingeniero técnico</option>
                    <option value="Inmunólogo">Inmunólogo</option>
                    <option value="Inspector">Inspector</option>
                    <option value="Interino">Interino</option>
                    <option value="Interventor">Interventor</option>
                    <option value="Investigador">Investigador</option>
                    <option value="Jardinero">Jardinero</option>
                    <option value="Jefe">Jefe</option>
                    <option value="Juez">Juez</option>
                    <option value="Latinista">Latinista</option>
                    <option value="Lector">Lector</option>
                    <option value="Letrado (abogado)">Letrado (abogado)</option>
                    <option value="Lexicógrafo">Lexicógrafo</option>
                    <option value="Lexicólogo">Lexicólogo</option>
                    <option value="Licenciado">Licenciado</option>
                    <option value="Lingüista">Lingüista</option>
                    <option value="Logopeda">Logopeda</option>
                    <option value="Maestro">Maestro</option>
                    <option value="Matemático">Matemático</option>
                    <option value="Matrón">Matrón</option>
                    <option value="Medico">Medico</option>
                    <option value="Meteorólogo">Meteorólogo</option>
                    <option value="Micólogo">Micólogo</option>
                    <option value="Microbiológico">Microbiológico</option>
                    <option value="Microcirujano">Microcirujano</option>
                    <option value="Mimógrafo">Mimógrafo</option>
                    <option value="Mineralogista">Mineralogista</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Musicólogo">Musicólogo</option>
                    <option value="Naturópata">Naturópata</option>
                    <option value="Nefrólogo">Nefrólogo</option>
                    <option value="Neumólogo">Neumólogo</option>
                    <option value="Neuroanatomista">Neuroanatomista</option>
                    <option value="Neurobiólogo">Neurobiólogo</option>
                    <option value="Neurocirujano">Neurocirujano</option>
                    <option value="Neuroembriólogo">Neuroembriólogo</option>
                    <option value="Neurofisiólogo">Neurofisiólogo</option>
                    <option value="Neurólogo">Neurólogo</option>
                    <option value="Nutrólogo">Nutrólogo</option>
                    <option value="Oceanógrafo">Oceanógrafo</option>
                    <option value="Odontólogo">Odontólogo</option>
                    <option value="Oficial">Oficial</option>
                    <option value="Oficinista">Oficinista</option>
                    <option value="Oftalmólogo">Oftalmólogo</option>
                    <option value="Oncólogo">Oncólogo</option>
                    <option value="Óptico">Óptico</option>
                    <option value="Optometrista">Optometrista</option>
                    <option value="Ordenanza">Ordenanza</option>
                    <option value="Orientador">Orientador</option>
                    <option value="Ornitólogo">Ornitólogo</option>
                    <option value="Ortopédico">Ortopédico</option>
                    <option value="Ortopedista">Ortopedista</option>
                    <option value="Osteólogo">Osteólogo</option>
                    <option value="Osteópata">Osteópata</option>
                    <option value="Otorrinolaringólogo">Otorrinolaringólogo</option>
                    <option value="Paleobiólogo">Paleobiólogo</option>
                    <option value="Paleobotánico">Paleobotánico</option>
                    <option value="Paleógrafo">Paleógrafo</option>
                    <option value="Paleólogo">Paleólogo</option>
                    <option value="Paleontólogo">Paleontólogo</option>
                    <option value="Patólogo">Patólogo</option>
                    <option value="Pedagogo">Pedagogo</option>
                    <option value="Pediatra">Pediatra</option>
                    <option value="Pedicuro">Pedicuro</option>
                    <option value="Periodista">Periodista</option>
                    <option value="Perito">Perito</option>
                    <option value="Ingeniero técnico">Ingeniero técnico</option>
                    <option value="Piscicultor">Piscicultor</option>
                    <option value="Podólogo">Podólogo</option>
                    <option value="Portero">Portero</option>
                    <option value="Prehistoriador">Prehistoriador</option>
                    <option value="Presidente">Presidente</option>
                    <option value="Proctólogo">Proctólogo</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Programador">Programador</option>
                    <option value="Protésico">Protésico</option>
                    <option value="Proveedor">Proveedor</option>
                    <option value="Psicoanalista">Psicoanalista</option>
                    <option value="Psicólogo">Psicólogo</option>
                    <option value="Psicofísico">Psicofísico</option>
                    <option value="Psicopedagogo">Psicopedagogo</option>
                    <option value="Psicoterapeuta">Psicoterapeuta</option>
                    <option value="Psiquiatra">Psiquiatra</option>
                    <option value="Publicista">Publicista</option>
                    <option value="Publicitario">Publicitario</option>
                    <option value="Puericultor">Puericultor</option>
                    <option value="Químico">Químico</option>
                    <option value="Quiropráctico">Quiropráctico</option>
                    <option value="Radioastrónomo">Radioastrónomo</option>
                    <option value="Radiofonista">Radiofonista</option>
                    <option value="Radiólogo">Radiólogo</option>
                    <option value="Radiotécnico">Radiotécnico</option>
                    <option value="Radiotelefonista">Radiotelefonista</option>
                    <option value="Radiotelegrafista">Radiotelegrafista</option>
                    <option value="Radioterapeuta">Radioterapeuta</option>
                    <option value="Rector">Rector</option>
                    <option value="Sanitario">Sanitario</option>
                    <option value="Secretario">Secretario</option>
                    <option value="Sexólogo">Sexólogo</option>
                    <option value="Sismólogo">Sismólogo</option>
                    <option value="Sociólogo">Sociólogo</option>
                    <option value="Subdelegado">Subdelegado</option>
                    <option value="Subdirector">Subdirector</option>
                    <option value="Subsecretario">Subsecretario</option>
                    <option value="Técnico">Técnico</option>
                    <option value="Telefonista">Telefonista</option>
                    <option value="Teólogo">Teólogo</option>
                    <option value="Terapeuta">Terapeuta</option>
                    <option value="Tocoginecólogo">Tocoginecólogo</option>
                    <option value="Tocólogo">Tocólogo</option>
                    <option value="Toxicólogo">Toxicólogo</option>
                    <option value="Traductor">Traductor</option>
                    <option value="Transcriptor">Transcriptor</option>
                    <option value="Traumatólogo">Traumatólogo</option>
                    <option value="Tutor">Tutor</option>
                    <option value="Urólogo">Urólogo</option>
                    <option value="Veterinario">Veterinario</option>
                    <option value="Vicedecano">Vicedecano</option>
                    <option value="Vicedirector">Vicedirector</option>
                    <option value="Vicegerente">Vicegerente</option>
                    <option value="Vicepresidente">Vicepresidente</option>
                    <option value="Vicerrector">Vicerrector</option>
                    <option value="Vicesecretario">Vicesecretario</option>
                    <option value="Virólogo">Virólogo</option>
                    <option value="Viticultor">Viticultor</option>
                    <option value="Vulcanólogo">Vulcanólogo</option>
                    <option value="Xilógrafo">Xilógrafo</option>
                    <option value="Zoólogo">Zoólogo</option>
                    <option value="Zootécnico">Zootécnico</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="correo" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono 1</label>
                <div class="col-sm-5">
                  <input type="tel" id="telefono" class="form-control" name="telefono" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono 2</label>
                <div class="col-sm-5">
                  <input type="tel" id="telefono2" class="form-control" name="telefono2" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="categoria" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="A">ALUMNO</option>
                    <option value="B">ALUMNO - PREMIUM</option>
                    <option value="C">CENTRO DE CAPACITACION</option>
                    <option value="F">FACILIADOR</option>
                    <option value="E">ESTABLECIMIENTO</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Creacion</label>
                <div class="col-sm-5">
                    <input type="date" name="created_date" class="form-control" autocomplete="off"  value="<?php echo date("Y-m-d");?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Expiracion</label>
                <div class="col-sm-5">
                    <input type="date" name="fexpiracion" class="form-control" autocomplete="off" step="1" min="2018-01-01" max="2099-12-31" value="<?php echo date("Y-m-d");?>">
                </div>
              </div>
            </div><!-- /.box body -->
            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=socios" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) { 

      $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion,created_date FROM socios WHERE codigo='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ver o Editar Miembro
    </h1>
    <a href="javascript:void(0)" onclick="HaEdicion();" class="btn btn-warning btn-reset">Ver/Editar</a>
    <a data-toggle="tooltip" data-placement="top" target="_blank" title="Imprimir" class="btn btn-primary" href="modules/socios/print.php?&id=<?php echo $data['codigo'];?>"><i style="color:#fff" class="glyphicon glyphicon-print"></i> Imprimir</a>

    <a data-toggle="tooltip" data-placement="top" title="Enviar tarjeta" class="btn btn-default" href="modules/socios/enviar_tarjeta.php?&id=<?php echo $data['codigo'];?>" onclick="loading()"><i style="color:#3c8dbc" class="glyphicon glyphicon-envelope"></i> Enviar Tarjeta</a>
    
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=socios"> socios </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
        <div class="popup">
            <img class="popupimage" id="myPopup" src="assets/img/email.webp" width="400">
        </div>
        <div class="black-background" id="myBackground"></div>
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/socios/proses.php?act=update" method="POST" id="Editar">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $data['codigo']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombres</label>
                <div class="col-sm-5">
                  <input type="text" id="hedicion1" class="form-control" name="nombres" autocomplete="off" value="<?php echo $data['nombres']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-5">
                  <input type="text" id="hedicion2" class="form-control" name="apellidos" autocomplete="off" value="<?php echo $data['apellidos']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Cedula / RNC</label>
                <div class="col-sm-5">
                  <input type="text" id="hedicion3" id="cedula" class="form-control" name="cedula" autocomplete="off" value="<?php echo $data['cedula']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                <div class="col-sm-5">
                  <input type="date" id="hedicion4" name="fnacimiento" class="form-control" autocomplete="off" step="1" value="<?php echo $data['fnacimiento']; ?>"> 
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" id="hedicion5" name="sexo" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['sexo']; ?>">
                    <?php switch ($data['sexo']) {
                        case "F": echo "Femenino"; break;
                        case "M": echo "Masculino"; break;
                        } ?>
                    </option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Localidad</label>
                <div class="col-sm-5">
                  <select class="chosen-select" id="hedicion6" name="localidad" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['localidad']; ?>"><?php echo $data['localidad']; ?></option>
                    <option value="Azua">Azua</option>
                    <option value="Bahoruco">Bahoruco</option>
                    <option value="Barahona">Barahona</option>
                    <option value="Dajabón">Dajabón</option>
                    <option value="Distrito Nacional">Distrito Nacional</option>
                    <option value="Duarte">Duarte</option>
                    <option value="Elías Piña">Elías Piña</option>
                    <option value="El Seibo">El Seibo</option>
                    <option value="Espaillat">Espaillat</option>
                    <option value="Hato Mayor">Hato Mayor</option>
                    <option value="Hermanas Mirabal">Hermanas Mirabal</option>
                    <option value="Independencia">Independencia</option>
                    <option value="La Altagracia">La Altagracia</option>
                    <option value="La Romana">La Romana</option>
                    <option value="La Vega">La Vega</option>
                    <option value="María Trinidad Sánchez">María Trinidad Sánchez</option>
                    <option value="Monseñor Nouel">Monseñor Nouel</option>
                    <option value="Monte Cristi">Monte Cristi</option>
                    <option value="Monte Plata">Monte Plata</option>
                    <option value="Pedernales">Pedernales</option>
                    <option value="Peravia">Peravia</option>
                    <option value="Puerto Plata">Puerto Plata</option>
                    <option value="Samaná">Samaná</option>
                    <option value="San Cristóbal">San Cristóbal</option>
                    <option value="San José de Ocoa">San José de Ocoa</option>
                    <option value="San Juan">San Juan</option>
                    <option value="San Pedro de Macorís">San Pedro de Macorís</option>
                    <option value="Sánchez Ramírez">Sánchez Ramírez</option>
                    <option value="Santiago">Santiago</option>
                    <option value="Santiago Rodríguez">Santiago Rodríguez</option>
                    <option value="Santo Domingo">Santo Domingo</option>
                    <option value="Valverde">Valverde</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Ocupacion</label>
                <div class="col-sm-5">
                  <select class="chosen-select" id="hedicion7" name="ocupacion" autocomplete="off" required>
                    <option value="<?php echo $data['ocupacion']; ?>"><?php echo $data['ocupacion']; ?></option>
                    <option value=""></option>
                    <option value="Abogado">Abogado</option>
                    <option value="Académico">Académico</option>
                    <option value="Adjunto">Adjunto</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Agrónomo">Agrónomo</option>
                    <option value="Alergólogo">Alergólogo</option>
                    <option value="Alergista">Alergista</option>
                    <option value="Almacenero">Almacenero</option>
                    <option value="Almacenista">Almacenista</option>
                    <option value="Anatomista">Anatomista</option>
                    <option value="Anestesiólogo">Anestesiólogo</option>
                    <option value="Anestesista">Anestesista</option>
                    <option value="Antologista">Antologista</option>
                    <option value="Antropólogo">Antropólogo</option>
                    <option value="Arabista">Arabista</option>
                    <option value="Archivero">Archivero</option>
                    <option value="Arqueólogo">Arqueólogo</option>
                    <option value="Arquitecto">Arquitecto</option>
                    <option value="Asesor">Asesor</option>
                    <option value="Asistente">Asistente</option>
                    <option value="Astrofísico">Astrofísico</option>
                    <option value="Astrólogo">Astrólogo</option>
                    <option value="Astrónomo">Astrónomo</option>
                    <option value="Atleta">Atleta</option>
                    <option value="ATS">ATS</option>
                    <option value="Autor">Autor</option>
                    <option value="Auxiliar">Auxiliar</option>
                    <option value="Avicultor">Avicultor</option>
                    <option value="Bacteriólogo">Bacteriólogo</option>
                    <option value="Bedel">Bedel</option>
                    <option value="Bibliógrafo">Bibliógrafo</option>
                    <option value="Bibliotecario">Bibliotecario</option>
                    <option value="Biofísico">Biofísico</option>
                    <option value="Biógrafo">Biógrafo</option>
                    <option value="Biólogo">Biólogo</option>
                    <option value="Bioquímico">Bioquímico</option>
                    <option value="Botánico">Botánico</option>
                    <option value="Cancerólogo">Cancerólogo</option>
                    <option value="Cardiólogo">Cardiólogo</option>
                    <option value="Cartógrafo">Cartógrafo</option>
                    <option value="Castrador">Castrador</option>
                    <option value="Catedrático">Catedrático</option>
                    <option value="Cirujano">Cirujano</option>
                    <option value="Citólogo">Citólogo</option>
                    <option value="Climatólogo">Climatólogo</option>
                    <option value="Codirector">Codirector</option>
                    <option value="Comadrón">Comadrón</option>
                    <option value="Consejero">Consejero</option>
                    <option value="Conserje">Conserje</option>
                    <option value="Conservador">Conservador</option>
                    <option value="Coordinador">Coordinador</option>
                    <option value="Cosmógrafo">Cosmógrafo</option>
                    <option value="Cosmólogo">Cosmólogo</option>
                    <option value="Criminalista">Criminalista</option>
                    <option value="Cronólogo">Cronólogo</option>
                    <option value="Decano">Decano</option>
                    <option value="Decorador">Decorador</option>
                    <option value="Defensor">Defensor</option>
                    <option value="Delegado">Delegado</option>
                    <option value="Delineante">Delineante</option>
                    <option value="Demógrafo">Demógrafo</option>
                    <option value="Dentista">Dentista</option>
                    <option value="Dermatólogo">Dermatólogo</option>
                    <option value="Dibujante">Dibujante</option>
                    <option value="Directivo">Directivo</option>
                    <option value="Director">Director</option>
                    <option value="Dirigente">Dirigente</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Documentalista">Documentalista</option>
                    <option value="Ecólogo">Ecólogo</option>
                    <option value="Economista">Economista</option>
                    <option value="Educador">Educador</option>
                    <option value="Egiptólogo">Egiptólogo</option>
                    <option value="Endocrinólogo">Endocrinólogo</option>
                    <option value="Enfermero">Enfermero</option>
                    <option value="Enólogo">Enólogo</option>
                    <option value="Entomólogo">Entomólogo</option>
                    <option value="Epidemiólogo">Epidemiólogo</option>
                    <option value="Especialista">Especialista</option>
                    <option value="Espeleólogo">Espeleólogo</option>
                    <option value="Estadista">Estadista</option>
                    <option value="Estadístico">Estadístico</option>
                    <option value="Etimólogo">Etimólogo</option>
                    <option value="Etimologista">Etimologista</option>
                    <option value="Etnógrafo">Etnógrafo</option>
                    <option value="Etnólogo">Etnólogo</option>
                    <option value="Etólogo">Etólogo</option>
                    <option value="Examinador">Examinador</option>
                    <option value="Facultativo">Facultativo</option>
                    <option value="Farmacéutico">Farmacéutico</option>
                    <option value="Farmacólogo">Farmacólogo</option>
                    <option value="Filólogo">Filólogo</option>
                    <option value="Filósofo">Filósofo</option>
                    <option value="Fiscal">Fiscal</option>
                    <option value="Físico">Físico</option>
                    <option value="Fisiólogo">Fisiólogo</option>
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                    <option value="Fonetista">Fonetista</option>
                    <option value="Foníatra">Foníatra</option>
                    <option value="Fonólogo">Fonólogo</option>
                    <option value="Forense">Forense</option>
                    <option value="Fotógrafo">Fotógrafo</option>
                    <option value="Funcionario">Funcionario</option>
                    <option value="Gemólogo">Gemólogo</option>
                    <option value="Genetista">Genetista</option>
                    <option value="Geobotánica">Geobotánica</option>
                    <option value="Geodesta">Geodesta</option>
                    <option value="Geofísico">Geofísico</option>
                    <option value="Geógrafo">Geógrafo</option>
                    <option value="Geólogo">Geólogo</option>
                    <option value="Geomántico">Geomántico</option>
                    <option value="Geómetra">Geómetra</option>
                    <option value="Geoquímica">Geoquímica</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Geriatra">Geriatra</option>
                    <option value="Gerontólogo">Gerontólogo</option>
                    <option value="Gestor">Gestor</option>
                    <option value="Grabador">Grabador</option>
                    <option value="Graduado social">Graduado social</option>
                    <option value="Grafólogo">Grafólogo</option>
                    <option value="Gramático">Gramático</option>
                    <option value="Hematólogo">Hematólogo</option>
                    <option value="Hepatólogo">Hepatólogo</option>
                    <option value="Hidrogeólogo">Hidrogeólogo</option>
                    <option value="Hidrógrafo">Hidrógrafo</option>
                    <option value="Hidrólogo">Hidrólogo</option>
                    <option value="Higienista">Higienista</option>
                    <option value="Hispanista">Hispanista</option>
                    <option value="Historiador">Historiador</option>
                    <option value="Homeópata">Homeópata</option>
                    <option value="Informático">Informático</option>
                    <option value="Ingeniero">Ingeniero</option>
                    <option value="Ingeniero técnico">Ingeniero técnico</option>
                    <option value="Inmunólogo">Inmunólogo</option>
                    <option value="Inspector">Inspector</option>
                    <option value="Interino">Interino</option>
                    <option value="Interventor">Interventor</option>
                    <option value="Investigador">Investigador</option>
                    <option value="Jardinero">Jardinero</option>
                    <option value="Jefe">Jefe</option>
                    <option value="Juez">Juez</option>
                    <option value="Latinista">Latinista</option>
                    <option value="Lector">Lector</option>
                    <option value="Letrado (abogado)">Letrado (abogado)</option>
                    <option value="Lexicógrafo">Lexicógrafo</option>
                    <option value="Lexicólogo">Lexicólogo</option>
                    <option value="Licenciado">Licenciado</option>
                    <option value="Lingüista">Lingüista</option>
                    <option value="Logopeda">Logopeda</option>
                    <option value="Maestro">Maestro</option>
                    <option value="Matemático">Matemático</option>
                    <option value="Matrón">Matrón</option>
                    <option value="Medico">Medico</option>
                    <option value="Meteorólogo">Meteorólogo</option>
                    <option value="Micólogo">Micólogo</option>
                    <option value="Microbiológico">Microbiológico</option>
                    <option value="Microcirujano">Microcirujano</option>
                    <option value="Mimógrafo">Mimógrafo</option>
                    <option value="Mineralogista">Mineralogista</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Musicólogo">Musicólogo</option>
                    <option value="Naturópata">Naturópata</option>
                    <option value="Nefrólogo">Nefrólogo</option>
                    <option value="Neumólogo">Neumólogo</option>
                    <option value="Neuroanatomista">Neuroanatomista</option>
                    <option value="Neurobiólogo">Neurobiólogo</option>
                    <option value="Neurocirujano">Neurocirujano</option>
                    <option value="Neuroembriólogo">Neuroembriólogo</option>
                    <option value="Neurofisiólogo">Neurofisiólogo</option>
                    <option value="Neurólogo">Neurólogo</option>
                    <option value="Nutrólogo">Nutrólogo</option>
                    <option value="Oceanógrafo">Oceanógrafo</option>
                    <option value="Odontólogo">Odontólogo</option>
                    <option value="Oficial">Oficial</option>
                    <option value="Oficinista">Oficinista</option>
                    <option value="Oftalmólogo">Oftalmólogo</option>
                    <option value="Oncólogo">Oncólogo</option>
                    <option value="Óptico">Óptico</option>
                    <option value="Optometrista">Optometrista</option>
                    <option value="Ordenanza">Ordenanza</option>
                    <option value="Orientador">Orientador</option>
                    <option value="Ornitólogo">Ornitólogo</option>
                    <option value="Ortopédico">Ortopédico</option>
                    <option value="Ortopedista">Ortopedista</option>
                    <option value="Osteólogo">Osteólogo</option>
                    <option value="Osteópata">Osteópata</option>
                    <option value="Otorrinolaringólogo">Otorrinolaringólogo</option>
                    <option value="Paleobiólogo">Paleobiólogo</option>
                    <option value="Paleobotánico">Paleobotánico</option>
                    <option value="Paleógrafo">Paleógrafo</option>
                    <option value="Paleólogo">Paleólogo</option>
                    <option value="Paleontólogo">Paleontólogo</option>
                    <option value="Patólogo">Patólogo</option>
                    <option value="Pedagogo">Pedagogo</option>
                    <option value="Pediatra">Pediatra</option>
                    <option value="Pedicuro">Pedicuro</option>
                    <option value="Periodista">Periodista</option>
                    <option value="Perito">Perito</option>
                    <option value="Ingeniero técnico">Ingeniero técnico</option>
                    <option value="Piscicultor">Piscicultor</option>
                    <option value="Podólogo">Podólogo</option>
                    <option value="Portero">Portero</option>
                    <option value="Prehistoriador">Prehistoriador</option>
                    <option value="Presidente">Presidente</option>
                    <option value="Proctólogo">Proctólogo</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Programador">Programador</option>
                    <option value="Protésico">Protésico</option>
                    <option value="Proveedor">Proveedor</option>
                    <option value="Psicoanalista">Psicoanalista</option>
                    <option value="Psicólogo">Psicólogo</option>
                    <option value="Psicofísico">Psicofísico</option>
                    <option value="Psicopedagogo">Psicopedagogo</option>
                    <option value="Psicoterapeuta">Psicoterapeuta</option>
                    <option value="Psiquiatra">Psiquiatra</option>
                    <option value="Publicista">Publicista</option>
                    <option value="Publicitario">Publicitario</option>
                    <option value="Puericultor">Puericultor</option>
                    <option value="Químico">Químico</option>
                    <option value="Quiropráctico">Quiropráctico</option>
                    <option value="Radioastrónomo">Radioastrónomo</option>
                    <option value="Radiofonista">Radiofonista</option>
                    <option value="Radiólogo">Radiólogo</option>
                    <option value="Radiotécnico">Radiotécnico</option>
                    <option value="Radiotelefonista">Radiotelefonista</option>
                    <option value="Radiotelegrafista">Radiotelegrafista</option>
                    <option value="Radioterapeuta">Radioterapeuta</option>
                    <option value="Rector">Rector</option>
                    <option value="Sanitario">Sanitario</option>
                    <option value="Secretario">Secretario</option>
                    <option value="Sexólogo">Sexólogo</option>
                    <option value="Sismólogo">Sismólogo</option>
                    <option value="Sociólogo">Sociólogo</option>
                    <option value="Subdelegado">Subdelegado</option>
                    <option value="Subdirector">Subdirector</option>
                    <option value="Subsecretario">Subsecretario</option>
                    <option value="Técnico">Técnico</option>
                    <option value="Telefonista">Telefonista</option>
                    <option value="Teólogo">Teólogo</option>
                    <option value="Terapeuta">Terapeuta</option>
                    <option value="Tocoginecólogo">Tocoginecólogo</option>
                    <option value="Tocólogo">Tocólogo</option>
                    <option value="Toxicólogo">Toxicólogo</option>
                    <option value="Traductor">Traductor</option>
                    <option value="Transcriptor">Transcriptor</option>
                    <option value="Traumatólogo">Traumatólogo</option>
                    <option value="Tutor">Tutor</option>
                    <option value="Urólogo">Urólogo</option>
                    <option value="Veterinario">Veterinario</option>
                    <option value="Vicedecano">Vicedecano</option>
                    <option value="Vicedirector">Vicedirector</option>
                    <option value="Vicegerente">Vicegerente</option>
                    <option value="Vicepresidente">Vicepresidente</option>
                    <option value="Vicerrector">Vicerrector</option>
                    <option value="Vicesecretario">Vicesecretario</option>
                    <option value="Virólogo">Virólogo</option>
                    <option value="Viticultor">Viticultor</option>
                    <option value="Vulcanólogo">Vulcanólogo</option>
                    <option value="Xilógrafo">Xilógrafo</option>
                    <option value="Zoólogo">Zoólogo</option>
                    <option value="Zootécnico">Zootécnico</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" id="hedicion8" class="form-control" name="correo" autocomplete="off" value="<?php echo $data['correo']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="tel" id="hedicion9" class="form-control" name="telefono" autocomplete="off" value="<?php echo $data['telefono']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-5">
                  <select class="chosen-select" id="hedicion10" name="categoria" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value="<?php echo $data['categoria']; ?>">
                    <?php switch ($data['categoria']) {
                        case "A": echo "ALUMNO"; break;
                        case "B": echo "ALUMNO - PREMIUM"; break;
                        case "C": echo "CENTRO DE CAPACITACION"; break;
                        case "F": echo "FACILIADOR"; break;
                        case "E": echo "ESTABLECIMIENTO"; break;}  ?>
                    </option>
                    <option value="A">ALUMNO</option>
                    <option value="B">ALUMNO - PREMIUM</option>
                    <option value="C">CENTRO DE CAPACITACION</option>
                    <option value="F">FACILIADOR</option>
                    <option value="E">ESTABLECIMIENTO</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Creacion</label>
                <div class="col-sm-5">
                    <input type="date" name="created_date" class="form-control" autocomplete="off"  value="<?php echo $data['created_date']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Expiracion</label>
                <div class="col-sm-5">
                    <input type="date" id="hedicion11" name="fexpiracion" class="form-control" autocomplete="off" step="1" min="2018-01-01" max="2099-12-31" value="<?php echo $data['fexpiracion']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=socios" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        <!-- FORMULARIO DE SOLO VER -->

          <form class="form-horizontal" id="Ver">
            <div class="box-body">
 
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <?php echo $data['codigo']; ?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombres</label>
                <div class="col-sm-5">
                  <?php echo $data['nombres']; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-5">
                  <?php echo $data['apellidos']; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Cedula / RNC</label>
                <div class="col-sm-5">
                 <?php echo $data['cedula']; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                <div class="col-sm-5">
                 <?php echo $data['fnacimiento']; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-5">
                    <?php switch ($data['sexo']) {
                        case "F": echo "F"; break;
                        case "M": echo "M"; break;
                        } ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Localidad</label>
                <div class="col-sm-5">
                  <?php echo $data['localidad']; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Ocupacion</label>
                <div class="col-sm-5">
                 <?php echo $data['ocupacion']; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                 <?php echo $data['correo']; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <?php echo $data['telefono']; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-5">
                    <?php switch ($data['categoria']) {
                        case "A": echo "ALUMNO"; break;
                        case "B": echo "ALUMNO - PREMIUM"; break;
                        case "C": echo "CENTRO DE CAPACITACION"; break;
                        case "F": echo "FACILIADOR"; break;
                        case "E": echo "ESTABLECIMIENTO"; break;}  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Expiracion</label>
                <div class="col-sm-5">
                    <?php echo $data['fexpiracion']; ?>
                </div>
              </div>
            </div><!-- /.box body -->
          <form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>

<script type="text/javascript">
    function loading() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");

        var background = document.getElementById("myBackground");
        background.classList.toggle("show-background");    
    }
</script>