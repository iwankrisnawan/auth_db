<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="content-wrapper">
      <div class="content" style="padding:2%">
        <form class="" action="<?=BASEURL;?>/domain/add" method="post">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Customer ID</label>
                <select name="customer_id" class="form-control">
                  <?php foreach($data['data']['bee_customers'] as $value): ?>
                     <option value="<?=$value['id']?>">
                       <?= $value['first_name'];?>
                     </option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="form-group">
                <label class="control-label">Domain Name</label>
                <input type="text" name="domain_name" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label">Expired Date</label>
                <input type="date" name="expired_date" class="form-control">
              </div>
              <div class="form-group field-domain-customer_id">
                <label class="control-label">Package</label>
                <select name="package_id" class="form-control">
                  <?php foreach($data['data']['package'] as $value): ?>
                     <option value="<?=$value['id']?>">
                       <?= $value['package_name'];?>
                     </option>
                  <?php endforeach;?>
                </select>
              </div>
              <div class="form-group field-domain-customer_id">
                <label class="control-label">Domain Status</label>
                <select name="domain_status" class="form-control">
                  <option value="0">Not Active</option>
                  <option value="1">Active</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Document Root</label>
                <input type="text" name="document_root" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label">Cpanel user</label>
                <input type="text" name="cpanel_user" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label">Cpanel password</label>
                <input type="text" name="cpanel_password" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Db Name</label>
                <input type="text" name="db_name" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label">Db User</label>
                <input type="text" name="db_user" class="form-control">
              </div>
              <div class="form-group">
                <label class="control-label">Db password</label>
                <input type="text" name="db_password" class="form-control">
              </div>
            </div>

            <div class="col-md-12">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="submit" class="btn btn-primary" name="button">Save</button> -->
              <a href="#" class="btn btn-primary modalButton" data-dismiss="modal">Save</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
