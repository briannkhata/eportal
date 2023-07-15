<?php $this->load->view('header');?>

<div class="portlet-body" style="height: 230px;">
    <form role="form" action="<?=base_url();?>Document_type/save" method="post">
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Document type</label>
                <input type="text" class="form-control" name="document_type"
                    value="<?php if (!empty($document_type)){echo $document_type;}?>" required>
            </div>
        </div>

        <div class="modal-footer pull-left" style="border: none;">
            <?php if (isset($update_id)){?>
            <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
            <?php }?>
            <button type="submit" class="btn blue zanda"> Save</button>
        </div>
    </form>

</div>

<?php $this->load->view('footer.php');?>