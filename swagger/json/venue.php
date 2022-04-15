<?php

return [
    'paths' => [
        "/venues-list" => [
            "get" => [
                "tags" => [
                    "venue"
                ],
                "summary" => "All Venues List",
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
    ],
    'definitions' => [     
   
    ],
];
