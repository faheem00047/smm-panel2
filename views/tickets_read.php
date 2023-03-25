<?php include 'header.php'; ?>
<div class="container">
   <div class="row">
        <ul class="nav nav-tabs"> <li class="pull-right custom-search">
         <form class="form-inline" action="<?=site_url("admin/orders")?>" method="get">
            <div class="input-group">
               <input type="text" name="search" class="form-control" value="<?=$search_word?>" placeholder="Sipariş ID">
               <span class="input-group-btn search-select-wrap">
                  <select class="form-control search-select" name="search_type">
                     <option value="order_id" <?php if( $search_where == "order_id" ): echo 'selected'; endif; ?> >Sipariş ID</option>
                  </select>
                  <button type="submit" class="btn btn-default"><span class="fa fa-search" aria-hidden="true"></span></button>
               </span>
            </div>
         </form>
      </li></ul> 
      <div class="col-md-12">
        
         <div class="panel">
            <div class="panel-heading edit-theme-title">
               <strong><?=$ticketMessage[0]["subject"]?></strong>
               <?php if( $ticketMessage[0]["canmessage"] == 1 ): ?>
               <span class="badge"><span class="fa fa-lock"></span> Ticket kilitli bu yüzden kullanıcı cevap veremez</span>
               <?php endif; ?>
            </div>
            <div class="row">
               <div class="col-md-12">
                   
                  <div class="panel-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="ticket-message__container">
                              <?php foreach($ticketMessage as $message): if( $message["support"] == 1 ): ?>
                              <div class="ticket-message__block ticket-message__client">
                                 <div class="ticket-message">
                                    <div class="ticket-message__title">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <strong><?=$message["username"]?></strong>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="ticket-message__title-date">
                                                <?=$message["time"]?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="ticket-message__text"><?=str_replace("</script>","</ script >",str_replace("<script>","< script >",$message["message"]))?></div>
                                 </div>
                              </div>
                              <?php else: ?>
                              <div class="ticket-message__block ticket-message__support">
                                 <div class="ticket-message">
                                    <div class="ticket-message__title">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <strong>Destek ekibi</strong>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="ticket-message__title-date">
                                                <?=$message["time"]?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="ticket-message__text"><?=$message["message"]?></div>
                                 </div>
                              </div>
                              <?php endif; endforeach; ?>
                           </div>
                           <form action="<?php echo site_url("admin/tickets/read/".$ticketMessage[0]["ticket_id"]) ?>" method="post">
                              <div class="col-md-12">
                                 <div class="ticket-message-submit">
                                    <textarea name="message" id="" cols="30" rows="5" class="form-control ticket-edit__textarea"></textarea>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <button class="btn btn-primary click" type="submit">Cevabı yolla</button>
                                 <div class="btn-group">
                                   <?php if( $ticketMessage[0]["client_new"] == 1 ): ?>
                                     <a href="<?php echo site_url("admin/tickets/unread/".$ticketMessage[0]["ticket_id"]) ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Okunmadı olarak işaretle">Okunmadı olarak işaretle</a>
                                   <?php endif; if( $ticketMessage[0]["canmessage"] == 2 ): ?>
                                     <a href="<?php echo site_url("admin/tickets/lock/".$ticketMessage[0]["ticket_id"]) ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Destek talebini kilitle">Destek talebini kilitle</a>
                                   <?php else: ?>
                                     <a href="<?php echo site_url("admin/tickets/unlock/".$ticketMessage[0]["ticket_id"]) ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Destek talebi kilidini aç">Destek talebi kilidini aç</a>
                                   <?php endif; if( $ticketMessage[0]["status"] != "closed" ): ?>
                                     <a href="<?php echo site_url("admin/tickets/close/".$ticketMessage[0]["ticket_id"]) ?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="Destek talebi kapat">Destek talebi kapat</a>
                                   <?php endif; ?>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'footer.php'; ?>
