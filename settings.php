<?php include_once("includes/includedFiles.php") ?>

<div class="entityInfo" id="profile profilepage" style="display:block">
    <div class="centerSection">
    <div class="userInfo" ><?php  echo $user->getFullName(); ?></div>
    </div>
    <div class="button">USER DETAILS</div>
    <div class="button red" onclick="logout()">LOG OUT</div>
</div> 