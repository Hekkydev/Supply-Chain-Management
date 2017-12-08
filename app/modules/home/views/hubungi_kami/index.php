<section id="contact-info">
                    <div class="row">

                        <div class="col-xs-12 col-sm-6 col-lg-7">

                            <div class="block">

                                <form method="post" id="form-hubungi-kami" action="<?php echo site_url('hubungi_kami/send_message')?>">
                                  <input type="hidden" name="id_user" value="<?php echo $hubungi_kami->id_user?>">
                                    <div class="form-group">
                                        <div class="control-label">
                                            Name
                                        </div>

                                        <div class="controls">
                                            <input type="text" name="name" class="form-control input" value="<?php echo $hubungi_kami->name?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="control-label">
                                            Email
                                        </div>

                                        <div class="controls">
                                            <input type="text" name="email" class="form-control input" value="<?php echo $hubungi_kami->email?>"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="control-label">
                                            Subject
                                        </div>

                                        <div class="controls">
                                            <input type="text" name="subject" class="form-control input" value="<?php echo $hubungi_kami->subject?>"/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="control-label">
                                            Message
                                        </div>

                                        <div class="controls">
                                            <textarea class="form-control textarea" name="message"><?php echo $hubungi_kami->message ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <button class="btn btn-primary">Submit</button>

                                    </div>

                                </form>

                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-lg-5">

                            <div class="block bg-gray company-info text-center">

                                <div class="main-info">
                                    <h1 class="name strong">Supply Chain Management.</h1>
                                    <p class="registration"></p>
                                    <p class="vat"></p>
                                </div>

                                <div class="address datalist">
                                    <p class="info">
                                        <span class="key">Alamat:</span>
                                        <span class="value"></span>
                                    </p>
                                    <p class="info">
                                        <span class="key">Phone:</span>
                                        <span class="value"></span>
                                    </p>
                                    <p class="info">
                                        <span class="key">E-post:</span>
                                        <span class="value">customerservice@scm-mgp.com</span>
                                    </p>
                                </div>

                            </div>

                        </div><!-- Row / END -->

                    </div>
                </section><!-- Contact / END -->
<script type="text/javascript">
  $(function(){
    $('#form-hubungi-kami').submit(function() {
      $.post($('#form-hubungi-kami').attr('action'),$('#form-hubungi-kami').serialize(), function(json) {
        if (json.error == 0) {
            alert(json.message);
            window.location.reload();
        }
      },'json');
      return false;
    });
  });
</script>
