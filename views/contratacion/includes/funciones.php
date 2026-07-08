<?php

use PhpOffice\PhpWord\Shared\Converter;

function numeroALetras($numero)
{
    if (class_exists('NumberFormatter')) {
        $fmt = new NumberFormatter("es_CO", NumberFormatter::SPELLOUT);
        return ucfirst($fmt->format($numero)) . " pesos";
    }

    return "$ " . number_format($numero, 0, ',', '.');
}

function formatearFecha($fecha)
{
    if (empty($fecha) || $fecha == '0000-00-00') {
        return '';
    }

    $meses = [
        1=>'enero',
        'febrero',
        'marzo',
        'abril',
        'mayo',
        'junio',
        'julio',
        'agosto',
        'septiembre',
        'octubre',
        'noviembre',
        'diciembre'
    ];

    $f = new DateTime($fecha);

    return $f->format('d') .
        " de " .
        $meses[(int)$f->format('m')] .
        " de " .
        $f->format('Y');
}

function agregarTitulo($section,$texto,$size=14)
{
    $section->addText(
        $texto,
        [
            'bold'=>true,
            'size'=>$size,
            'name'=>'Arial',
            'color'=>'0B5394'
        ],
        [
            'alignment'=>'center',
            'spaceAfter'=>300
        ]
    );
}

function agregarSubtitulo($section,$texto)
{
    $section->addText(
        $texto,
        [
            'bold'=>true,
            'size'=>11,
            'name'=>'Arial'
        ],
        [
            'spaceBefore'=>200,
            'spaceAfter'=>120
        ]
    );
}

function agregarTexto($section,$texto)
{
    $section->addText(
        $texto,
        [
            'name'=>'Arial',
            'size'=>11
        ],
        [
            'alignment'=>'both',
            'spaceAfter'=>160,
            'lineHeight'=>1.3
        ]
    );
}

function agregarFirma($section,$nombre,$cargo='')
{
    $section->addTextBreak(2);

    $section->addText(
        '_____________________________________',
        [],
        ['alignment'=>'center']
    );

    $section->addText(
        $nombre,
        [
            'bold'=>true,
            'name'=>'Arial',
            'size'=>11
        ],
        [
            'alignment'=>'center'
        ]
    );

    if($cargo!='')
    {
        $section->addText(
            $cargo,
            [
                'size'=>10
            ],
            [
                'alignment'=>'center'
            ]
        );
    }
}