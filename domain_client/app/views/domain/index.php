<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="content-wrapper">
      <section class="content">
        <div class="box-header with-border">
          <div class="col-lg-7">
            <button class="btn btn-primary showModalInsert" data-toggle="modal" data-target="#formModal">
              Tambah Data
            </button>
          </div>
        </div>
        <table class="table table-bordered" id="table_domain">
          <thead class="thead-light">
            <tr>
              <!-- <th scope="col">#</th> -->
              <th class="text-center">#</th>
              <th class="text-center">Customer</th>
              <th class="text-center">Domain Name</th>
              <th class="text-center">Cpanel User</th>
              <th class="text-center">DB Name</th>
              <th class="text-center">Package</th>
              <th class="text-center">Domain Status</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
            <tbody>
          <?php if ($data['data']): ?>
            <?php foreach($data['data']['domain'] as $number => $ori): ?>
              <tr id="domain<?=$ori['id']?>">
                <td class="text-center number_td"><?=$number+1?></td>
                <td><?= $data['database']->select_id('bee_customers', 'id', $ori['customer_id'])['first_name']?></td>
                <td><?=$ori['domain_name']?></td>
                <td><?=$ori['cpanel_user']?></td>
                <td><?=$ori['db_name']?></td>
                <td><?= $data['database']->select_id('package', 'id', $ori['package_id'])['package_name']?></td>
                <td>
                  <?php
                    if($ori['domain_status'] == 1){
                      echo "active";
                    }else{
                      echo "not active";
                    }
                   ?>
                </td>
                <td>
                  <button data-id="<?= $ori['id']?>" class="btn btn-success showModalEdit" data-toggle="modal" data-target="#formModal">
                    Edit
                  </button>
                  <button data-id="<?= $ori['id']?>" class="btn btn-danger delete_button">
                    Delete
                  </button>
                </td>
              </tr>
            <?php endforeach;?>
          <?php else: ?>
          <?php endif; ?>
          </tbody>
        </table>
      </section>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="formModalLable">HEADER TITLE</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="modalForm" id="modal_form">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Customer ID</label>
                    <select name="customer_id" class="input_class form-control">
                      <?php foreach($data['data']['bee_customers'] as $value): ?>
                         <option value="<?=$value['id']?>">
                           <?= $value['first_name'];?>
                         </option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="control-label">Domain Name</label>
                    <input type="text" name="domain_name" class="input_class form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Expired Date</label>
                    <input type="date" name="expired_date" class="input_class form-control">
                  </div>
                  <div class="form-group field-domain-customer_id">
                    <label class="control-label">Package</label>
                    <select name="package_id" class="input_class form-control">
                      <?php foreach($data['data']['package'] as $value): ?>
                         <option value="<?=$value['id']?>">
                           <?= $value['package_name'];?>
                         </option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group field-domain-customer_id">
                    <label class="control-label">Domain Status</label>
                    <select name="domain_status" class="input_class form-control">
                      <option value="0">Not Active</option>
                      <option value="1">Active</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Document Root</label>
                    <input type="text" name="document_root" class="input_class form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Cpanel user</label>
                    <input type="text" name="cpanel_user" class="input_class form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Cpanel password</label>
                    <input type="text" name="cpanel_password" class="input_class form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">Db Name</label>
                    <input type="text" name="db_name" class="input_class form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Db User</label>
                    <input type="text" name="db_user" class="input_class form-control">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Db password</label>
                    <input type="text" name="db_password" class="input_class form-control">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="submit" class="btn btn-primary" name="button">Save</button> -->
                <a href="#" class="btn btn-primary modalButton" data-dismiss="modal">Save</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script type="text/javascript" src="<?=BASEURL;?>/js/jquery/dist/jquery.js"></script>
    <script type="text/javascript" src="<?=BASEURL;?>/js/bootstrap.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?=BASEURL;?>/js/bootstrap.js"></script>

    <?php if(isset($data['class'])): ?>
    <?php $url = App::parseURL(); ?>
       <script src="<?=BASEURL;?>/js/<?= $data['class']?>/index.js"></script>
    <?php endif; ?>

  </body>
</html>
