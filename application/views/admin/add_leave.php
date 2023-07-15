<?php $this->load->view('header');?>
<div class="portlet-body">
    <form role="form" action="<?=base_url();?>leave/save" method="post">
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Staff</label>
                <select name="user_id" class="form-control">
                    <option selected="" disabled="">Option</option>
                    <?php foreach($this->M_user->get_active_staffs() as $yo):?>
                    <option <?php if($user_id == $yo['user_id']) echo 'selected';?> value="<?=$yo['user_id'];?>">
                        <?=$yo['name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Days Applied</label>
                <input type="text" class="form-control" name="days_applied"
                    value="<?php if (!empty($days_applied)){echo $days_applied;}?>" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">Start Date</label>
                <input type="date" class="form-control" value="<?php if (!empty($from_date)){echo $start_date;}?>"
                    name="start_date" required>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="exampleInputEmail1">End Date</label>
                <input type="date" class="form-control" value="<?php if (!empty($end_date)){echo $end_date;}?>"
                    name="end_date" required>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" value="<?php if (!empty($title)){echo $title;}?>" name="title"
                    placeholder="Title">
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