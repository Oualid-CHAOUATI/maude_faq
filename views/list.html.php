<main>


  <div class="space-y-2 mx-auto flex flex-col items-center">

    <h1 class="text-4xl leading-none  pb-2">
      <?= $page ?>
    </h1>

    <a class="cta-btn  " href="index.php?uc=<?= $page ?>&action=form&mode=create">create new <?= $pageBtnLabel ?></a>
  </div>



  <table>
    <thead>
      <tr>

        <?php foreach ($ths as $key => $value) {
          echo "<th ";
          $type = gettype($value);
          if ($type == "array") {

            foreach ($value as $k => $v) {


              if ($k == "value") echo ">$v";
              else
                echo "$k = $v";
            }
            // foreach ($value as $k => $v) echo $k . "=" . '$v';
          } else echo ">  $value ";

          echo '</th>';
        } ?>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($listOfInstances as $instance) : ?>

        <tr>
          <?php foreach ($fns as  $fn) : ?>
            <td>
              <?= $instance->$fn(); ?>
            </td>

          <?php endforeach; ?>

          <td><a class="flex-cell " href="index.php?uc=<?= $page ?>&action=form&mode=edit&num=<?= $instance->getNum() ?>">
              <?php echo  tableHeaderCell_icon("edit"); ?>

            </a></td>
          <?php
          $fnNumber = $fns[0];
          $fnLabel = $fns[1];

          $number = $instance->$fnNumber();
          $label = $page_label . $instance->$fnLabel();

          ?>
          <td><a class="delete-anchor flex-cell" data-nationality-number='<?= $number; ?>' data-nationality-label="<?= $label ?>">
              <?php echo  tableHeaderCell_icon("delete"); ?>
            </a></td>

        </tr>

      <?php endforeach ?>


    </tbody>
  </table>









  </tbody>
  </table>
</main>
<script src="script.js"></script>