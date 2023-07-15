<?php $this->load->view('header');?>
<div class="portlet-body">
    <form role="form" action="<?=base_url();?>Document/save" method="post" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Staff</label>
                <select name="user_id" class="form-control">
                    <option selected="" disabled="">Option</option>
                    <?php foreach($this->M_user->get_active_staffs() as $yo):?>
                    <option value="<?=$yo['user_id'];?>">
                        <?=$yo['name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Documet Type</label>
                <select name="document_type_id" class="form-control">
                    <option selected="" disabled="">Option</option>
                    <?php foreach($this->M_document_type->get_document_types() as $yo):?>
                    <option value="<?=$yo['document_type_id'];?>">
                        <?=$yo['document_type'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Select Document</label>
                <input type="file" class="form-control" name="document" required>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Datails</label>
                <textarea name="title" class="form-control" rows="" cols=""></textarea>
            </div>
        </div>


        <div class="modal-footer" style="border: none;">
            <?php if (isset($update_id)){?>
            <input type="hidden" name="update_id" id="update_id" value="<?=$update_id;?>">
            <?php }?>
            <button type="submit" class="btn blue zanda">Save</button>
        </div>
    </form>
</div>
<?php $this->load->view('footer');?>