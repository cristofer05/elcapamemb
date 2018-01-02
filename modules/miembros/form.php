 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Nuevo Miembros
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=miembros"> Miembros </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/miembros/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo,6) as codigo FROM miembros
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
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-2">
                  <img src="https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chs=150x150&chl=<?php echo $codigo; ?>">
                </div>
              </div>
              

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
                <label class="col-sm-2 control-label">Cedula</label>
                <div class="col-sm-5">
                  <input type="text" id="cedula" class="form-control" name="cedula" autocomplete="off" required>
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
                    <option value="Abogada">Abogada</option>
                    <option value="Académico">Académico</option>
                    <option value="Académica">Académica</option>
                    <option value="Adjunto">Adjunto</option>
                    <option value="Adjunta">Adjunta</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Administradora">Administradora</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Administrativa">Administrativa</option>
                    <option value="Agrónomo">Agrónomo</option>
                    <option value="Agrónoma">Agrónoma</option>
                    <option value="Alergólogo">Alergólogo</option>
                    <option value="Alergista">Alergista</option>
                    <option value="Alergóloga">Alergóloga</option>
                    <option value="Alergista">Alergista</option>
                    <option value="Almacenero">Almacenero</option>
                    <option value="Almacenista">Almacenista</option>
                    <option value="Almacenera">Almacenera</option>
                    <option value="Almacenista">Almacenista</option>
                    <option value="Anatomista">Anatomista</option>
                    <option value="Anatomista">Anatomista</option>
                    <option value="Anestesiólogo">Anestesiólogo</option>
                    <option value="Anestesista">Anestesista</option>
                    <option value="Anestesióloga">Anestesióloga</option>
                    <option value="Anestesista">Anestesista</option>
                    <option value="Antologista">Antologista</option>
                    <option value="Antologista">Antologista</option>
                    <option value="Antropólogo">Antropólogo</option>
                    <option value="Antropóloga">Antropóloga</option>
                    <option value="Arabista">Arabista</option>
                    <option value="Arabista">Arabista</option>
                    <option value="Archivero">Archivero</option>
                    <option value="Archivera">Archivera</option>
                    <option value="Arqueólogo">Arqueólogo</option>
                    <option value="Arqueóloga">Arqueóloga</option>
                    <option value="Arquitecto">Arquitecto</option>
                    <option value="Arquitecta">Arquitecta</option>
                    <option value="Asesor">Asesor</option>
                    <option value="Asesora">Asesora</option>
                    <option value="Asistente">Asistente</option>
                    <option value="Asistenta">Asistenta</option>
                    <option value="Astrofísico">Astrofísico</option>
                    <option value="Astrofísica">Astrofísica</option>
                    <option value="Astrólogo">Astrólogo</option>
                    <option value="Astróloga">Astróloga</option>
                    <option value="Astrónomo">Astrónomo</option>
                    <option value="Astrónoma">Astrónoma</option>
                    <option value="Atleta">Atleta</option>
                    <option value="Atleta">Atleta</option>
                    <option value="ATS">ATS</option>
                    <option value="ATS">ATS</option>
                    <option value="Autor">Autor</option>
                    <option value="Autora">Autora</option>
                    <option value="Auxiliar">Auxiliar</option>
                    <option value="Auxiliar">Auxiliar</option>
                    <option value="Avicultor">Avicultor</option>
                    <option value="Avicultora">Avicultora</option>
                    <option value="Bacteriólogo">Bacteriólogo</option>
                    <option value="Bacterióloga">Bacterióloga</option>
                    <option value="Bedel">Bedel</option>
                    <option value="Bedela">Bedela</option>
                    <option value="Bibliógrafo">Bibliógrafo</option>
                    <option value="Bibliógrafa">Bibliógrafa</option>
                    <option value="Bibliotecario">Bibliotecario</option>
                    <option value="Bibliotecaria">Bibliotecaria</option>
                    <option value="Biofísico">Biofísico</option>
                    <option value="Biofísica">Biofísica</option>
                    <option value="Biógrafo">Biógrafo</option>
                    <option value="Biógrafa">Biógrafa</option>
                    <option value="Biólogo">Biólogo</option>
                    <option value="Bióloga">Bióloga</option>
                    <option value="Bioquímico">Bioquímico</option>
                    <option value="Bioquímica">Bioquímica</option>
                    <option value="Botánico">Botánico</option>
                    <option value="Botánica">Botánica</option>
                    <option value="Cancerólogo">Cancerólogo</option>
                    <option value="Canceróloga">Canceróloga</option>
                    <option value="Cardiólogo">Cardiólogo</option>
                    <option value="Cardióloga">Cardióloga</option>
                    <option value="Cartógrafo">Cartógrafo</option>
                    <option value="Cartógrafa">Cartógrafa</option>
                    <option value="Castrador">Castrador</option>
                    <option value="Castradora">Castradora</option>
                    <option value="Catedrático">Catedrático</option>
                    <option value="Catedrática">Catedrática</option>
                    <option value="Cirujano">Cirujano</option>
                    <option value="Cirujana">Cirujana</option>
                    <option value="Citólogo">Citólogo</option>
                    <option value="Citóloga">Citóloga</option>
                    <option value="Climatólogo">Climatólogo</option>
                    <option value="Climatóloga">Climatóloga</option>
                    <option value="Codirector">Codirector</option>
                    <option value="Codirectora">Codirectora</option>
                    <option value="Comadrón">Comadrón</option>
                    <option value="Comadrona">Comadrona</option>
                    <option value="Consejero">Consejero</option>
                    <option value="Consejera">Consejera</option>
                    <option value="Conserje">Conserje</option>
                    <option value="Conserje">Conserje</option>
                    <option value="Conservador">Conservador</option>
                    <option value="Conservadora">Conservadora</option>
                    <option value="Coordinador">Coordinador</option>
                    <option value="Coordinadora">Coordinadora</option>
                    <option value="Cosmógrafo">Cosmógrafo</option>
                    <option value="Cosmógrafa">Cosmógrafa</option>
                    <option value="Cosmólogo">Cosmólogo</option>
                    <option value="Cosmóloga">Cosmóloga</option>
                    <option value="Criminalista">Criminalista</option>
                    <option value="Criminalista">Criminalista</option>
                    <option value="Cronólogo">Cronólogo</option>
                    <option value="Cronóloga">Cronóloga</option>
                    <option value="Decano">Decano</option>
                    <option value="Decana">Decana</option>
                    <option value="Decorador">Decorador</option>
                    <option value="Decoradora">Decoradora</option>
                    <option value="Defensor">Defensor</option>
                    <option value="Defensora">Defensora</option>
                    <option value="Delegado">Delegado</option>
                    <option value="Delegada">Delegada</option>
                    <option value="Delineante">Delineante</option>
                    <option value="Delineante">Delineante</option>
                    <option value="Demógrafo">Demógrafo</option>
                    <option value="Demógrafa">Demógrafa</option>
                    <option value="Dentista">Dentista</option>
                    <option value="Dentista">Dentista</option>
                    <option value="Dermatólogo">Dermatólogo</option>
                    <option value="Dermatóloga">Dermatóloga</option>
                    <option value="Dibujante">Dibujante</option>
                    <option value="Dibujante">Dibujante</option>
                    <option value="Directivo">Directivo</option>
                    <option value="Directiva">Directiva</option>
                    <option value="Director">Director</option>
                    <option value="Directora">Directora</option>
                    <option value="Dirigente">Dirigente</option>
                    <option value="Dirigente">Dirigente</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Doctora">Doctora</option>
                    <option value="Documentalista">Documentalista</option>
                    <option value="Documentalista">Documentalista</option>
                    <option value="Ecólogo">Ecólogo</option>
                    <option value="Ecóloga">Ecóloga</option>
                    <option value="Economista">Economista</option>
                    <option value="Economista">Economista</option>
                    <option value="Educador">Educador</option>
                    <option value="Educadora">Educadora</option>
                    <option value="Egiptólogo">Egiptólogo</option>
                    <option value="Egiptóloga">Egiptóloga</option>
                    <option value="Endocrinólogo">Endocrinólogo</option>
                    <option value="Endocrinóloga">Endocrinóloga</option>
                    <option value="Enfermero">Enfermero</option>
                    <option value="Enfermera">Enfermera</option>
                    <option value="Enólogo">Enólogo</option>
                    <option value="Enóloga">Enóloga</option>
                    <option value="Entomólogo">Entomólogo</option>
                    <option value="Entomóloga">Entomóloga</option>
                    <option value="Epidemiólogo">Epidemiólogo</option>
                    <option value="Epidemióloga">Epidemióloga</option>
                    <option value="Especialista">Especialista</option>
                    <option value="Especialista">Especialista</option>
                    <option value="Espeleólogo">Espeleólogo</option>
                    <option value="Espeleóloga">Espeleóloga</option>
                    <option value="Estadista">Estadista</option>
                    <option value="Estadista">Estadista</option>
                    <option value="Estadístico">Estadístico</option>
                    <option value="Estadística">Estadística</option>
                    <option value="Etimólogo">Etimólogo</option>
                    <option value="Etimologista">Etimologista</option>
                    <option value="Etimóloga">Etimóloga</option>
                    <option value="Etimologista">Etimologista</option>
                    <option value="Etnógrafo">Etnógrafo</option>
                    <option value="Etnógrafa">Etnógrafa</option>
                    <option value="Etnólogo">Etnólogo</option>
                    <option value="Etnóloga">Etnóloga</option>
                    <option value="Etólogo">Etólogo</option>
                    <option value="Etóloga">Etóloga</option>
                    <option value="Examinador">Examinador</option>
                    <option value="Examinadora">Examinadora</option>
                    <option value="Facultativo">Facultativo</option>
                    <option value="Facultativa">Facultativa</option>
                    <option value="Farmacéutico">Farmacéutico</option>
                    <option value="Farmacéutica">Farmacéutica</option>
                    <option value="Farmacólogo">Farmacólogo</option>
                    <option value="Farmacóloga">Farmacóloga</option>
                    <option value="Filólogo">Filólogo</option>
                    <option value="Filóloga">Filóloga</option>
                    <option value="Filósofo">Filósofo</option>
                    <option value="Filósofa">Filósofa</option>
                    <option value="Fiscal">Fiscal</option>
                    <option value="Fiscal">Fiscal</option>
                    <option value="Físico">Físico</option>
                    <option value="Física">Física</option>
                    <option value="Fisiólogo">Fisiólogo</option>
                    <option value="Fisióloga">Fisióloga</option>
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                    <option value="Fonetista">Fonetista</option>
                    <option value="Fonetista">Fonetista</option>
                    <option value="Foníatra">Foníatra</option>
                    <option value="Foníatra">Foníatra</option>
                    <option value="Fonólogo">Fonólogo</option>
                    <option value="Fonóloga">Fonóloga</option>
                    <option value="Forense">Forense</option>
                    <option value="Forense">Forense</option>
                    <option value="Fotógrafo">Fotógrafo</option>
                    <option value="Fotógrafa">Fotógrafa</option>
                    <option value="Funcionario">Funcionario</option>
                    <option value="Funcionaria">Funcionaria</option>
                    <option value="Gemólogo">Gemólogo</option>
                    <option value="Gemóloga">Gemóloga</option>
                    <option value="Genetista">Genetista</option>
                    <option value="Genetista">Genetista</option>
                    <option value="Geobotánica">Geobotánica</option>
                    <option value="Geobotánica">Geobotánica</option>
                    <option value="Geodesta">Geodesta</option>
                    <option value="Geodesta">Geodesta</option>
                    <option value="Geofísico">Geofísico</option>
                    <option value="Geofísica">Geofísica</option>
                    <option value="Geógrafo">Geógrafo</option>
                    <option value="Geógrafa">Geógrafa</option>
                    <option value="Geólogo">Geólogo</option>
                    <option value="Geóloga">Geóloga</option>
                    <option value="Geomántico">Geomántico</option>
                    <option value="Geomántica">Geomántica</option>
                    <option value="Geómetra">Geómetra</option>
                    <option value="Geómetra">Geómetra</option>
                    <option value="Geoquímica">Geoquímica</option>
                    <option value="Geoquímica">Geoquímica</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Gerenta/gerente">Gerenta/gerente</option>
                    <option value="Geriatra">Geriatra</option>
                    <option value="Geriatra">Geriatra</option>
                    <option value="Gerontólogo">Gerontólogo</option>
                    <option value="Gerontóloga">Gerontóloga</option>
                    <option value="Gestor">Gestor</option>
                    <option value="Gestora">Gestora</option>
                    <option value="Grabador">Grabador</option>
                    <option value="Grabadora">Grabadora</option>
                    <option value="Graduado">Graduado</option>
                    <option value="social">social</option>
                    <option value="Graduada">Graduada</option>
                    <option value="social">social</option>
                    <option value="Grafólogo">Grafólogo</option>
                    <option value="Grafóloga">Grafóloga</option>
                    <option value="Gramático">Gramático</option>
                    <option value="Gramática">Gramática</option>
                    <option value="Hematólogo">Hematólogo</option>
                    <option value="Hematóloga">Hematóloga</option>
                    <option value="Hepatólogo">Hepatólogo</option>
                    <option value="Hepatóloga">Hepatóloga</option>
                    <option value="Hidrogeólogo">Hidrogeólogo</option>
                    <option value="Hidrogeóloga">Hidrogeóloga</option>
                    <option value="Hidrógrafo">Hidrógrafo</option>
                    <option value="Hidrógrafa">Hidrógrafa</option>
                    <option value="Hidrólogo">Hidrólogo</option>
                    <option value="Hidróloga">Hidróloga</option>
                    <option value="Higienista">Higienista</option>
                    <option value="Higienista">Higienista</option>
                    <option value="Hispanista">Hispanista</option>
                    <option value="Hispanista">Hispanista</option>
                    <option value="Historiador">Historiador</option>
                    <option value="Historiadora">Historiadora</option>
                    <option value="Homeópata">Homeópata</option>
                    <option value="Homeópata">Homeópata</option>
                    <option value="Informático">Informático</option>
                    <option value="Informática">Informática</option>
                    <option value="Ingeniero">Ingeniero</option>
                    <option value="Ingeniera">Ingeniera</option>
                    <option value="Ingeniero">Ingeniero</option>
                    <option value="técnico">técnico</option>
                    <option value="Ingeniera">Ingeniera</option>
                    <option value="técnica">técnica</option>
                    <option value="Inmunólogo">Inmunólogo</option>
                    <option value="Inmunóloga">Inmunóloga</option>
                    <option value="Inspector">Inspector</option>
                    <option value="Inspectora">Inspectora</option>
                    <option value="Interino">Interino</option>
                    <option value="Interina">Interina</option>
                    <option value="Interventor">Interventor</option>
                    <option value="Interventora">Interventora</option>
                    <option value="Investigador">Investigador</option>
                    <option value="Investigadora">Investigadora</option>
                    <option value="Jardinero">Jardinero</option>
                    <option value="Jardinera">Jardinera</option>
                    <option value="Jefe">Jefe</option>
                    <option value="Jefa/jefe">Jefa/jefe</option>
                    <option value="Juez">Juez</option>
                    <option value="Jueza/juez">Jueza/juez</option>
                    <option value="Latinista">Latinista</option>
                    <option value="Latinista">Latinista</option>
                    <option value="Lector">Lector</option>
                    <option value="Lectora">Lectora</option>
                    <option value="Letrado">Letrado</option>
                    <option value="(abogado)">(abogado)</option>
                    <option value="Letrada">Letrada</option>
                    <option value="(abogada)">(abogada)</option>
                    <option value="Lexicógrafo">Lexicógrafo</option>
                    <option value="Lexicógrafa">Lexicógrafa</option>
                    <option value="Lexicólogo">Lexicólogo</option>
                    <option value="Lexicóloga">Lexicóloga</option>
                    <option value="Licenciado">Licenciado</option>
                    <option value="Licenciada">Licenciada</option>
                    <option value="Lingüista">Lingüista</option>
                    <option value="Lingüista">Lingüista</option>
                    <option value="Logopeda">Logopeda</option>
                    <option value="Logopeda">Logopeda</option>
                    <option value="Maestro">Maestro</option>
                    <option value="Maestra">Maestra</option>
                    <option value="Matemático">Matemático</option>
                    <option value="Matemática">Matemática</option>
                    <option value="Matrón">Matrón</option>
                    <option value="Matrona">Matrona</option>
                    <option value="Medico">Medico</option>
                    <option value="Medica">Medica</option>
                    <option value="Meteorólogo">Meteorólogo</option>
                    <option value="Meteoróloga">Meteoróloga</option>
                    <option value="Micólogo">Micólogo</option>
                    <option value="Micóloga">Micóloga</option>
                    <option value="Microbiológico">Microbiológico</option>
                    <option value="Microbiológica">Microbiológica</option>
                    <option value="Microcirujano">Microcirujano</option>
                    <option value="Microcirujana">Microcirujana</option>
                    <option value="Mimógrafo">Mimógrafo</option>
                    <option value="Mimógrafa">Mimógrafa</option>
                    <option value="Mineralogista">Mineralogista</option>
                    <option value="Mineralogista">Mineralogista</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Monitora">Monitora</option>
                    <option value="Musicólogo">Musicólogo</option>
                    <option value="Musicóloga">Musicóloga</option>
                    <option value="Naturópata">Naturópata</option>
                    <option value="Naturópata">Naturópata</option>
                    <option value="Nefrólogo">Nefrólogo</option>
                    <option value="Nefróloga">Nefróloga</option>
                    <option value="Neumólogo">Neumólogo</option>
                    <option value="Neumóloga">Neumóloga</option>
                    <option value="Neuroanatomista">Neuroanatomista</option>
                    <option value="Neuroanatomista">Neuroanatomista</option>
                    <option value="Neurobiólogo">Neurobiólogo</option>
                    <option value="Neurobióloga">Neurobióloga</option>
                    <option value="Neurocirujano">Neurocirujano</option>
                    <option value="Neurocirujano">Neurocirujano</option>
                    <option value="Neuroembriólogo">Neuroembriólogo</option>
                    <option value="Neuroembrióloga">Neuroembrióloga</option>
                    <option value="Neurofisiólogo">Neurofisiólogo</option>
                    <option value="Neurofisióloga">Neurofisióloga</option>
                    <option value="Neurólogo">Neurólogo</option>
                    <option value="Neuróloga">Neuróloga</option>
                    <option value="Nutrólogo">Nutrólogo</option>
                    <option value="Nutróloga">Nutróloga</option>
                    <option value="Oceanógrafo">Oceanógrafo</option>
                    <option value="Oceanógrafa">Oceanógrafa</option>
                    <option value="Odontólogo">Odontólogo</option>
                    <option value="Odontóloga">Odontóloga</option>
                    <option value="Oficial">Oficial</option>
                    <option value="Oficial/Oficiala">Oficial/Oficiala</option>
                    <option value="Oficinista">Oficinista</option>
                    <option value="Oficinista">Oficinista</option>
                    <option value="Oftalmólogo">Oftalmólogo</option>
                    <option value="Oftalmóloga">Oftalmóloga</option>
                    <option value="Oncólogo">Oncólogo</option>
                    <option value="Oncóloga">Oncóloga</option>
                    <option value="Óptico">Óptico</option>
                    <option value="Óptica">Óptica</option>
                    <option value="Optometrista">Optometrista</option>
                    <option value="Optomentrista">Optomentrista</option>
                    <option value="Ordenanza">Ordenanza</option>
                    <option value="Ordenanza">Ordenanza</option>
                    <option value="Orientador">Orientador</option>
                    <option value="Orientadora">Orientadora</option>
                    <option value="Ornitólogo">Ornitólogo</option>
                    <option value="Ornitóloga">Ornitóloga</option>
                    <option value="Ortopédico">Ortopédico</option>
                    <option value="Ortopédica">Ortopédica</option>
                    <option value="Ortopedista">Ortopedista</option>
                    <option value="Ortopedista">Ortopedista</option>
                    <option value="Osteólogo">Osteólogo</option>
                    <option value="Osteóloga">Osteóloga</option>
                    <option value="Osteópata">Osteópata</option>
                    <option value="Osteópata">Osteópata</option>
                    <option value="Otorrinolaringólogo">Otorrinolaringólogo</option>
                    <option value="Otorrinolaringóloga">Otorrinolaringóloga</option>
                    <option value="Paleobiólogo">Paleobiólogo</option>
                    <option value="Paleobióloga">Paleobióloga</option>
                    <option value="Paleobotánico">Paleobotánico</option>
                    <option value="Paleobotánica">Paleobotánica</option>
                    <option value="Paleógrafo">Paleógrafo</option>
                    <option value="Paleógrafa">Paleógrafa</option>
                    <option value="Paleólogo">Paleólogo</option>
                    <option value="Paleóloga">Paleóloga</option>
                    <option value="Paleontólogo">Paleontólogo</option>
                    <option value="Paleontóloga">Paleontóloga</option>
                    <option value="Patólogo">Patólogo</option>
                    <option value="Patóloga">Patóloga</option>
                    <option value="Pedagogo">Pedagogo</option>
                    <option value="Pedagoga">Pedagoga</option>
                    <option value="Pediatra">Pediatra</option>
                    <option value="Pediatra">Pediatra</option>
                    <option value="Pedicuro">Pedicuro</option>
                    <option value="Pedicura">Pedicura</option>
                    <option value="Periodista">Periodista</option>
                    <option value="Periodista">Periodista</option>
                    <option value="Perito">Perito</option>
                    <option value="Perita">Perita</option>
                    <option value="Ingeniero">Ingeniero</option>
                    <option value="técnico">técnico</option>
                    <option value="Ingeniera">Ingeniera</option>
                    <option value="técnica">técnica</option>
                    <option value="Piscicultor">Piscicultor</option>
                    <option value="Piscicultora">Piscicultora</option>
                    <option value="Podólogo">Podólogo</option>
                    <option value="Podóloga">Podóloga</option>
                    <option value="Portero">Portero</option>
                    <option value="Portera">Portera</option>
                    <option value="Prehistoriador">Prehistoriador</option>
                    <option value="Prehistoriadota">Prehistoriadota</option>
                    <option value="Presidente">Presidente</option>
                    <option value="Presidenta">Presidenta</option>
                    <option value="Proctólogo">Proctólogo</option>
                    <option value="Proctóloga">Proctóloga</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Profesora">Profesora</option>
                    <option value="Programador">Programador</option>
                    <option value="Programadora">Programadora</option>
                    <option value="Protésico">Protésico</option>
                    <option value="Protésica">Protésica</option>
                    <option value="Proveedor">Proveedor</option>
                    <option value="Proveedora">Proveedora</option>
                    <option value="Psicoanalista">Psicoanalista</option>
                    <option value="Psicoanalista">Psicoanalista</option>
                    <option value="Psicólogo">Psicólogo</option>
                    <option value="Psicóloga">Psicóloga</option>
                    <option value="Psicofísico">Psicofísico</option>
                    <option value="Psicofísica">Psicofísica</option>
                    <option value="Psicopedagogo">Psicopedagogo</option>
                    <option value="Psicopedagoga">Psicopedagoga</option>
                    <option value="Psicoterapeuta">Psicoterapeuta</option>
                    <option value="Psicoterapeuta">Psicoterapeuta</option>
                    <option value="Psiquiatra">Psiquiatra</option>
                    <option value="Psiquiatra">Psiquiatra</option>
                    <option value="Publicista">Publicista</option>
                    <option value="Publicista">Publicista</option>
                    <option value="Publicitario">Publicitario</option>
                    <option value="Publicitaria">Publicitaria</option>
                    <option value="Puericultor">Puericultor</option>
                    <option value="Puericultora">Puericultora</option>
                    <option value="Químico">Químico</option>
                    <option value="Química">Química</option>
                    <option value="Quiropráctico">Quiropráctico</option>
                    <option value="Quiropráctica">Quiropráctica</option>
                    <option value="Radioastrónomo">Radioastrónomo</option>
                    <option value="Radioastrónoma">Radioastrónoma</option>
                    <option value="Radiofonista">Radiofonista</option>
                    <option value="Radiofonista">Radiofonista</option>
                    <option value="Radiólogo">Radiólogo</option>
                    <option value="Radióloga">Radióloga</option>
                    <option value="Radiotécnico">Radiotécnico</option>
                    <option value="Radiotécnica">Radiotécnica</option>
                    <option value="Radiotelefonista">Radiotelefonista</option>
                    <option value="Radiotelefonista">Radiotelefonista</option>
                    <option value="Radiotelegrafista">Radiotelegrafista</option>
                    <option value="Radiotelegrafista">Radiotelegrafista</option>
                    <option value="Radioterapeuta">Radioterapeuta</option>
                    <option value="Radioterapeuta">Radioterapeuta</option>
                    <option value="Rector">Rector</option>
                    <option value="Rectora">Rectora</option>
                    <option value="Sanitario">Sanitario</option>
                    <option value="Sanitaria">Sanitaria</option>
                    <option value="Secretario">Secretario</option>
                    <option value="Secretaria">Secretaria</option>
                    <option value="Sexólogo">Sexólogo</option>
                    <option value="Sexóloga">Sexóloga</option>
                    <option value="Sismólogo">Sismólogo</option>
                    <option value="Sismóloga">Sismóloga</option>
                    <option value="Sociólogo">Sociólogo</option>
                    <option value="Socióloga">Socióloga</option>
                    <option value="Subdelegado">Subdelegado</option>
                    <option value="Subdelegada">Subdelegada</option>
                    <option value="Subdirector">Subdirector</option>
                    <option value="Subdirectora">Subdirectora</option>
                    <option value="Subsecretario">Subsecretario</option>
                    <option value="Subsecretaria">Subsecretaria</option>
                    <option value="Técnico">Técnico</option>
                    <option value="Técnica">Técnica</option>
                    <option value="Telefonista">Telefonista</option>
                    <option value="Telefonista">Telefonista</option>
                    <option value="Teólogo">Teólogo</option>
                    <option value="Teóloga">Teóloga</option>
                    <option value="Terapeuta">Terapeuta</option>
                    <option value="Terapeuta">Terapeuta</option>
                    <option value="Tocoginecólogo">Tocoginecólogo</option>
                    <option value="Tocoginecóloga">Tocoginecóloga</option>
                    <option value="Tocólogo">Tocólogo</option>
                    <option value="Tocóloga">Tocóloga</option>
                    <option value="Toxicólogo">Toxicólogo</option>
                    <option value="Toxicóloga">Toxicóloga</option>
                    <option value="Traductor">Traductor</option>
                    <option value="Traductora">Traductora</option>
                    <option value="Transcriptor">Transcriptor</option>
                    <option value="Transcriptora">Transcriptora</option>
                    <option value="Traumatólogo">Traumatólogo</option>
                    <option value="Traumatóloga">Traumatóloga</option>
                    <option value="Tutor">Tutor</option>
                    <option value="Tutora">Tutora</option>
                    <option value="Urólogo">Urólogo</option>
                    <option value="Uróloga">Uróloga</option>
                    <option value="Veterinario">Veterinario</option>
                    <option value="Veterinaria">Veterinaria</option>
                    <option value="Vicedecano">Vicedecano</option>
                    <option value="Vicedecana">Vicedecana</option>
                    <option value="Vicedirector">Vicedirector</option>
                    <option value="Vicedirtectora">Vicedirtectora</option>
                    <option value="Vicegerente">Vicegerente</option>
                    <option value="Vicegerente/vicegerente">Vicegerente/vicegerente</option>
                    <option value="Vicepresidente">Vicepresidente</option>
                    <option value="Vicepresidenta">Vicepresidenta</option>
                    <option value="Vicerrector">Vicerrector</option>
                    <option value="Vicerrectora">Vicerrectora</option>
                    <option value="Vicesecretario">Vicesecretario</option>
                    <option value="Vicesecretaria">Vicesecretaria</option>
                    <option value="Virólogo">Virólogo</option>
                    <option value="Viróloga">Viróloga</option>
                    <option value="Viticultor">Viticultor</option>
                    <option value="Viticultora">Viticultora</option>
                    <option value="Vulcanólogo">Vulcanólogo</option>
                    <option value="Vulcanóloga">Vulcanóloga</option>
                    <option value="Xilógrafo">Xilógrafo</option>
                    <option value="Xilógrafa">Xilógrafa</option>
                    <option value="Zoólogo">Zoólogo</option>
                    <option value="Zoóloga">Zoóloga</option>
                    <option value="Zootécnico">Zootécnico</option>
                    <option value="Zootécnica">Zootécnica</option>
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
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="tel" id="telefono" class="form-control" name="telefono" autocomplete="off" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="categoria" data-placeholder="-- Seleccionar --" autocomplete="off" required>
                    <option value=""></option>
                    <option value="A">Premium</option>
                    <option value="B">Regular</option>
                    <option value="C">Basico</option>
                  </select>
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
                  <a href="?module=miembros" class="btn btn-default btn-reset">Cancelar</a>
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

      $query = mysqli_query($mysqli, "SELECT codigo,nombres,apellidos,cedula,fnacimiento,sexo,localidad,ocupacion,correo,telefono,categoria,fexpiracion FROM miembros WHERE codigo='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Miembro
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=miembros"> Miembros </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/miembros/proses.php?act=update" method="POST">
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
                  <input type="text" id="hedicion1" class="form-control" name="nombres" autocomplete="off" value="<?php echo $data['nombres']; ?>" readonly required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-5">
                  <input type="text" id="hedicion2" class="form-control" name="apellidos" autocomplete="off" value="<?php echo $data['apellidos']; ?>" readonly required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Cedula</label>
                <div class="col-sm-5">
                  <input type="text" id="hedicion3" id="cedula" class="form-control" name="cedula" autocomplete="off" value="<?php echo $data['cedula']; ?>" readonly required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Nacimiento</label>
                <div class="col-sm-5">
                  <input type="date" id="hedicion4" name="fnacimiento" class="form-control" autocomplete="off" step="1" value="<?php echo $data['fnacimiento']; ?>" readonly> 
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" id="hedicion5" name="sexo" data-placeholder="-- Seleccionar --" autocomplete="off" readonly required>
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
                  <select class="chosen-select" id="hedicion6" name="localidad" data-placeholder="-- Seleccionar --" autocomplete="off" readonly required>
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
                  <select class="chosen-select" id="hedicion7" name="ocupacion" autocomplete="off" readonly required>
                    <option value="<?php echo $data['ocupacion']; ?>"><?php echo $data['ocupacion']; ?></option>
                    <option value=""></option>
                    <option value="Abogado">Abogado</option>
                    <option value="Abogada">Abogada</option>
                    <option value="Académico">Académico</option>
                    <option value="Académica">Académica</option>
                    <option value="Adjunto">Adjunto</option>
                    <option value="Adjunta">Adjunta</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Administradora">Administradora</option>
                    <option value="Administrativo">Administrativo</option>
                    <option value="Administrativa">Administrativa</option>
                    <option value="Agrónomo">Agrónomo</option>
                    <option value="Agrónoma">Agrónoma</option>
                    <option value="Alergólogo">Alergólogo</option>
                    <option value="Alergista">Alergista</option>
                    <option value="Alergóloga">Alergóloga</option>
                    <option value="Alergista">Alergista</option>
                    <option value="Almacenero">Almacenero</option>
                    <option value="Almacenista">Almacenista</option>
                    <option value="Almacenera">Almacenera</option>
                    <option value="Almacenista">Almacenista</option>
                    <option value="Anatomista">Anatomista</option>
                    <option value="Anatomista">Anatomista</option>
                    <option value="Anestesiólogo">Anestesiólogo</option>
                    <option value="Anestesista">Anestesista</option>
                    <option value="Anestesióloga">Anestesióloga</option>
                    <option value="Anestesista">Anestesista</option>
                    <option value="Antologista">Antologista</option>
                    <option value="Antologista">Antologista</option>
                    <option value="Antropólogo">Antropólogo</option>
                    <option value="Antropóloga">Antropóloga</option>
                    <option value="Arabista">Arabista</option>
                    <option value="Arabista">Arabista</option>
                    <option value="Archivero">Archivero</option>
                    <option value="Archivera">Archivera</option>
                    <option value="Arqueólogo">Arqueólogo</option>
                    <option value="Arqueóloga">Arqueóloga</option>
                    <option value="Arquitecto">Arquitecto</option>
                    <option value="Arquitecta">Arquitecta</option>
                    <option value="Asesor">Asesor</option>
                    <option value="Asesora">Asesora</option>
                    <option value="Asistente">Asistente</option>
                    <option value="Asistenta">Asistenta</option>
                    <option value="Astrofísico">Astrofísico</option>
                    <option value="Astrofísica">Astrofísica</option>
                    <option value="Astrólogo">Astrólogo</option>
                    <option value="Astróloga">Astróloga</option>
                    <option value="Astrónomo">Astrónomo</option>
                    <option value="Astrónoma">Astrónoma</option>
                    <option value="Atleta">Atleta</option>
                    <option value="Atleta">Atleta</option>
                    <option value="ATS">ATS</option>
                    <option value="ATS">ATS</option>
                    <option value="Autor">Autor</option>
                    <option value="Autora">Autora</option>
                    <option value="Auxiliar">Auxiliar</option>
                    <option value="Auxiliar">Auxiliar</option>
                    <option value="Avicultor">Avicultor</option>
                    <option value="Avicultora">Avicultora</option>
                    <option value="Bacteriólogo">Bacteriólogo</option>
                    <option value="Bacterióloga">Bacterióloga</option>
                    <option value="Bedel">Bedel</option>
                    <option value="Bedela">Bedela</option>
                    <option value="Bibliógrafo">Bibliógrafo</option>
                    <option value="Bibliógrafa">Bibliógrafa</option>
                    <option value="Bibliotecario">Bibliotecario</option>
                    <option value="Bibliotecaria">Bibliotecaria</option>
                    <option value="Biofísico">Biofísico</option>
                    <option value="Biofísica">Biofísica</option>
                    <option value="Biógrafo">Biógrafo</option>
                    <option value="Biógrafa">Biógrafa</option>
                    <option value="Biólogo">Biólogo</option>
                    <option value="Bióloga">Bióloga</option>
                    <option value="Bioquímico">Bioquímico</option>
                    <option value="Bioquímica">Bioquímica</option>
                    <option value="Botánico">Botánico</option>
                    <option value="Botánica">Botánica</option>
                    <option value="Cancerólogo">Cancerólogo</option>
                    <option value="Canceróloga">Canceróloga</option>
                    <option value="Cardiólogo">Cardiólogo</option>
                    <option value="Cardióloga">Cardióloga</option>
                    <option value="Cartógrafo">Cartógrafo</option>
                    <option value="Cartógrafa">Cartógrafa</option>
                    <option value="Castrador">Castrador</option>
                    <option value="Castradora">Castradora</option>
                    <option value="Catedrático">Catedrático</option>
                    <option value="Catedrática">Catedrática</option>
                    <option value="Cirujano">Cirujano</option>
                    <option value="Cirujana">Cirujana</option>
                    <option value="Citólogo">Citólogo</option>
                    <option value="Citóloga">Citóloga</option>
                    <option value="Climatólogo">Climatólogo</option>
                    <option value="Climatóloga">Climatóloga</option>
                    <option value="Codirector">Codirector</option>
                    <option value="Codirectora">Codirectora</option>
                    <option value="Comadrón">Comadrón</option>
                    <option value="Comadrona">Comadrona</option>
                    <option value="Consejero">Consejero</option>
                    <option value="Consejera">Consejera</option>
                    <option value="Conserje">Conserje</option>
                    <option value="Conserje">Conserje</option>
                    <option value="Conservador">Conservador</option>
                    <option value="Conservadora">Conservadora</option>
                    <option value="Coordinador">Coordinador</option>
                    <option value="Coordinadora">Coordinadora</option>
                    <option value="Cosmógrafo">Cosmógrafo</option>
                    <option value="Cosmógrafa">Cosmógrafa</option>
                    <option value="Cosmólogo">Cosmólogo</option>
                    <option value="Cosmóloga">Cosmóloga</option>
                    <option value="Criminalista">Criminalista</option>
                    <option value="Criminalista">Criminalista</option>
                    <option value="Cronólogo">Cronólogo</option>
                    <option value="Cronóloga">Cronóloga</option>
                    <option value="Decano">Decano</option>
                    <option value="Decana">Decana</option>
                    <option value="Decorador">Decorador</option>
                    <option value="Decoradora">Decoradora</option>
                    <option value="Defensor">Defensor</option>
                    <option value="Defensora">Defensora</option>
                    <option value="Delegado">Delegado</option>
                    <option value="Delegada">Delegada</option>
                    <option value="Delineante">Delineante</option>
                    <option value="Delineante">Delineante</option>
                    <option value="Demógrafo">Demógrafo</option>
                    <option value="Demógrafa">Demógrafa</option>
                    <option value="Dentista">Dentista</option>
                    <option value="Dentista">Dentista</option>
                    <option value="Dermatólogo">Dermatólogo</option>
                    <option value="Dermatóloga">Dermatóloga</option>
                    <option value="Dibujante">Dibujante</option>
                    <option value="Dibujante">Dibujante</option>
                    <option value="Directivo">Directivo</option>
                    <option value="Directiva">Directiva</option>
                    <option value="Director">Director</option>
                    <option value="Directora">Directora</option>
                    <option value="Dirigente">Dirigente</option>
                    <option value="Dirigente">Dirigente</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Doctora">Doctora</option>
                    <option value="Documentalista">Documentalista</option>
                    <option value="Documentalista">Documentalista</option>
                    <option value="Ecólogo">Ecólogo</option>
                    <option value="Ecóloga">Ecóloga</option>
                    <option value="Economista">Economista</option>
                    <option value="Economista">Economista</option>
                    <option value="Educador">Educador</option>
                    <option value="Educadora">Educadora</option>
                    <option value="Egiptólogo">Egiptólogo</option>
                    <option value="Egiptóloga">Egiptóloga</option>
                    <option value="Endocrinólogo">Endocrinólogo</option>
                    <option value="Endocrinóloga">Endocrinóloga</option>
                    <option value="Enfermero">Enfermero</option>
                    <option value="Enfermera">Enfermera</option>
                    <option value="Enólogo">Enólogo</option>
                    <option value="Enóloga">Enóloga</option>
                    <option value="Entomólogo">Entomólogo</option>
                    <option value="Entomóloga">Entomóloga</option>
                    <option value="Epidemiólogo">Epidemiólogo</option>
                    <option value="Epidemióloga">Epidemióloga</option>
                    <option value="Especialista">Especialista</option>
                    <option value="Especialista">Especialista</option>
                    <option value="Espeleólogo">Espeleólogo</option>
                    <option value="Espeleóloga">Espeleóloga</option>
                    <option value="Estadista">Estadista</option>
                    <option value="Estadista">Estadista</option>
                    <option value="Estadístico">Estadístico</option>
                    <option value="Estadística">Estadística</option>
                    <option value="Etimólogo">Etimólogo</option>
                    <option value="Etimologista">Etimologista</option>
                    <option value="Etimóloga">Etimóloga</option>
                    <option value="Etimologista">Etimologista</option>
                    <option value="Etnógrafo">Etnógrafo</option>
                    <option value="Etnógrafa">Etnógrafa</option>
                    <option value="Etnólogo">Etnólogo</option>
                    <option value="Etnóloga">Etnóloga</option>
                    <option value="Etólogo">Etólogo</option>
                    <option value="Etóloga">Etóloga</option>
                    <option value="Examinador">Examinador</option>
                    <option value="Examinadora">Examinadora</option>
                    <option value="Facultativo">Facultativo</option>
                    <option value="Facultativa">Facultativa</option>
                    <option value="Farmacéutico">Farmacéutico</option>
                    <option value="Farmacéutica">Farmacéutica</option>
                    <option value="Farmacólogo">Farmacólogo</option>
                    <option value="Farmacóloga">Farmacóloga</option>
                    <option value="Filólogo">Filólogo</option>
                    <option value="Filóloga">Filóloga</option>
                    <option value="Filósofo">Filósofo</option>
                    <option value="Filósofa">Filósofa</option>
                    <option value="Fiscal">Fiscal</option>
                    <option value="Fiscal">Fiscal</option>
                    <option value="Físico">Físico</option>
                    <option value="Física">Física</option>
                    <option value="Fisiólogo">Fisiólogo</option>
                    <option value="Fisióloga">Fisióloga</option>
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                    <option value="Fisioterapeuta">Fisioterapeuta</option>
                    <option value="Fonetista">Fonetista</option>
                    <option value="Fonetista">Fonetista</option>
                    <option value="Foníatra">Foníatra</option>
                    <option value="Foníatra">Foníatra</option>
                    <option value="Fonólogo">Fonólogo</option>
                    <option value="Fonóloga">Fonóloga</option>
                    <option value="Forense">Forense</option>
                    <option value="Forense">Forense</option>
                    <option value="Fotógrafo">Fotógrafo</option>
                    <option value="Fotógrafa">Fotógrafa</option>
                    <option value="Funcionario">Funcionario</option>
                    <option value="Funcionaria">Funcionaria</option>
                    <option value="Gemólogo">Gemólogo</option>
                    <option value="Gemóloga">Gemóloga</option>
                    <option value="Genetista">Genetista</option>
                    <option value="Genetista">Genetista</option>
                    <option value="Geobotánica">Geobotánica</option>
                    <option value="Geobotánica">Geobotánica</option>
                    <option value="Geodesta">Geodesta</option>
                    <option value="Geodesta">Geodesta</option>
                    <option value="Geofísico">Geofísico</option>
                    <option value="Geofísica">Geofísica</option>
                    <option value="Geógrafo">Geógrafo</option>
                    <option value="Geógrafa">Geógrafa</option>
                    <option value="Geólogo">Geólogo</option>
                    <option value="Geóloga">Geóloga</option>
                    <option value="Geomántico">Geomántico</option>
                    <option value="Geomántica">Geomántica</option>
                    <option value="Geómetra">Geómetra</option>
                    <option value="Geómetra">Geómetra</option>
                    <option value="Geoquímica">Geoquímica</option>
                    <option value="Geoquímica">Geoquímica</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Gerenta/gerente">Gerenta/gerente</option>
                    <option value="Geriatra">Geriatra</option>
                    <option value="Geriatra">Geriatra</option>
                    <option value="Gerontólogo">Gerontólogo</option>
                    <option value="Gerontóloga">Gerontóloga</option>
                    <option value="Gestor">Gestor</option>
                    <option value="Gestora">Gestora</option>
                    <option value="Grabador">Grabador</option>
                    <option value="Grabadora">Grabadora</option>
                    <option value="Graduado">Graduado</option>
                    <option value="social">social</option>
                    <option value="Graduada">Graduada</option>
                    <option value="social">social</option>
                    <option value="Grafólogo">Grafólogo</option>
                    <option value="Grafóloga">Grafóloga</option>
                    <option value="Gramático">Gramático</option>
                    <option value="Gramática">Gramática</option>
                    <option value="Hematólogo">Hematólogo</option>
                    <option value="Hematóloga">Hematóloga</option>
                    <option value="Hepatólogo">Hepatólogo</option>
                    <option value="Hepatóloga">Hepatóloga</option>
                    <option value="Hidrogeólogo">Hidrogeólogo</option>
                    <option value="Hidrogeóloga">Hidrogeóloga</option>
                    <option value="Hidrógrafo">Hidrógrafo</option>
                    <option value="Hidrógrafa">Hidrógrafa</option>
                    <option value="Hidrólogo">Hidrólogo</option>
                    <option value="Hidróloga">Hidróloga</option>
                    <option value="Higienista">Higienista</option>
                    <option value="Higienista">Higienista</option>
                    <option value="Hispanista">Hispanista</option>
                    <option value="Hispanista">Hispanista</option>
                    <option value="Historiador">Historiador</option>
                    <option value="Historiadora">Historiadora</option>
                    <option value="Homeópata">Homeópata</option>
                    <option value="Homeópata">Homeópata</option>
                    <option value="Informático">Informático</option>
                    <option value="Informática">Informática</option>
                    <option value="Ingeniero">Ingeniero</option>
                    <option value="Ingeniera">Ingeniera</option>
                    <option value="Ingeniero">Ingeniero</option>
                    <option value="técnico">técnico</option>
                    <option value="Ingeniera">Ingeniera</option>
                    <option value="técnica">técnica</option>
                    <option value="Inmunólogo">Inmunólogo</option>
                    <option value="Inmunóloga">Inmunóloga</option>
                    <option value="Inspector">Inspector</option>
                    <option value="Inspectora">Inspectora</option>
                    <option value="Interino">Interino</option>
                    <option value="Interina">Interina</option>
                    <option value="Interventor">Interventor</option>
                    <option value="Interventora">Interventora</option>
                    <option value="Investigador">Investigador</option>
                    <option value="Investigadora">Investigadora</option>
                    <option value="Jardinero">Jardinero</option>
                    <option value="Jardinera">Jardinera</option>
                    <option value="Jefe">Jefe</option>
                    <option value="Jefa/jefe">Jefa/jefe</option>
                    <option value="Juez">Juez</option>
                    <option value="Jueza/juez">Jueza/juez</option>
                    <option value="Latinista">Latinista</option>
                    <option value="Latinista">Latinista</option>
                    <option value="Lector">Lector</option>
                    <option value="Lectora">Lectora</option>
                    <option value="Letrado">Letrado</option>
                    <option value="(abogado)">(abogado)</option>
                    <option value="Letrada">Letrada</option>
                    <option value="(abogada)">(abogada)</option>
                    <option value="Lexicógrafo">Lexicógrafo</option>
                    <option value="Lexicógrafa">Lexicógrafa</option>
                    <option value="Lexicólogo">Lexicólogo</option>
                    <option value="Lexicóloga">Lexicóloga</option>
                    <option value="Licenciado">Licenciado</option>
                    <option value="Licenciada">Licenciada</option>
                    <option value="Lingüista">Lingüista</option>
                    <option value="Lingüista">Lingüista</option>
                    <option value="Logopeda">Logopeda</option>
                    <option value="Logopeda">Logopeda</option>
                    <option value="Maestro">Maestro</option>
                    <option value="Maestra">Maestra</option>
                    <option value="Matemático">Matemático</option>
                    <option value="Matemática">Matemática</option>
                    <option value="Matrón">Matrón</option>
                    <option value="Matrona">Matrona</option>
                    <option value="Medico">Medico</option>
                    <option value="Medica">Medica</option>
                    <option value="Meteorólogo">Meteorólogo</option>
                    <option value="Meteoróloga">Meteoróloga</option>
                    <option value="Micólogo">Micólogo</option>
                    <option value="Micóloga">Micóloga</option>
                    <option value="Microbiológico">Microbiológico</option>
                    <option value="Microbiológica">Microbiológica</option>
                    <option value="Microcirujano">Microcirujano</option>
                    <option value="Microcirujana">Microcirujana</option>
                    <option value="Mimógrafo">Mimógrafo</option>
                    <option value="Mimógrafa">Mimógrafa</option>
                    <option value="Mineralogista">Mineralogista</option>
                    <option value="Mineralogista">Mineralogista</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Monitora">Monitora</option>
                    <option value="Musicólogo">Musicólogo</option>
                    <option value="Musicóloga">Musicóloga</option>
                    <option value="Naturópata">Naturópata</option>
                    <option value="Naturópata">Naturópata</option>
                    <option value="Nefrólogo">Nefrólogo</option>
                    <option value="Nefróloga">Nefróloga</option>
                    <option value="Neumólogo">Neumólogo</option>
                    <option value="Neumóloga">Neumóloga</option>
                    <option value="Neuroanatomista">Neuroanatomista</option>
                    <option value="Neuroanatomista">Neuroanatomista</option>
                    <option value="Neurobiólogo">Neurobiólogo</option>
                    <option value="Neurobióloga">Neurobióloga</option>
                    <option value="Neurocirujano">Neurocirujano</option>
                    <option value="Neurocirujano">Neurocirujano</option>
                    <option value="Neuroembriólogo">Neuroembriólogo</option>
                    <option value="Neuroembrióloga">Neuroembrióloga</option>
                    <option value="Neurofisiólogo">Neurofisiólogo</option>
                    <option value="Neurofisióloga">Neurofisióloga</option>
                    <option value="Neurólogo">Neurólogo</option>
                    <option value="Neuróloga">Neuróloga</option>
                    <option value="Nutrólogo">Nutrólogo</option>
                    <option value="Nutróloga">Nutróloga</option>
                    <option value="Oceanógrafo">Oceanógrafo</option>
                    <option value="Oceanógrafa">Oceanógrafa</option>
                    <option value="Odontólogo">Odontólogo</option>
                    <option value="Odontóloga">Odontóloga</option>
                    <option value="Oficial">Oficial</option>
                    <option value="Oficial/Oficiala">Oficial/Oficiala</option>
                    <option value="Oficinista">Oficinista</option>
                    <option value="Oficinista">Oficinista</option>
                    <option value="Oftalmólogo">Oftalmólogo</option>
                    <option value="Oftalmóloga">Oftalmóloga</option>
                    <option value="Oncólogo">Oncólogo</option>
                    <option value="Oncóloga">Oncóloga</option>
                    <option value="Óptico">Óptico</option>
                    <option value="Óptica">Óptica</option>
                    <option value="Optometrista">Optometrista</option>
                    <option value="Optomentrista">Optomentrista</option>
                    <option value="Ordenanza">Ordenanza</option>
                    <option value="Ordenanza">Ordenanza</option>
                    <option value="Orientador">Orientador</option>
                    <option value="Orientadora">Orientadora</option>
                    <option value="Ornitólogo">Ornitólogo</option>
                    <option value="Ornitóloga">Ornitóloga</option>
                    <option value="Ortopédico">Ortopédico</option>
                    <option value="Ortopédica">Ortopédica</option>
                    <option value="Ortopedista">Ortopedista</option>
                    <option value="Ortopedista">Ortopedista</option>
                    <option value="Osteólogo">Osteólogo</option>
                    <option value="Osteóloga">Osteóloga</option>
                    <option value="Osteópata">Osteópata</option>
                    <option value="Osteópata">Osteópata</option>
                    <option value="Otorrinolaringólogo">Otorrinolaringólogo</option>
                    <option value="Otorrinolaringóloga">Otorrinolaringóloga</option>
                    <option value="Paleobiólogo">Paleobiólogo</option>
                    <option value="Paleobióloga">Paleobióloga</option>
                    <option value="Paleobotánico">Paleobotánico</option>
                    <option value="Paleobotánica">Paleobotánica</option>
                    <option value="Paleógrafo">Paleógrafo</option>
                    <option value="Paleógrafa">Paleógrafa</option>
                    <option value="Paleólogo">Paleólogo</option>
                    <option value="Paleóloga">Paleóloga</option>
                    <option value="Paleontólogo">Paleontólogo</option>
                    <option value="Paleontóloga">Paleontóloga</option>
                    <option value="Patólogo">Patólogo</option>
                    <option value="Patóloga">Patóloga</option>
                    <option value="Pedagogo">Pedagogo</option>
                    <option value="Pedagoga">Pedagoga</option>
                    <option value="Pediatra">Pediatra</option>
                    <option value="Pediatra">Pediatra</option>
                    <option value="Pedicuro">Pedicuro</option>
                    <option value="Pedicura">Pedicura</option>
                    <option value="Periodista">Periodista</option>
                    <option value="Periodista">Periodista</option>
                    <option value="Perito">Perito</option>
                    <option value="Perita">Perita</option>
                    <option value="Ingeniero">Ingeniero</option>
                    <option value="técnico">técnico</option>
                    <option value="Ingeniera">Ingeniera</option>
                    <option value="técnica">técnica</option>
                    <option value="Piscicultor">Piscicultor</option>
                    <option value="Piscicultora">Piscicultora</option>
                    <option value="Podólogo">Podólogo</option>
                    <option value="Podóloga">Podóloga</option>
                    <option value="Portero">Portero</option>
                    <option value="Portera">Portera</option>
                    <option value="Prehistoriador">Prehistoriador</option>
                    <option value="Prehistoriadota">Prehistoriadota</option>
                    <option value="Presidente">Presidente</option>
                    <option value="Presidenta">Presidenta</option>
                    <option value="Proctólogo">Proctólogo</option>
                    <option value="Proctóloga">Proctóloga</option>
                    <option value="Profesor">Profesor</option>
                    <option value="Profesora">Profesora</option>
                    <option value="Programador">Programador</option>
                    <option value="Programadora">Programadora</option>
                    <option value="Protésico">Protésico</option>
                    <option value="Protésica">Protésica</option>
                    <option value="Proveedor">Proveedor</option>
                    <option value="Proveedora">Proveedora</option>
                    <option value="Psicoanalista">Psicoanalista</option>
                    <option value="Psicoanalista">Psicoanalista</option>
                    <option value="Psicólogo">Psicólogo</option>
                    <option value="Psicóloga">Psicóloga</option>
                    <option value="Psicofísico">Psicofísico</option>
                    <option value="Psicofísica">Psicofísica</option>
                    <option value="Psicopedagogo">Psicopedagogo</option>
                    <option value="Psicopedagoga">Psicopedagoga</option>
                    <option value="Psicoterapeuta">Psicoterapeuta</option>
                    <option value="Psicoterapeuta">Psicoterapeuta</option>
                    <option value="Psiquiatra">Psiquiatra</option>
                    <option value="Psiquiatra">Psiquiatra</option>
                    <option value="Publicista">Publicista</option>
                    <option value="Publicista">Publicista</option>
                    <option value="Publicitario">Publicitario</option>
                    <option value="Publicitaria">Publicitaria</option>
                    <option value="Puericultor">Puericultor</option>
                    <option value="Puericultora">Puericultora</option>
                    <option value="Químico">Químico</option>
                    <option value="Química">Química</option>
                    <option value="Quiropráctico">Quiropráctico</option>
                    <option value="Quiropráctica">Quiropráctica</option>
                    <option value="Radioastrónomo">Radioastrónomo</option>
                    <option value="Radioastrónoma">Radioastrónoma</option>
                    <option value="Radiofonista">Radiofonista</option>
                    <option value="Radiofonista">Radiofonista</option>
                    <option value="Radiólogo">Radiólogo</option>
                    <option value="Radióloga">Radióloga</option>
                    <option value="Radiotécnico">Radiotécnico</option>
                    <option value="Radiotécnica">Radiotécnica</option>
                    <option value="Radiotelefonista">Radiotelefonista</option>
                    <option value="Radiotelefonista">Radiotelefonista</option>
                    <option value="Radiotelegrafista">Radiotelegrafista</option>
                    <option value="Radiotelegrafista">Radiotelegrafista</option>
                    <option value="Radioterapeuta">Radioterapeuta</option>
                    <option value="Radioterapeuta">Radioterapeuta</option>
                    <option value="Rector">Rector</option>
                    <option value="Rectora">Rectora</option>
                    <option value="Sanitario">Sanitario</option>
                    <option value="Sanitaria">Sanitaria</option>
                    <option value="Secretario">Secretario</option>
                    <option value="Secretaria">Secretaria</option>
                    <option value="Sexólogo">Sexólogo</option>
                    <option value="Sexóloga">Sexóloga</option>
                    <option value="Sismólogo">Sismólogo</option>
                    <option value="Sismóloga">Sismóloga</option>
                    <option value="Sociólogo">Sociólogo</option>
                    <option value="Socióloga">Socióloga</option>
                    <option value="Subdelegado">Subdelegado</option>
                    <option value="Subdelegada">Subdelegada</option>
                    <option value="Subdirector">Subdirector</option>
                    <option value="Subdirectora">Subdirectora</option>
                    <option value="Subsecretario">Subsecretario</option>
                    <option value="Subsecretaria">Subsecretaria</option>
                    <option value="Técnico">Técnico</option>
                    <option value="Técnica">Técnica</option>
                    <option value="Telefonista">Telefonista</option>
                    <option value="Telefonista">Telefonista</option>
                    <option value="Teólogo">Teólogo</option>
                    <option value="Teóloga">Teóloga</option>
                    <option value="Terapeuta">Terapeuta</option>
                    <option value="Terapeuta">Terapeuta</option>
                    <option value="Tocoginecólogo">Tocoginecólogo</option>
                    <option value="Tocoginecóloga">Tocoginecóloga</option>
                    <option value="Tocólogo">Tocólogo</option>
                    <option value="Tocóloga">Tocóloga</option>
                    <option value="Toxicólogo">Toxicólogo</option>
                    <option value="Toxicóloga">Toxicóloga</option>
                    <option value="Traductor">Traductor</option>
                    <option value="Traductora">Traductora</option>
                    <option value="Transcriptor">Transcriptor</option>
                    <option value="Transcriptora">Transcriptora</option>
                    <option value="Traumatólogo">Traumatólogo</option>
                    <option value="Traumatóloga">Traumatóloga</option>
                    <option value="Tutor">Tutor</option>
                    <option value="Tutora">Tutora</option>
                    <option value="Urólogo">Urólogo</option>
                    <option value="Uróloga">Uróloga</option>
                    <option value="Veterinario">Veterinario</option>
                    <option value="Veterinaria">Veterinaria</option>
                    <option value="Vicedecano">Vicedecano</option>
                    <option value="Vicedecana">Vicedecana</option>
                    <option value="Vicedirector">Vicedirector</option>
                    <option value="Vicedirtectora">Vicedirtectora</option>
                    <option value="Vicegerente">Vicegerente</option>
                    <option value="Vicegerente/vicegerente">Vicegerente/vicegerente</option>
                    <option value="Vicepresidente">Vicepresidente</option>
                    <option value="Vicepresidenta">Vicepresidenta</option>
                    <option value="Vicerrector">Vicerrector</option>
                    <option value="Vicerrectora">Vicerrectora</option>
                    <option value="Vicesecretario">Vicesecretario</option>
                    <option value="Vicesecretaria">Vicesecretaria</option>
                    <option value="Virólogo">Virólogo</option>
                    <option value="Viróloga">Viróloga</option>
                    <option value="Viticultor">Viticultor</option>
                    <option value="Viticultora">Viticultora</option>
                    <option value="Vulcanólogo">Vulcanólogo</option>
                    <option value="Vulcanóloga">Vulcanóloga</option>
                    <option value="Xilógrafo">Xilógrafo</option>
                    <option value="Xilógrafa">Xilógrafa</option>
                    <option value="Zoólogo">Zoólogo</option>
                    <option value="Zoóloga">Zoóloga</option>
                    <option value="Zootécnico">Zootécnico</option>
                    <option value="Zootécnica">Zootécnica</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" id="hedicion8" class="form-control" name="correo" autocomplete="off" value="<?php echo $data['correo']; ?>" readonly required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="tel" id="hedicion9" class="form-control" name="telefono" autocomplete="off" value="<?php echo $data['telefono']; ?>" readonly required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-5">
                  <select class="chosen-select" id="hedicion10" name="categoria" data-placeholder="-- Seleccionar --" autocomplete="off" readonly required>
                    <option value="<?php echo $data['categoria']; ?>">
                    <?php switch ($data['categoria']) {
                        case "A": echo "Premium"; break;
                        case "B": echo "Regular"; break;
                        case "C": echo "Basico"; break; }  ?>
                    </option>
                    <option value="A">Premium</option>
                    <option value="B">Regular</option>
                    <option value="C">Basico</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Expiracion</label>
                <div class="col-sm-5">
                    <input type="date" id="hedicion11" name="fexpiracion" class="form-control" autocomplete="off" step="1" min="2018-01-01" max="2099-12-31" value="<?php echo $data['fexpiracion']; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-2">
                  <img src="https://chart.googleapis.com/chart?cht=qr&choe=UTF-8&chs=150x150&chl=<?php echo $data['codigo']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="javascript:void(0)" onclick="hedicion();" class="btn btn-warning btn-reset">Editar</a>
                  <a href="?module=miembros" class="btn btn-default btn-reset">Cancelar</a>
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
?>