<?php if($this->cart->contents() == TRUE):?>
<?php $qty = 0; $price = 0; foreach($this->cart->contents() as $i):?>
    <tr>
        <th><input type="checkbox" name="rowid" id="" value="<?php echo $i['rowid']?>"></th>
        <th><?php echo $i['id']?></th>
        <th><?php echo $i['name']?></th>
        <th><?php echo $i['qty']?></th>
        <th><?php echo number_format($i['price'])?></th>
        <th>
            <a style="cursor:pointer;" onclick="remove('<?php echo $i['rowid'] ?>')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
        </th>
    </tr>
    
<?php
$qty += $i['qty'];
$price += $i['price'];
endforeach;?>
    <tr>
        
        <th colspan="3">
            <h4><i>Total item produk</i></h4>
        </th>
        <th><h4><?php echo $qty;?></h4></th>
        <th><h4><?php echo 'Rp, '.number_format($price,2);?></h4></th>
        <th></th>
    </tr>
<?php else:?>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
<?php endif;?>