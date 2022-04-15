<?php

return [
    'paths' => [
        "/faqs" => [
            "get" => [
                "tags" => [
                    "common"
                ],
                "summary" => "All FAQs List",
                "description" => "",
                "consumes" => [
                    "application/json"
                ],
                "responses" => [
                    "405" => [
                        "description" => "Invalid input"
                    ]
                ],
            ],
        ],
        "/terms-and-conditions" => [
            "get" => [
                "tags" => [
                    "common"
                ],
                "summary" => "Get terms and conditions",
                "description" => "Get terms and conditions",
                "operationId" => "terms-and-conditions",
                "consumes" => [
                    "application/json"
                ],
                "produces" => [
                    "application/json",
                ],
                "responses" => [
                ]
            ]
        ],
        "/privacy-policy" => [
            "get" => [
                "tags" => [
                    "common"
                ],
                "summary" => "Get privacy policy.",
                "description" => "Get all privacy policy.",
                "operationId" => "privacy-policy",
                "consumes" => [
                    "application/json"
                ],
                "produces" => [
                    "application/json",
                ],
                "responses" => [
                ]
            ]
        ],
        "/countries-list" => [
            "get" => [
                "tags" => [
                    "common"
                ],
                "summary" => "All Countries List.",
                "description" => "",
                "consumes" => [
                    "application/json"
                ],
                "responses" => [
                    "405" => [
                        "description" => "Invalid input"
                    ]
                ],
            ],
        ],
        "/notifications-list" => [
            "get" => [
                "tags" => [
                    "common"
                ],
                "summary" => "All notifications list.",
                "description" => "All notifications list.",
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
        'verifyUserOtp' => [
            'type' => "object",
            'properties' => [
                'email' => [
                    'type' => 'string'
                ],
                'otp' => [
                    'type' => 'string'
                ],
            ],
            'xml' => [
                'name' => "Verify user otp"
            ]
        ],
        'resendVerificationOtp' => [
            'type' => "object",
            'properties' => [
                'email' => [
                    'type' => 'string'
                ],
            ],
            'xml' => [
                'name' => "Resend verification otp"
            ]
        ],
        'forgotPassword' => [
            'type' => "object",
            'properties' => [
                'email' => [
                    'type' => 'string'
                ],
            ],
            'xml' => [
                'name' => "Forgot password"
            ]
        ],
        'resetPassword' => [
            'type' => "object",
            'properties' => [
                'otp_number' => [
                    'type' => 'string'
                ],
                'password' => [
                    'type' => 'string'
                ],
            ],
            'xml' => [
                'name' => "Reset"
            ]
        ],
        // 'twilioVideoToken' => [
        //     'type' => "object",
        //     'properties' => [
        //         'username' => [
        //             'type' => 'string'
        //         ],
        //         'room' => [
        //             'type' => 'string'
        //         ],
        //     ],
        //     'xml' => [
        //         'name' => "Reset"
        //     ]
        // ],        
    ],
];
