<?php $this->load->view('header');?>
<div class="portlet-body">
    <div class="table-toolbar">
        <div class="row">
            <div class="col-md-6">
                <a href="<?=base_url();?>Document/read" class="btn btn-sm blue">
                    Add New
                </a>


            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered table-hover nR">
        <thead>
            <tr>
                <th>Name</th>
                <th>Document Type</th>
                <th>Title</th>
                <th>Document</th>
                <th>Date Added</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php         
			 foreach($this->M_document->get_documents() as $row):?>
            <tr>
                <td><?=$this->M_user->get_name($row['user_id']);?> </td>
                <td><?=$this->M_document_type->get_document_type($row['document_type_id']);?> </td>
                <td><?=$row['title'];?></td>
                <td><a href="<?=base_url();?>uploads/docs/<?=$row['document'];?>">
                        <?=$row['document'];?></a>
                </td>
                <td><?=date('d M Y',strtotime($row['date_added']));?></td>

                <td>

                    <a href="<?=base_url();?>document/delete/<?=$row['document_id'];?>"
                        class="btn btn-danger btn-xs black"><i class="fa fa-times-circle"></i></a><br>


                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

</div>
<?php $this->load->view('footer');?>