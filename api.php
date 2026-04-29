<?php
$products = [
    [
        "id" => 1,
        "nev" => "GREE Winter 3,5 kW klíma",
        "ar" => "319.000 Ft",
        "keszlet" => 5,
        "kep" => "images/klima1.jpg"
    ],
    [
        "id" => 2,
        "nev" => "TCL BreezeIN (TAC-12CHSD/TPH11IH) 3.5 kW klíma",
        "ar" => "310.000 Ft",
        "keszlet" => 0,
        "kep" => "images/klima2.jpg"
    ]
];

if (isset($_GET['export']) && $_GET['export'] === 'xml') {
    header('Content-Type: application/xml');
    $xml = new SimpleXMLElement('<termekek/>');
    foreach ($products as $p) {
        if ($p['keszlet'] > 0) {
            $item = $xml->addChild('termek');
            $item->addChild('nev', $p['nev']);
            $item->addChild('ar', $p['ar']);
            $item->addChild('keszlet', $p['keszlet']);
        }
    }
    echo $xml->asXML();
    exit;
}

header('Content-Type: application/json');
echo json_encode($products);