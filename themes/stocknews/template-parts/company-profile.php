<?php
    $stockData = get_query_var('stock-data');
    if ($stockData) {
        $name = $stockData['profile']['companyName'] ?? 'no company name';
        $image = $stockData['profile']['image'] ?? 'no company image';
        $exchange = $stockData['profile']['exchange'] ?? 'no company exchange';
        $description = $stockData['profile']['description'] ?? 'no company description';
        $industry = $stockData['profile']['industry'] ?? 'no company industry';
        $sector = $stockData['profile']['sector'] ?? 'no company sector';
        $ceo = $stockData['profile']['ceo'] ?? 'no company ceo';
        $website = $stockData['profile']['website'] ?? 'no company website';
    }
    $start = '<div class="company-profile">';
    $main = "
        <span class='company-subject'>Exchange:</span> $exchange<br>
        <span class='company-subject'>Description:</span> $description<br>
        <span class='company-subject'>Industry:</span> $industry<br>
        <span class='company-subject'>Sector:</span> $sector<br>
        <span class='company-subject'>CEO:</span> $ceo<br>
        <span class='company-subject'>Website:</span> <a href='$website' target='_blank'>$website</a></div>
    ";

    $logoName = "
        <img src='$image' class='company-logo'><br>
        $name<br><br>
    ";

    if (get_post_type() != 'sn_company'){
        echo $start.$logoName.$main;
    } else {
        echo $start.$main;
    }