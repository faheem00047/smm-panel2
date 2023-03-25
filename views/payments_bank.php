<?php include 'header.php'; ?>
<div class="container-fluid">
   <ul class="nav nav-tabs">
      <li class="<?php if( $status == "all"): echo "active"; endif; ?>"><a href="<?=site_url("admin/payments/bank")?>">Tüm ödemeler</a></li>
      <li class="<?php if( $status == "pending"): echo "active"; endif; ?>"><a href="<?=site_url("admin/payments/bank/1/pending")?>">Bekleyen ödemeler</a></li>
      <li class="<?php if( $status == "completed"): echo "active"; endif; ?>"><a href="<?=site_url("admin/payments/bank/1/completed")?>">Onaylanmış ödemeler</a></li>
      <li class="<?php if( $status == "canceled"): echo "active"; endif; ?>"><a href="<?=site_url("admin/payments/bank/1/canceled")?>">İptal edilmiş ödemeler</a></li>
      <li class="pull-right custom-search">
         <form class="form-inline" action="<?php echo site_url("admin/payments/bank") ?>" method="get">
            <div class="input-group">
               <input type="text" name="search" class="form-control" value="<?=$search_word?>" placeholder="Kelime">
               <span class="input-group-btn search-select-wrap">
                  <select class="form-control search-select" name="search_type">
                     <option value="username" <?php if( $search_where == "username" ): echo 'selected'; endif; ?> >Kullanıcı adı</option>
                  </select>
                  <button type="submit" class="btn btn-default"><span class="fa fa-search" aria-hidden="true"></span></button>
               </span>
            </div>
         </form>
      </li>
      <li class="pull-right export-li">
         <button class="btn btn-default" data-toggle="modal" data-target="#modalDiv" data-action="payment_banknew">
         <span class="export-title">Ödeme ekle/kaldır</span>
       </button>
      </li>
   </ul>
   <table class="table">
      <thead>
         <tr>
            <th class="p-l">ID</th>
            <th>Kullanıcı</th>
            <th>Tutar</th>
            <th>Banka</th>
            <th>Durum</th>
            <th>Not</th>
            <th>Oluşturma Tarihi</th>
            <th>Düzenleme Tarihi</th>
            <th></th>
         </tr>
      </thead>
      <form id="changebulkForm" action="<?php echo site_url("admin/payments/bank/multi-action") ?>" method="post">
        <tbody>
          <?php foreach($payments as $payment ): ?>
              <tr>
                 <td class="p-l"><?php echo $payment["payment_id"] ?></td>
                 <td><?php echo $payment["username"] ?></td>
                 <td><?php echo $payment["payment_amount"] ?></td>
                 <td><?php echo $payment["bank_name"] ?></td>
                 <td><?php echo paymentStatu($payment["payment_status"]); ?></td>
                 <td><?php echo $payment["payment_note"] ?></td>
                 <td nowrap=""><?php echo $payment["payment_create_date"] ?></td>
                 <td nowrap=""><?php echo $payment["payment_update_date"] ?></td>
                 <td class="service-block__action">
                   <div class="dropdown pull-right">
                     <button type="button" class="btn btn-default btn-xs dropdown-toggle btn-xs-caret" data-toggle="dropdown">İşlemler <span class="caret"></span></button>
                     <ul class="dropdown-menu">
                       <li><a href="#"  data-toggle="modal" data-target="#modalDiv" data-action="payment_bankedit" data-id="<?php echo $payment["payment_id"] ?>">Düzenle</a></li>
                     </ul>
                   </div>
                 </td>
              </tr>
            <?php endforeach; ?>
        </tbody>
        <input type="hidden" name="bulkStatus" id="bulkStatus" value="0">
      </form>
   </table>
   <?php if( $paginationArr["count"] > 1 ): ?>
     <div class="row">
        <div class="col-sm-8">
           <nav>
              <ul class="pagination">
                <?php if( $paginationArr["current"] != 1 ): ?>
                <li class="prev"><a href="<?php echo site_url("admin/payments/bank/1".$search_link) ?>">&laquo;</a></li>
                 <li class="prev"><a href="<?php echo site_url("admin/payments/bank/".$paginationArr["previous"].$search_link) ?>">&lsaquo;</a></li>
                 <?php
                     endif;
                     for ($page=1; $page<=$pageCount; $page++):
                       if( $page >= ($paginationArr['current']-9) and $page <= ($paginationArr['current']+9) ):
                 ?>
                 <li class="<?php if( $page == $paginationArr["current"] ): echo "active"; endif; ?> "><a href="<?php echo site_url("admin/payments/bank/".$page.$search_link) ?>"><?=$page?></a></li>
                 <?php endif; endfor;
                       if( $paginationArr["current"] != $paginationArr["count"] ):
                 ?>
                 <li class="next"><a href="<?php echo site_url("admin/payments/bank/".$paginationArr["next"].$search_link) ?>" data-page="1">&rsaquo;</a></li>
                 <li class="next"><a href="<?php echo site_url("admin/payments/bank/".$paginationArr["count"].$search_link) ?>" data-page="1">&raquo;</a></li>
                 <?php endif; ?>
              </ul>
           </nav>
        </div>
     </div>
   <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
