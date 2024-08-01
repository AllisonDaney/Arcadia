<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SeederProvider extends Seeder
{
    protected $homes = [
        [
            "label" => "Savane",
            "content" => "Une savane est un type de biome caractérisé par des herbes hautes et des arbres dispersés.
                        Elle se trouve généralement dans les régions tropicales et subtropicales, où il y a une saison
                        sèche prolongée suivie d'une saison des pluies. Les savanes abritent une grande diversité de vie sauvage,
                        notamment des herbivores tels que les zèbres, les girafes et les éléphants, ainsi que des prédateurs tels
                        que les lions et les léopards. ",
            "homes_pictures" => [
                [
                    "url" => "img/uploads/homes/savane.jpeg"
                ]
            ],
        ],
        [
            "label" => "Jungle",
            "content" => "Une jungle est un type de biome forestier dense, souvent situé dans les régions tropicales et subtropicales.
                            Elle se caractérise par une végétation luxuriante, comprenant de grands arbres à feuillage dense, une canopée
                            épaisse et une diversité d'espèces végétales et animales. Les jungles abritent une grande variété de vie sauvage,
                            notamment des singes, des serpents, des oiseaux exotiques. ",
            "homes_pictures" => [
                [
                    "url" => "img/uploads/homes/jungle.jpeg"
                ]
            ],
        ],
        [
            "label" => "Marais",
            "content" => "Un marais est un type d'écosystème terrestre humide caractérisé par des sols saturés d'eau, ce qui crée des conditions
                            favorables à la croissance de plantes adaptées à un milieu humide. Les marais se trouvent généralement dans des zones
                            où l'eau s'accumule naturellement, comme le long des cours d'eau, des lacs, des estuaires ou des zones côtières.
                            Les marais abritent également une grande variété d'animaux, notamment des oiseaux aquatiques, des poissons, des amphibiens",
            "homes_pictures" => [
                [
                    "url" => "img/uploads/homes/marais.jpeg"
                ]
            ],
        ],
    ];

    protected $animals = [
        "Savane" => [
            [
                "name" => "Zébu",
                "breed" => "Zèbre ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/zebre.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Léo",
                "breed" => "Lion ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/lion.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Gladis",
                "breed" => "Girafe ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/girafe.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Eliot",
                "breed" => "Elephant ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/elephant.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Helene",
                "breed" => "Hippopotame ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/hippopotame.jpeg"
                    ]
                ],
            ],
        ],
        "Jungle" => [
            [
                "name" => "Pako",
                "breed" => "Paresseux",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/paresseux.jpeg"
                    ]
                ],
            ],
             [
                "name" => "Erik",
                "breed" => "Tamarin ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/tamarin.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Alfy",
                "breed" => "Ara rouge ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/ara.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Odie",
                "breed" => "Okapi ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/okapi.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Charly",
                "breed" => "Chimpanzé ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/chinpanze.jpeg"
                    ]
                ],
            ],
        ] ,
        "Marais" => [
            [
                "name" => "Basile",
                "breed" => "Buffle d'Afrique",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/buffle.jpeg"
                    ]
                ],
            ],
             [
                "name" => "Ava",
                "breed" => "Alligator ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/aligator.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Caty",
                "breed" => "Caïman noir ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/caiman.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Chloe",
                "breed" => "Couleuvre à collier ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/couleuvre.jpeg"
                    ]
                ],
            ],
            [
                "name" => "Sarah",
                "breed" => "Salamandre ",
                "animals_pictures" => [
                    [
                        "url" => "img/uploads/animals/salamandre.jpeg"
                    ]
                ],
            ],
        ]

    ];

    protected $services = [
        [
            "label" => "Restauration",
            "content" => " Bienvenue aux restaurants de notre zoo, où la gastronomie rencontre la nature !
            Nous sommes enchantés de vous présenter une sélection diversifiée de lieux de
            restauration conçus pour satisfaire tous les goûts et toutes les envies,
            tout en vous offrant une expérience culinaire unique au cœur de notre parc animalier.
            Bon appétit !",
            "url" => "img/uploads/services/restaurant.jpeg",
            "options" => [
                "Le Safari Café" => "Plongez dans une atmosphère exotique au Safari Café, situé à proximité de nos zones d'animaux africains. Dégustez des plats inspirés de la cuisine africaine et internationale, tout en profitant de vues panoramiques sur nos savanes et nos habitats africains. Le Safari Café propose une variété de plats savoureux, des sandwichs et salades rafraîchissantes aux plats chauds copieux, ainsi qu'une sélection de desserts délicieux.",
                "La Jungle Grill" => "Pour une expérience de restauration en plein air, rendez-vous à la Jungle Grill, nichée au cœur de notre zone tropicale luxuriante. Découvrez une ambiance détendue et décontractée tandis que vous savourez des grillades fraîches, des burgers juteux, des salades fraîches et des collations légères. La Jungle Grill offre également des options végétariennes et des menus pour enfants, ce qui en fait un choix idéal pour les familles.",
                "La Terrasse des Singes" => "Vivez une expérience unique en prenant place à la Terrasse des Singes, un restaurant en hauteur offrant une vue imprenable sur les habitats de nos primates. Dégustez une cuisine légère et raffinée, des salades fraîches aux plats de pâtes savoureux, tout en observant nos singes jouer et se balancer dans les arbres à proximité.",
                "Le Bistro des Oiseaux" => "Pour une ambiance pittoresque et colorée, visitez le Bistro des Oiseaux, un café charmant situé près de notre volière. Détendez-vous en sirotant un café fraîchement moulu ou dégustez des pâtisseries artisanales tout en admirant la beauté et la diversité de nos oiseaux exotiques.",
                //"Le Kiosque des Glaces" => "Pour une pause rafraîchissante, arrêtez-vous au Kiosque des Glaces et découvrez une sélection de délices glacés, des cornets de crème glacée aux sorbets fruités. Parfait pour se rafraîchir lors d'une journée ensoleillée au zoo.",
            ]
        ],
        [
            "label" => "Visite guidée",
            "content" => "Bienvenue à la visite guidée de notre zoo !
            Nous sommes enchantés de vous offrir une expérience immersive et éducative au cœur de notre parc animalier.
            Notre visite guidée est conçue pour vous plonger dans le monde fascinant de la faune tout en vous fournissant
            des informations précieuses sur nos pensionnaires et sur les efforts de conservation que nous menons.
            Bonne visite!",
            "url" => "img/uploads/services/guide_touristique.jpeg",
            "options" => [
                "Guides Experts" => "Nos guides sont des passionnés de la nature et des experts dans leur domaine. Ils partageront avec vous leurs connaissances approfondies sur chaque espèce animale, ainsi que des anecdotes intéressantes et des faits surprenants pour enrichir votre expérience.",
                "Itinéraire Captivant" => "Notre visite guidée vous emmènera à travers les différentes zones de notre zoo, vous permettant de découvrir une grande variété d'animaux, des plus emblématiques aux plus insolites. Vous aurez l'occasion de vous approcher de près de ces créatures magnifiques et d'en apprendre davantage sur leur comportement, leur habitat et leurs habitudes alimentaires.",
                "Éducation et Sensibilisation" => "Nous croyons en l'importance de sensibiliser le public à la conservation de la biodiversité et au respect de l'environnement. Tout au long de la visite, nos guides mettront en lumière les défis auxquels sont confrontés les animaux sauvages dans la nature et les actions que nous pouvons prendre pour les protéger.",
                "Interactivité" => "Notre visite guidée offre également des opportunités d'interaction avec certains animaux, sous la supervision de nos soigneurs qualifiés. Vous pourrez peut-être nourrir certains pensionnaires, assister à des démonstrations de comportements naturels ou poser des questions directement à nos experts.",
                //"Durée Adaptée" => "La visite guidée est adaptée à tous les âges et niveaux d'intérêt, avec une durée généralement d'une à deux heures pour couvrir les points forts de notre zoo tout en laissant du temps pour explorer librement par la suite.",
            ]
        ],
        [
            "label" => "Petit train",
            "content" => "Bienvenue à bord du service de petit train pour la visite de notre zoo !
            Nous sommes ravis de vous présenter une façon pratique et agréable de découvrir tous les trésors de notre parc animalier.
            Avec notre petit train, vous pourrez explorer chaque recoin de notre zoo en toute simplicité, confortablement installé et
            prêt à vivre une aventure inoubliable. Notre petit train est spécialement conçu pour offrir une expérience unique à nos visiteurs.
            Bon voyage ! ",
            "url" => "img/uploads/services/petit_train.jpeg",
            "options" => [
                "Confort et Sécurité" => "Notre petit train est équipé de sièges confortables et sécurisés, assurant une balade plaisante pour toute la famille. Les normes de sécurité les plus strictes sont respectées pour garantir une expérience paisible.",
                "Guidage Professionnel" => "Tout au long de votre trajet, notre personnel qualifié vous fournira des commentaires instructifs et divertissants sur les différents animaux et attractions que vous rencontrerez. Vous découvrirez des anecdotes fascinantes sur nos pensionnaires, enrichissant ainsi votre visite.",
                "Accessibilité" => "Le petit train est accessible à tous, y compris aux personnes à mobilité réduite, garantissant que chacun puisse profiter pleinement de la beauté de notre zoo.",
                "Parcours Scénique" => "Notre itinéraire a été soigneusement planifié pour vous offrir les meilleures vues sur nos enclos animaliers et nos paysages naturels. Vous aurez l'occasion de voir de près une variété d'animaux exotiques et indigènes dans leur habitat naturel reconstitué.",
                //"Flexibilité" => "Le petit train propose des départs réguliers tout au long de la journée, vous permettant de planifier votre visite à votre rythme. Vous pouvez monter et descendre à différents arrêts pour explorer à pied et prendre des photos souvenirs.",
            ]
        ],
    ];

    protected $hours = [
        [
            "day" => "Lundi",
            "opening_time" => "10:00:00",
            "closing_time" => "17:00:00",

        ],
        [
            "day" => "Mardi",
            "opening_time" => "10:00:00",
            "closing_time" => "17:00:00",

        ],
        [
            "day" => "Mercredi",
            "opening_time" => "09:00:00",
            "closing_time" => "18:00:00",

        ],
        [
            "day" => "Jeudi",
            "opening_time" => "10:00:00",
            "closing_time" => "17:00:00",

        ],
        [
            "day" => "Vendredi",
            "opening_time" => "10:00:00",
            "closing_time" => "17:00:00",

        ],
        [
            "day" => "Samedi",
            "opening_time" => "09:00:00",
            "closing_time" => "18:00:00",

        ],
        [
            "day" => "Dimanche",
            "opening_time" => "09:00:00",
            "closing_time" => "18:00:00",

        ],
    ];

    protected $roles = [
        [
            "label" => "ADMINISTRATOR",
        ],
        [
            "label" => "EMPLOYEE",
        ],
        [
            "label" => "VETERINARY",
        ],
    ];

    protected $users = [
        [
            "role" => "ADMINISTRATOR",
            "username" => "m.jose.arcadia@yopmail.com",
            "password" => "admin",
            "firstname" => "José",
            "lastname" => "Mendoza",
        ]
    ];
}
