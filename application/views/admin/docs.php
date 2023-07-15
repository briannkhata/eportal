<?php $this->load->view('header');?>
<div class="portlet-body">
    <div class="table-toolbar">
        <div class="row">
            <div class="col-md-6">
                <a href="<?=base_url();?>Leave/read" class="btn btn-sm blue">
                    Add New
                </a>

                <button class="btn btn-sm grey" onclick="window.print();">
                    print <i class="fa fa-print"></i>
                </button>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered table-hover nR">
        <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>File</th>
                <th>Date Added</th>
                <th>Year</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php         
			 foreach($this->M_user->get_docs() as $row):?>
            <tr>
                <td><?=$this->M_user->get_name($row['user_id']);?><br>
                </td>
                <td><?=$row['title'];?></td>
                <td><a href="<?=base_url();?>uploads/docs/<?=$row['doc'];?>">
                        <?=$row['doc'];?>< /a>
                </td>
                <td><?=date('d M Y',strtotime($row['date_added']));?></td>

                <td><?=$row['year'];?></td>
                <td>

                    <a href="<?=base_url();?>User/deletedoc/<?=$row['id'];?>" class="btn btn-danger btn-xs black"><i
                            class="fa fa-times-circle"></i></a><br>


                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

</div>
<?php $this->load->view('footer');?>