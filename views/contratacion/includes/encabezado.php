<?php

function crearEncabezado($section, $tipoDocumento, $logo)
{
    //=========================
    // ENCABEZADO
    //=========================

    $header = $section->addHeader();

    if(file_exists($logo))
    {
        $header->addImage(
            $logo,
            [
                'width' => 65,
                'height' => 65,
                'alignment' => 'left'
            ]
        );
    }

    $header->addText(
        'PLÁSTICOS Y PET DE COLOMBIA S.A.S.',
        [
            'bold' => true,
            'size' => 14,
            'name' => 'Arial',
            'color' => '0B5394'
        ],
        [
            'alignment' => 'center',
            'spaceAfter' => 80
        ]
    );

    $header->addText(
        strtoupper($tipoDocumento),
        [
            'bold' => true,
            'size' => 11,
            'name' => 'Arial',
            'color' => '2E7D32'
        ],
        [
            'alignment' => 'center',
            'spaceAfter' => 120
        ]
    );

    $header->addLine(
        [
            'weight' => 1,
            'width' => 460,
            'height' => 0,
            'color' => '0B5394'
        ]
    );
}