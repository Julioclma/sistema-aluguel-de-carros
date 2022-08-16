<?php

include('/components/header-php.php');

echo $doctype;
echo '<title>Document</title>
</head>';
?>

<body>

    <?php
    //header
    echo $header;

    echo '<div class="bem-vindo">' . $_SESSION['bem-vindo'] . '</div>';
    //footer
    echo $footer;
    ?>


</body>

</html>