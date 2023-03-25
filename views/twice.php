<?php include 'header.php'; ?>
<div class="container-fluid">
    <div class="col-lg-12">
   <div class="row">
<div class="well">
<h4>Hızlı İşlemler</h4>
<hr>
<h5>Son Cron Çalışma Zamanı : <code><?php include("count/son.txt"); ?></code></h5>
<h5>Son Yedekleme Zamanı : <code><?php include("count/backup.txt"); ?></code></h5>
<hr>

<div class="col-md-6">
    <br>
<a href="<?=site_url()?>crons/apollon.php" target="_blank"><buttton class="btn btn-success"><i class="fa fa-plus"></i> Sistemi En iyile</buttton> </a><br></div><br>
<div class="col-md-6">
<a href="<?=site_url()?>crons/backup.php" target="_blank"><buttton class="btn btn-danger"><i class="fa fa-ambulance"></i> Sistemi Yedekle</buttton> </a></div><br><br>
<small><i class="fa fa-danger"> </i> >>> Açılan linkte sayfa tamamen yüklenene kadar bekleyiniz! <<<</small>

</div>
<div class="col-md-4">

    <div class="well">
        <h4>Kullanıcı İşlemleri</h4>
        <hr>
   <li class="p-b"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalDiv" data-action="new_user">Yeni kullanıcı</button></li>
   <li class="p-b"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalDiv" data-action="export_user">Kullanıcıları yedekle</button></li>
   <li class="p-b"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalDiv" data-action="alert_user">Kullanıcılara bildirim</button></li>
     <li class="p-b"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalDiv" data-action="all_numbers">Kullanıcı numara & mail listesi</button></li>
   <li class="p-b"><button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalDiv" data-action="details">Site detayları</button></li>
 </div>  </div>

<div class="col-md-4">
        <div class="well">
                 <h4>Finansal İşlemler</h4>
                 <hr>
    <li class="p-b">
         <button class="btn btn-default" data-toggle="modal" data-target="#modalDiv" data-action="payment_new">
         <span class="export-title">Ödeme ekle</span>
         </button>
      </li>
            <li class="p-b"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalDiv" data-action="yeni_kupon">Kupon oluştur</button></li>
            </div>
            </div>

<div class="col-md-4">
        <div class="well">
                 <h4>Servis İşlemleri</h4>
                 <hr>
        <li class="p-b"><button class="btn btn-default" data-toggle="modal" data-target="#modalDiv" data-action="new_service" >Yeni Servis</button></li>
      <li class="p-b"><button class="btn btn-default m-l" data-toggle="modal" data-target="#modalDiv" data-action="new_subscriptions">Yeni abonelik</button></li>
      <li class="p-b"><button class="btn btn-default m-l" data-toggle="modal" data-target="#modalDiv" data-action="new_category">Yeni kategori</button></li>
        <li class="p-b">
        <button class="btn btn-default m-l" data-toggle="modal" data-target="#modalDiv" data-action="import_services">Servisleri çek</button>
      </li>
      </div>
      </div>
 
   </div>
</div></div>


<?php include 'footer.php'; ?>
