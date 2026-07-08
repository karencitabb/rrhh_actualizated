<?php

function crearPie($section)
{
    $footer = $section->addFooter();

    $footer->addLine(
        [
            'weight' => 1,
            'width' => 460,
            'height' => 0,
            'color' => '0B5394'
        ]
    );

    $footer->addPreserveText(
        'PLÁSTICOS Y PET DE COLOMBIA S.A.S.          Página {PAGE} de {NUMPAGES}',
        [
            'name' => 'Arial',
            'size' => 9,
            'color' => '666666'
        ],
        [
            'alignment' => 'center'
        ]
    );
}