<?php 
include "./includes/head.html.php";
include "./includes/navbar.html.php";
include "./actions/connexion.php";


try{

  $req=$pdo->prepare("SELECT n.num,n.libelle as nat_libelle,c.libelle as cont_libelle from nationalite n inner join continent c on n.numContinent = c.num");
  $req->setFetchMode(PDO::FETCH_OBJ);
  $req->execute();
  $nationalities=$req->fetchAll();
}catch(Exception $e){
  die($e);
}





?>

<main>

<?php if(!empty($_SESSION["message"])):?>

  <?php
  $messages = $_SESSION["message"];
  $i = 0;
  foreach($messages as $key => $message):
    ?>
    <div id="pop-up-<?= $i;?>" class="pop-up bg-blue-500 flex gap-2 justify-between px-4 py-3">
<div class="flex items-center text-white text-sm font-bold " role="alert">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
  <p>
    <?=$message;?>
  </p>
</div>
<button class="close-pop-up-btn" data-parent-id="pop-up-<?= $i;?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.3394 9.32245C16.7434 8.94589 16.7657 8.31312 16.3891 7.90911C16.0126 7.50509 15.3798 7.48283 14.9758 7.85938L12.0497 10.5866L9.32245 7.66048C8.94589 7.25647 8.31312 7.23421 7.90911 7.61076C7.50509 7.98731 7.48283 8.62008 7.85938 9.0241L10.5866 11.9502L7.66048 14.6775C7.25647 15.054 7.23421 15.6868 7.61076 16.0908C7.98731 16.4948 8.62008 16.5171 9.0241 16.1405L11.9502 13.4133L14.6775 16.3394C15.054 16.7434 15.6868 16.7657 16.0908 16.3891C16.4948 16.0126 16.5171 15.3798 16.1405 14.9758L13.4133 12.0497L16.3394 9.32245Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12ZM12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21Z" fill="currentColor" /></svg></button>
</div>
<?php endforeach?>

<?php $_SESSION["message"] = [];     endif; ?>

<div id="modal-wrapper" class='modal-wrapper flex flex-col gap-3'>
<p> are you sure you want to delete 

<span id="label-wrapper"></span>
</p>
<div class='flex content-center gap-2'>

<a id="confirm-delete-btn" class='modal-btn' href='./actions/nationality/remove-nationality.php?num='> remove </a>
<a class='modal-btn' id="cancell-btn"> cancell </a>
</div>
</div>

<div class="space-y-2 mx-auto flex flex-col items-center">

    <h1 class="text-4xl leading-none  pb-2">
        nationalities
    </h1>
    
    <a class="p-4  bg-blue-700 inline-block text-white rounded-md" href="./nationalities-add-form.html.php">create new nationality</a>
</div>



<table class="border text-center mx-auto mt-4">
          <thead class="border-b">
            <tr class="max-w-xs">
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                #
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                 nationality
              </th>
              <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 border-r">
                 continent
              </th>
            
            </tr>
          </thead>
          <tbody>
            <?php foreach($nationalities as $nationality):?>

            <tr class="border-b max-w-xs">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r"><?= $nationality->num;?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r"><?= $nationality->nat_libelle;?></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r"><?= $nationality->cont_libelle;?></td>
             
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r"><a href="./nationalities-edit-form.html.php?num=<?= $nationality->num?>">Edit</a></td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-r"><a class="delete-anchor cursor-pointer" data-nationality-number='<?=$nationality->num?>'  data-nationality-label="<?=$nationality->libelle;?>">delete</a></td>
            
            </tr>
          
            <?php endforeach?>
           
    
          </tbody>
        </table>









  </tbody>
</table>
</main>
<script src="script.js"></script>