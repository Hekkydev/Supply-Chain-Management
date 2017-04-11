
<form action="<?php echo $action; ?>" method="post">
<div class="form-group">
    <label for="varchar">Form Access <?php echo form_error('form_access') ?></label>
    <input type="text" class="form-control" name="form_access" id="form_access" placeholder="Form Access" value="<?php echo $form_access; ?>" />
</div>
<input type="hidden" name="id_group" value="<?php echo $id_group; ?>" />
<button type="submit" class="btn btn-primary"><?php echo $button ?></button>
<a href="<?php echo site_url('users_group') ?>" class="btn btn-default">Cancel</a>
</form>
