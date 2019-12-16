<?php

    require_once('config/config.php');

    $query = 'SELECT * FROM files';
    $selectData = $connection -> prepare($query);
    $selectData -> execute();
    $picturesQuantity = $selectData -> rowCount();


    if ($picturesQuantity > 0) {


        while ($row = $selectData -> fetch(PDO::FETCH_ASSOC)) {

            extract($row);

            ?>
            
                <style>
                    * {

                        margin: 0;
                        padding: 0;

                    }


                    .content {

                        display: block;
                        width: 640px;
                        height: 360px;
                        margin: auto;

                    }


                    img {

                        width: 100%;
                        height: 100%;

                    }
                </style>

                <div class="content">
                    <img src=<?php print 'archive/'.$name_file; ?> />
                </div>
            
            <?php

        }

    } else {

        print "<p>Nenhuma imagem cadastrada.</p>";

    }

?>