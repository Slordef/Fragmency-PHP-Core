<?php if($method): ?>
    <div class="exceptionContent">
        <div class="line errorMessage"><?=$e->getMessage()?></div>
        <div class="line errorFile"><?=$e->getFile()?></div>
        <div class="line errorLine">Line : <?=$e->getLine()?></div>
        <div class="line errorTrace"><?=$e->getTraceAsString()?></div>
    </div>
<?php else: //([$errno, $errstr, $errfile, $errline]) ?>
    <div class="exceptionContent">
        <div class="line errorMessage"><?=$e[1]?></div>
        <div class="line errorFile"><?=$e[2]?></div>
        <div class="line errorLine">Line : <?=$e[3]?></div>
    </div>
<?php endif; ?>
