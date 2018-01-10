<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/frontend.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="icon" type="qr-scan/image/png" href="favicon.png">
<link rel="stylesheet" href="qr-scan/style.css">
<script type="text/javascript" src="qr-scan/vue.min.js"></script>
<script type="text/javascript" src="qr-scan/instascan.min.js"></script>
<style type="text/css">
  .nav > li > a {
      background-color: #b3ecff;
      color: #fff;
  }
  .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover  {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #00BFFF !important;
    border-color: #00BFFF #00BFFF transparent !important;
    color: #fff !important;
}
.nav-tabs > li > a {
    border: 1px solid transparent;
    border-radius: 0px 0px 0 0;
    line-height: 1.42857;
    margin-right: 0px;
}
</style>
  <div class="container-fluid ">


    <div class=" wrapper container-fluid">


      <div class="row feature-row">

        <h5> </h5>

        <div class="col-md-12">
        <h3>Scan QR Code</h3>
    
            
      <!-- tabs bottom -->
      <div class="tabbable tabs-below">
        <div class="tab-content">
         <div class="tab-pane active" id="one_">
           <div id="app" class="panel">
            <div class="sidebar col-md-4">
              <section class="cameras">
                <h2>Cameras</h2>
                <ul>
                  <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                  <li v-for="camera in cameras">
                    <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
                    <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                      <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
                    </span>
                  </li>
                </ul>
              </section>
              <section class="scans">
                <h2>Scans</h2>
                <ul v-if="scans.length === 0">
                  <li class="empty">No scans yet</li>
                </ul>
                <transition-group name="scans" tag="ul">
                  <li v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</li>
                </transition-group>
              </section>
            </div>
            <div class="preview-container col-md-8">
              <video id="preview"></video>
            </div>
          </div>
          <script type="text/javascript" src="qr-scan/app.js"></script></div>
         <div class="tab-pane" id="two_"></div>
        </div>
        <ul class="nav nav-tabs text-center" style="margin-left: 40%;border-bottom: 0px solid #fff;
}">
          <li class="active"><a href="#one_" data-toggle="tab">QR Code Scanner</a></li>          
        </ul>
      </div>
      <!-- /tabs -->
    </div>
  </div>
</div>
</div>
</div>