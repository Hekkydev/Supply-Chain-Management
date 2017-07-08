<div class="table-layout">
  <form class="form-horizontal" action="menu/created" method="post">
    <legend>Form Menu Setting</legend>
    <div class="form-group form-group-sm">
      <label class="control-label col-lg-2">Name Menu : </label>
      <div class="col-lg-4">
        <input type="text" name="nama_menu" value="" class="form-control">
      </div>
    </div>
    <div class="form-group form-group-sm">
      <label class="control-label col-lg-2">Link : </label>
      <div class="col-lg-4">
        <input type="text" name="link" value="" class="form-control">
      </div>
    </div>
    <div class="form-group form-group-sm">
      <label class="control-label col-lg-2">Icon: </label>
      <div class="col-lg-4">
        <input type="text" name="icon" value="" class="form-control">
      </div>
    </div>
    <div class="form-group form-group-sm">
      <label class="control-label col-lg-2">Group : </label>
      <div class="col-lg-4">
        <select class="form-control" name="id_group">
          <?php foreach ($group as $group): ?>
            <option value="<?php echo $group->id_group; ?>"><?php echo $group->form_access ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="form-group form-group-sm">
      <label class="control-label col-lg-2"></label>
      <div class="col-lg-4">
        <button type="submit">ADD MENU</button>
      </div>
    </div>
  </form>

<hr>
  <table class="table table-responsive">
    <thead>
      <tr>
        <th>No</th>
        <th>Menu Name</th>
        <th>Group</th>
        <th>Link</th>
        <th>icon</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php foreach ($menu as $m): ?>
      <tr>
        <td><?php echo $m->id_menu_link; ?></td>
        <td><?php echo $m->nama_menu ?></td>
        <td><?php echo $m->form_access ?></td>
        <td><?php echo $m->link ?></td>
        <td><i class="<?php  echo $m->icon;?>"></i></td>
        <td>

          <a href="<?php echo site_url('menu/remove/'.$m->id_menu_link.'')?>">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
