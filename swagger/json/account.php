<?php

return [
    'paths' => [
        
        "/register" => [
            "post" => [
                "tags" => [
                    "account"
                ],
                "summary" => "Sign Up",
                "description" => "Sign Up",
                "operationId" => "signup",
                "consumes" => [
                    "application/json"
                ],
                "produces" => [
                    "application/json",
//                   "application/xml",
                ],
                "parameters" => [
                    [
                        "in" => "body",
                        "name" => "body",
                        "description" => "Registration Params format: (role : 'customer', phone should be with country code eg:  +919876543210,   is_allow_email : 'true/false' etc.)",
                        "required" => true,
                        "schema" => [
                            '$ref' => "#/definitions/registerUser"
                        ]
                    ],                    
                ],
                "responses" => [
                ]
            ]
        ],
        "/login" => [
            "post" => [
                "tags" => [
                    "account"
                ],
                "summary" => "Login a user",
                "description" => "Login a user",
                "operationId" => "login",
                "consumes" => [
                    "application/json",
                ],
                "produces" => [
                    "application/json"
                ],
                "parameters" => [
                    [
                        "in" => "body",
                        "name" => "body",
                        "description" => "Login Params format: (role : 'customer','venue'), (certification_type : development or distribution,  device_type: ios or android)",
                        "required" => true,
                        "schema" => [
                            '$ref' => "#/definitions/login"
                        ]
                    ],
                ],
                "responses" => [
                    "default" => [
                        "description" => "successful operation"
                    ]
                ]
            ]
        ],
      
      
        "/logout" => [
            "post" => [
                "tags" => [
                    "account"
                ],
                "summary" => "Logout user",
                "description" => "Logout user",
                "operationId" => "logout",
                "consumes" => [
                    "application/json"
                ],
                "produces" => [
                    "application/json",
                //                   "application/xml",
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
                ]
            ]
        ],
    ],
];   