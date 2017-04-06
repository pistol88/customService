Instalation

Just copy\clone this files to /backend/widgets/customService directory and add controller map to application config:

```
    'controllerMap' => [

        'custom-service' => [

            'class' => 'backend\widgets\customService\controllers\CustomController',

            'enableCsrfValidation' => false,

        ],

    ],
```

Do not forget dump this sql:

```
CREATE TABLE IF NOT EXISTS `service_custom` (
  `id` int(11) NOT NULL,
  `name` varchar(155) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```