<?php

/**
 * This script reads cards.csv and generates HTML for the cards - Print to card or PDF...
 */

?><html>
    
    <head>
        <title>Cards Against Web Science</title>
        <link rel="stylesheet" href="caws.css" />
    </head>
    
    <body>
        <?php

            $file = fopen('cards.csv', 'r');
            
            fgets($file);
            
            while(($line = fgetcsv($file)) !== false)
            {
                list($colour, $data) = $line;
               
                $data = preg_replace('@_{2,}@', '________', $data); // Normalise underscores - 2+ become 8
                
                $pick = substr_count($data, '________');
                
                $draw = $pick > 2 ? $pick - 1 : 0;
                
                ?>
        
        <div class="card <?php echo $colour; ?>">
            <span class="text">
                <?php echo $data; ?>
            </span>
            
            <?php if($draw > 1) { ?>
            
            <span class="draw">Draw <span class="num"><?php echo $draw; ?></span></span>
            
            <?php } if($pick > 1) { ?>
            
            <span class="pick">Pick <span class="num"><?php echo $pick; ?></span></span>
            
            <?php } ?>
            
        </div>
        
        <?php
        
            } // End while

        ?>

    </body>
</html>

