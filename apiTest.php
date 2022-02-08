<?php
    $donnees1=["un"=>"coucou",
                "deux"=> "un autre mot"
                                        ];
    $donnees2= ["un"=>"salut",
            "deux"=> "autre mot plus long"
                                        ];
    $donnees3= ["un"=>"bonjour",
            "deux"=> "un autre mot moins long"
                                        ];

    $unTableau = [$donnees1, $donnees2, $donnees3];

        header('Access-Control-Allow-Origin: *');
        $donneesSerializees = json_encode($unTableau);

    echo $donneesSerializees;
