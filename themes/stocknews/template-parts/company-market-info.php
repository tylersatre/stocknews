<?php
    $stockData = get_query_var('stock-data');
    if ($stockData) {
        $name = $stockData['profile']['companyName'] ?? 'no company name';
        $price = money_format('%n',$stockData['profile']['price'] ?? 'no price');
        $priceChange = money_format('%n',$stockData['profile']['changes'] ?? 'no changes');
        $priceChangePercentage = $stockData['profile']['changesPercentage'] ?? 'no changesPercentage';
        $yearRange = explode('-',$stockData['profile']['range'] ?? '');
        $rangeLow = money_format('%n',$yearRange[0] ?? 'no low range');
        $rangeHigh = money_format('%n',$yearRange[1] ?? 'no high range');
        $beta = $stockData['profile']['beta'] ?? 'no beta';
        $volumeAverage = $stockData['profile']['volAvg'] ?? '0';
        $marketCap = $stockData['profile']['mktCap'] ?? '0';
        // !!! Can be abstracted out and used as a currency filter
        
        $marketCapDisplay = apply_filters('sn_format_currency',$marketCap);
        $volumeAverageDisplay = apply_filters('sn_format_currency',$volumeAverage);
        $lastDividend = (($stockData['profile']['lastDiv'] ?? '0') == '0') ? 'N/A' : money_format('%n',$stockData['profile']['lastDiv']);  //"N/A if none"
    }

    echo "
        <div class='market-info'>
        <span class='company-subject'>Price:</span>  $price<br>
        <span class='company-subject'>Change:</span>  $priceChange<br>
        <span class='company-subject'>Change Percentage:</span>  $priceChangePercentage<br>
        <span class='company-subject'>52 Week Range:</span>  $rangeLow - $rangeHigh<br>
        <span class='company-subject'>Beta:</span>  $beta<br>
        <span class='company-subject'>Volume Average:</span>  $volumeAverageDisplay<br>
        <span class='company-subject'>Market Capitalisation:</span>  $marketCapDisplay<br>
        <span class='company-subject'>Last Dividend:</span>  $lastDividend
        </div>
    ";