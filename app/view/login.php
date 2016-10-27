<?php
require_once (K_AppBase.'view/inc/n_header_meta.php');
require_once (K_AppBase.'view/inc/n_header.php');
?>

<div class="main" style="width:500px;margin:0px auto;">
<?php echo $mes01; ?>
</div>

<div class="main" style="width:500px;margin:0px auto;">


  <div class="row">
    <div class="col-md-12">
      <h3 class="text-center">
        ログイン
      </h3>
      <form role="form" action="" method="post">

        <?php Sec_Ref::csrf() ?>
        <?php Sec_Ref::method() ?>

        <div class="form-group">           
          <label for="exampleInputEmail1">
          ログインID
          </label>
          <input type="text" name="name" class="form-control" id="id_s" />
        </div>
        <div class="form-group">
           
          <label for="exampleInputPassword1">
          パスワード
          </label>
          <input type="password" name="pass" class="form-control" id="exampleInputPassword1" />
        </div>


        <button type="submit" class="btn btn-default">
          Submit
        </button>
      </form>
    </div>
  </div>


</div>

<?php
require_once (K_AppBase.'view/inc/n_footer.php');


