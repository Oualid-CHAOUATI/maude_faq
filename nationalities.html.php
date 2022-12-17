<?php 
include "./includes/head.html.php";
include "./includes/navbar.html.php";
include "./actions/connexion.php";

$req=$pdo->prepare("SELECT * from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$nationalities=$req->fetchAll();


$num=$_GET["num"];
$modal=$_GET["remove-modal"];

$showModal=false;
if(isset($modal))$showModal=true;


?>

<main>

<?php echo $showModal? "
<div class='modal-wrapper flex flex-col gap-3'>
<p> are you sure you want to delete </p>
<div class='flex content-center gap-2'>

<a class='modal-btn' href='./actions/nationality/remove-nationality.php?num=$num'> remove </a>
<a class='modal-btn' href='http://localhost/PROJECTS/BIB/nationalities.html.php'> cancell </a>
</div>
</div>":null ?>

<div class="space-y-2 mx-auto flex flex-col items-center">

    <h1 class="text-4xl leading-none ">
        nationalities
    </h1>
    
    <a class="p-4 bg-blue-700 inline-block" href="./nationalities-add-form.html.php">create new nationality</a>
</div>



<table class="border text-center mx-auto">
          <thead class="border-b">
            <tr class="max-w-xs">
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                #
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                libelle
              </th>
            
            </tr>
          </thead>
          <tbody>
            <?php foreach($nationalities as $nationality):?>

            <tr class="border-b max-w-xs">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r"><?= $nationality->num;?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r"><?= $nationality->libelle;?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r"><a href="./nationalities-edit-form.html.php?num=<?= $nationality->num?>">Edit</a></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r"><a href="./nationalities.html.php?num=<?=$nationality->num?>&remove-modal">delete</a></td>
            
            </tr>
          
            <?php endforeach?>
           
    
          </tbody>
        </table>









  </tbody>
</table>
</main>