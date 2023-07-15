<?php $this->load->view('header');?>
<div class="portlet-body">


    <table class="table table-striped table-bordered table-hover nR">
        <thead>
            <tr>
                <th>Document Type</th>
                <th>Title</th>
                <th>Document</th>
                <th>Date Added</th>
            </tr>
        </thead>
        <tbody>
            <?php         
			 foreach($this->M_document->get_document_by_user_id($this->session->userdata('user_id')) as $row):?>
            <tr>
                <td><?=$this->M_document_type->get_document_type($row['document_type_id']);?> </td>
                <td><?=$row['title'];?></td>
                <td><a href="<?=base_url();?>uploads/docs/<?=$row['document'];?>">
                        <?=$row['document'];?></a>
                </td>
                <td><?=date('d M Y',strtotime($row['date_added']));?></td>

            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

</div>
<?php $this->load->view('footer');?>