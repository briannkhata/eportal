<?php $this->load->view('header');?>
<div class="portlet-body">

    <table class="table table-striped table-bordered table-hover nR">
        <thead>
            <tr>
                <th>Days Applied</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Date Applied</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php         
			foreach($this->M_leave->get_leave_by_user_id($this->session->userdata('user_id')) as $row):?>
            <tr>
                <td><?=$row['days_applied'];?></td>
                <td>
                    <?=date('d M Y',strtotime($row['start_date']));?><br>
                </td>
                <td><?=date('d M Y',strtotime($row['end_date']));?></td>
                <td><?=date('d M Y',strtotime($row['date_applied']));?></td>
                <td>
                    <?php if($row['status'] == 0):?>
                    ---pending---
                    <?php elseif($row['status'] == 1):?>
                    ---approved--- [<?=date('d M Y',strtotime($row['date_approved']));?>]<br>
                    <small><?=$row['comment'];?></small>
                    <?php elseif($row['status'] == 2):?>
                    ---denied--- [<?=date('d M Y',strtotime($row['date_approved']));?>]<br>
                    <small><?=$row['comment'];?></small>
                    <?php if($row['end_date'] < date('Y-m-d-H-i-s')){?>
                    <strong style="color: red;">LEAVE DAYS OVER</strong>
                    <?php }?>
                    <?php endif;?>

                </td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

</div>
<?php $this->load->view('footer');?>