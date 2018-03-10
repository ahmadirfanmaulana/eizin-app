<?php
$brand = isset($brand)?$brand:[];
  if (count($brand)>0 || $_SESSION['level'] != 'dinas') {
    ?>
    <section class="content-header" style="height:50px;<?php if($_SESSION['level'] == "dinas"){echo "margin-top:-20px;";} ?>">
      <div class="row">
        <ul class="breadcrumb" style="background:transparent;">
          <?php
          $user_level = $_SESSION['level'];
          if ($user_level == "admin1" || $user_level == "admin2") {
            $user_url = ADMIN;
          }
          else{
            $user_url = URL;
          }

          for ($i=0; $i <count($data) ; $i++) {
            if ($i+1 == count($data)) {
              ?>
              <li class="active"><?php echo strtoupper($data[$i]); ?></li>
              <?php
            }
            else{
              ?>
              <li><a href="<?php echo $user_url.$link[$i]; ?>"><?php echo strtoupper($data[$i]); ?></a></li>
              <?php
            }
          }
           ?>
        </ul>
      </div>
    </section>

    <?php
  }
 ?>
