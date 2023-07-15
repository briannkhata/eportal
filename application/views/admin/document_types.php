<?php $this->load->view('header');?>

<div class="portlet-body">
    <div class="table-toolbar">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-sm green" href="<?=base_url();?>document_type/read">
                    Add New</i>
                </a>
            </div>

        </div>
    </div>

    <table class="table table-bordered nR">
        <thead>
            <tr>
                <th style="width:2%;">#</th>
                <th>Document type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $count = 1;
                foreach($this->M_document_type->get_document_types() as $row):?>
            <tr class="odd gradeX">
                <td><?=$count++;?></td>
                <td><?=$row['document_type'];?></td>
                <td>
                    <a href="<?=base_url();?>document_type/read/<?=$row['document_type_id'];?>"
                        class="btn btn-primary btn-sm">
                        Edit</a>
                    <a href="<?=base_url();?>document_type/delete/<?=$row['document_type_id'];?>"
                        class="btn btn-danger btn-sm">
                        Delete</a>
                </td>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<?php $this->load->view('footer.php');?>