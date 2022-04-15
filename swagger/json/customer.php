<?php

return [
    'paths' => [
        "/all-users" => [
            "get" => [
                "tags" => [
                    "customer"
                ],
                "summary" => "All Active users List",
                "description" => "",
                "consumes" => [
                    "application/json"
                ],
                "parameters" => [
                    [
                        "name" => "authorization",
                        "in" => "header",
                        "description" => "User access token",
                        "required" => true,
                        "type" => "string",
                        "format" => "int64"
                    ],
                ],                 
                "responses" => [
                    "405" => [
                        "description" => "Invalid input"
                    ]
                ],
            ],
        ],
        // "/all-drinks" => [
        //     "get" => [
        //         "tags" => [
        //             "customer"
        //         ],
        //         "summary" => "All Drinks",
        //         "description" => "",
        //         "consumes" => [
        //             "application/json"
        //         ],
        //         "parameters" => [
        //             [
        //                 "name" => "authorization",
        //                 "in" => "header",
        //                 "description" => "User access token",
        //                 "required" => true,
        //                 "type" => "string",
        //                 "format" => "int64"
        //             ],
        //         ],                 
        //         "responses" => [
        //             "405" => [
        //                 "description" => "Invalid input"
        //             ]
        //         ],
        //     ],
        // ],   
        "/all-drink-categories" => [
            "get" => [
                "tags" => [
                    "customer"
                ],
                "summary" => "All Drinks.",
                "description" => "",
                "consumes" => [
                    "application/json"
                ],
                "parameters" => [
                    [
                        "name" => "authorization",
                        "in" => "header",
                        "description" => "User access token",
                        "required" => true,
                        "type" => "string",
                        "format" => "int64"
                    ],
                ],                 
                "responses" => [
                    "405" => [
                        "description" => "Invalid input"
                    ]
                ],
            ],
        ],             
        // "/send-a-drink" => [
        //     "post" => [
        //         "tags" => [
        //             "customer"
        //         ],
        //         "summary" => "Send A Drink.",
        //         "description" => "Send A Drink.",
        //         "operationId" => "sendDrink.",
        //         "consumes" => [
        //             "application/json"
        //         ],
        //         "produces" => [
        //             "application/json",
        //         ],
        //         "parameters" => [
        //             [
        //                 "name" => "authorization",
        //                 "in" => "header",
        //                 "description" => "User access token",
        //                 "required" => true,
        //                 "type" => "string",
        //                 "format" => "int64"
        //             ],                    
        //             [
        //                 "in" => "body",
        //                 "name" => "body",
        //                 "description" => 'Send A Drink 
        //                     FORMAT :
        //                     {
        //                     "user_id": 2,
        //                     "phone": "+91123456789",
        //                     "message": "test",
        //                     "total_price":120,
        //                     "venue": "test address",
        //                     "drink_array": [{"drink_id": "1","quantity": "12"},{"drink_id": "2","quantity": "12"}],
        //                     "payment_gateway" : "stripe/paypal",
        //                     "card_number" : "4242424242424242",
        //                     "expire_date" : "01/21",
        //                     "cvv" : "123"
        //                     }',
        //                 "required" => true,
        //                 "schema" => [
        //                     '$ref' => "#/definitions/sendDrink"
        //                 ]
        //             ],                    
        //         ],
        //         "responses" => [
        //         ]
        //     ]
        // ],

        "/send-a-drink" => [
            "post" => [
                "tags" => [
                    "customer"
                ],
                "summary" => "Send A Drink.",
                "description" => "Send A Drink.",
                "operationId" => "sendDrink",
                "consumes" => [
                    "multipart/form-data"
                ],
                "produces" => [
                    "application/json"
                ],
                "parameters" => [
                    [
                        "name" => "authorization",
                        "in" => "header",
                        "description" => "User access token",
                        "required" => true,
                        "type" => "string",
                        "format" => "int64"
                    ],                    
                    [
                        "name" => "user_id",
                        "in" => "formData",
                        'required' => true,
                        "description" => "To user id",
                        "type" => "integer",
                    ],
                    [
                        "name" => "phone",
                        "in" => "formData",
                        'required' => true,
                        "description" => "Phone",
                        "type" => "string",
                    ],
                    [
                        "name" => "message",
                        "in" => "formData",
                        'required' => true,
                        "description" => "Message",
                        "type" => "string",
                    ],
                    [
                        "name" => "address_line_1",
                        "in" => "formData",
                        'required' => true,
                        "description" => "Address line 1",
                        "type" => "string",
                    ],
                    [
                        "name" => "total_price",
                        "in" => "formData",
                        'required' => true,
                        "description" => "Total Price",
                        "type" => "string",
                    ],
                    [
                        "name" => "venue",
                        "in" => "formData",
                        'required' => true,
                        "description" => "Venue",
                        "type" => "string",
                    ],
                    [
                        "name" => "drink_array",
                        "in" => "formData",
                        'required' => true,
                        "description" => 'drink_array format :  [{"drink_id": "1","quantity": "12"},{"drink_id": "2","quantity": "12"}]',
                        "type" => "string",
                    ],
                    [
                        "name" => "image",
                        "in" => "formData",
                        'required' => false,
                        "description" => "image",
                        "type" => "file",
                    ],                    
                    [
                        "name" => "payment_gateway",
                        "in" => "formData",
                        'required' => true,
                        "description" => "Payment Gateway stripe/paypal",
                        "type" => "string",
                    ],
                    [
                        "name" => "card_number",
                        "in" => "formData",
                        'required' => true,
                        "description" => "Card Number e.g. 4242424242424242",
                        "type" => "string",
                    ],
                    [
                        "name" => "expire_date",
                        "in" => "formData",
                        'required' => true,
                        "description" => "Expire Date format 01/24",
                        "type" => "string",
                    ],
                    [
                        "name" => "cvv",
                        "in" => "formData",
                        'required' => true,
                        "description" => "cvv eg. 123",
                        "type" => "string",
                    ],
                ],
                "responses" => [
                ]
            ]
        ],
        "/order-gifts-list" => [
            "get" => [
                "tags" => [
                    "customer"
                ],
                "summary" => "All order or gifts sent by customer or recived by customer.",
                "description" => "",
                "consumes" => [
                    "application/json"
                ],
                "parameters" => [
                    [
                        "name" => "authorization",
                        "in" => "header",
                        "description" => "User access token",
                        "required" => true,
                        "type" => "string",
                        "format" => "int64"
                    ],
                    [
                        "in" => "query",
                        "name" => "user_id",
                        "description" => "user id on if to check recived gifts.",
                        "required" => false,
                        "type" => "integer",
                        "format" => "int64"
                    ],                    
                ],                 
                "responses" => [
                    "405" => [
                        "description" => "Invalid input"
                    ]
                ],
            ],
        ],        
    ],
    'definitions' => [
        'sendDrink' => [
            'type' => "object",
            'properties' => [
                'user_id' => [
                    'type' => 'integer'
                ],
                'phone_number' => [
                    'type' => 'string'
                ],
                'message' => [
                    'type' => 'string'
                ],
                'venue' => [
                    'type' => 'string'
                ],
                'total_price' => [
                    'type' => 'string'
                ],
                'drink_array' => [
                    'type' => 'array'
                ],
                'payment_gateway' => [
                    'type' => 'string'
                ],
                'card_number' => [
                    'type' => 'integer'
                ],
                'expire_date' => [
                    'type' => 'string'
                ],
                'cvv' => [
                    'type' => 'string'
                ],
            ],
            'xml' => [
                'name' => "Verify user otp"
            ]
        ],    
    ],
];
