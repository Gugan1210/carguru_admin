<?php

namespace App\Constants;

class commonConstant
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    const CAR_MAKE_DROPDOWN_MODEL = [
        'transmission' => ['model' => 'App\Models\CarMakeTransmission'],
        'fuel_type' => ['model' => 'App\Models\CarMakeFuelType'],
        'drive_train' => ['model' => 'App\Models\CarMakeDriveTrain'],
        'start_year' => ['model' => 'App\Models\CarMakeMadeYear'],
        'end_year' => ['model' => 'App\Models\CarMakeMadeYear'],
        'seat' => ['model' => 'App\Models\CarMakeSeat'],
        'exterior_color' => ['model' => 'App\Models\CarMakeExteriorColor'],
        'interior_color' => ['model' => 'App\Models\CarMakeInteriorColor'],
        'consumption' => ['model' => 'App\Models\CarMakeConsumption'],
        'engine_type' => ['model' => 'App\Models\CarMakeEngineType'],
        'engine_cc' => ['model' => 'App\Models\EngineCC'],
        'brake_front' => ['model' => 'App\Models\CarMakeBrake'],
        'brake_rear' => ['model' => 'App\Models\CarMakeBrake'],
        'suspension_front' => ['model' => 'App\Models\CarMakeSuspension'],
        'suspension_back' => ['model' => 'App\Models\CarMakeSuspension'],
        'steering' => ['model' => 'App\Models\CarMakeSteering'],
        'manufacturers_warranty' => ['model' => 'App\Models\CarMakeManufacturersWarranty'],
        'cargurus_warranty' => ['model' => 'App\Models\CarMakeCarGurusWarranty'],
        'car_info_category' => ['model' => 'App\Models\CarDetailCategory'],
        'car_registration_type' => ['model' => 'App\Models\CarDetailRegistrationType'],
        'car_info_exterior_color' => ['model' => 'App\Models\CarMakeExteriorColor'],
        'usage' => ['model' => 'App\Models\CarDetailUsage'],
        'ad_placement' => ['model' => 'App\Models\AdPlacement'],
        'ad_topic' => ['model' => 'App\Models\AdTopic'],
        'body_type' => ['model' => 'App\Models\BodyType'],
        'department' => ['model' => 'App\Models\StaffDepartment'],
        'business_unit' => ['model' => 'App\Models\Business_unit'],
        'commissionType' => ['model' => 'App\Models\Commision_Type'],
        'relationship' => ['model' => 'App\Models\StaffRelationship'],
        'race' => ['model' => 'App\Models\StaffRace'],
        'car_info_location' => ['model' => 'App\Models\BranchCenter'],
        'branch_type' => ['model' => 'App\Models\BranchType'],
        'brand_country' => ['model' => 'App\Models\Country'],
        'handlingfeeType' => ['model' => 'App\Models\HandlingFeeType'],
        'inspectionfeeType' => ['model' => 'App\Models\InspectionFeeType'],
        'dealersfeeType' => ['model' => 'App\Models\dealerFeeType'],
        'othersfeeType' => ['model' => 'App\Models\OtherFeeType'],
        'taxfeeType' => ['model' => 'App\Models\TaxFeeType'],
    ];

    const COUNTRY_DETAILS_PATH = 'app/public/files/countries_array_completed.json';

    const SIDE_MENU_HEAD = [
        [
            'title' => 'REFERENCE DATA MANAGEMENT',
            'model' => '',
            'url' => '#',
            'icon' => '',
            'submenu' => [
                ['title' => 'Country', 'model' => '', 'url' => 'country', 'icon' => ''],
                ['title' => 'Currency', 'model' => '', 'url' => 'currency', 'icon' => ''],
                ['title' => 'LANGUAGE', 'model' => '', 'url' => 'language', 'icon' => ''],
                ['title' => 'TIME ZONE', 'model' => '', 'url' => '#', 'icon' => ''],
                ['title' => 'UNIT MEASUREMENTS', 'model' => '', 'url' => '#', 'icon' => ''],
                [
                    'title' => 'Drop Down',
                    'model' => '',
                    'url' => '#',
                    'icon' => '',
                    'submenu' => [
                        ['title' => 'Transmission', 'model' => '', 'url' => 'dynamic/dropdown/transmission', 'icon' => ''],
                        ['title' => 'Fuel Type', 'model' => '', 'url' => 'dynamic/dropdown/fuel_type', 'icon' => ''],
                        ['title' => 'Drive Train', 'model' => '', 'url' => 'dynamic/dropdown/drive_train', 'icon' => ''],
                        ['title' => 'Made Year', 'model' => '', 'url' => 'dynamic/dropdown/made_year', 'icon' => ''],
                        ['title' => 'Engine Type', 'model' => '', 'url' => 'dynamic/dropdown/engine_type', 'icon' => ''],
                        ['title' => 'Brake', 'model' => '', 'url' => 'dynamic/dropdown/brake', 'icon' => ''],
                        ['title' => 'Steering', 'model' => '', 'url' => 'dynamic/dropdown/steering', 'icon' => ''],
                        ['title' => 'Seat', 'model' => '', 'url' => 'dynamic/dropdown/make_seat', 'icon' => ''],
                        ['title' => 'Consumption', 'model' => '', 'url' => 'dynamic/dropdown/make_consumption', 'icon' => ''],
                        ['title' => 'Suspension', 'model' => '', 'url' => 'dynamic/dropdown/make_suspension', 'icon' => ''],
                        ['title' => 'Manufacturers Warranty', 'model' => '', 'url' => 'dynamic/dropdown/manufacturers_warranty', 'icon' => ''],
                        ['title' => 'Category', 'model' => '', 'url' => 'dynamic/dropdown/detail_category', 'icon' => ''],
                        ['title' => 'Cargurus Warranty', 'model' => '', 'url' => 'dynamic/dropdown/cargurus_warranty', 'icon' => ''],
                        ['title' => 'Registration Type', 'model' => '', 'url' => 'dynamic/dropdown/registration_type', 'icon' => ''],
                        ['title' => 'Exterior Color', 'model' => '', 'url' => 'dynamic/dropdown/exterior_color', 'icon' => ''],
                        ['title' => 'Interior Color', 'model' => '', 'url' => 'dynamic/dropdown/interior_color', 'icon' => ''],
                    ],
                ],

                // [
                //     'title' => 'Car Brand Management',
                //     'model' => '',
                //     'url' => '#',
                //     'icon' => '',
                //     'submenu' => [
                //         ['title' => 'Brand', 'model' => '', 'url' => 'makes', 'icon' => ''],
                //         ['title' => 'Model', 'model' => '', 'url' => 'models', 'icon' => ''],
                //         ['title' => 'Variant', 'model' => '', 'url' => 'variants', 'icon' => ''],
                //     ]
                // ]
            ],
        ],
        [
            'title' => 'CAR MASTER DATA',
            'model' => '',
            'url' => '#',
            'icon' => '',
            'submenu' => [
                ['title' => 'Car Make', 'model' => '', 'url' => 'carmakes', 'icon' => ''],
                ['title' => 'Inspection & Certification', 'model' => '', 'url' => 'car_master/inspections', 'icon' => ''],
            ],
        ],

        [
            'title' => 'MARKETING',
            'model' => '',
            'url' => '#',
            'icon' => '',
            'submenu' => [
                ['title' => 'Advertising & Promotion', 'model' => '', 'url' => 'marketing/advertising-promotion/', 'icon' => ''],
                ['title' => 'Promos & Discounts', 'model' => '', 'url' => 'marketing/promo_discounts/', 'icon' => ''],
            ],
        ],
        ['title' => 'HUMAN CAPITAL', 'model' => '', 'url' => '#', 'icon' => '', 'submenu' => []],
        ['title' => 'FINANCE', 'model' => '', 'url' => '#', 'icon' => '', 'submenu' => []],
        [
            'title' => 'OPERATIONS',
            'model' => '',
            'url' => '#',
            'icon' => '',
            'submenu' => [
                ['title' => 'Car Details', 'model' => '', 'url' => 'car-details', 'icon' => ''],
            ]
        ],
        ['title' => 'SALES', 'model' => '', 'url' => '#', 'icon' => '', 'submenu' => []],
        ['title' => 'DEALER MANAGAMENT', 'model' => '', 'url' => '#', 'icon' => '', 'submenu' => []],
        [
            'title' => 'USER MANAGAMENT',
            'model' => '',
            'url' => '#',
            'icon' => '',
            'submenu' => [
                ['title' => 'Users', 'model' => '', 'url' => 'users', 'icon' => ''],
                ['title' => 'Roles', 'model' => '', 'url' => 'roles', 'icon' => ''],
            ]
        ],
    ];

    const CAR_MAKE_RELATIONSHIP_INDEX = ['getEngine', 'getVariant', 'getStartYear', 'getTransmission', 'getDriveTrain', 'getFuelType'];
    const CAR_MAKE_RELATIONSHIP_SHOW = ['getCountry', 'getEngine', 'getDiamension', 'getBrake', 'getWarranty', 'getEngine', 'getVariant', 'getTransmission', 'getDriveTrain', 'getFuelType', 'getStartYear', 'getEndYear', 'getSeat'];

    const CAR_DETAIL_RELATIONSHIP_INDEX = ['getCarDetailAccident', 'getCarDetailCategory', 'getVariant'];

    const CAR_DETAIL_RELATIONSHIP_SHOW = ['getCarDetailAccident', 'getRegistrationType', 'getCarDetailCategory', 'getVariant'];

    const CAR_MAKE_RESET_FIELDS = [
        "brand_country",
        "brand_id",
        "model_id",
        "start_year",
        "end_year",
        "variant_id",
        "body_type",
        "transmission",
        "drive_train",
        "fuel_type",
        "no_of_door",
        "seat",
        "consumption",
        "consumption_value_km_l",
        "mprs",
        "engine_cc",
        "engine_type",
        "compression_ratio",
        "peak_power_kw",
        "peak_torque_nm",
        "length_mm",
        "weight_mm",
        "height_mm",
        "wheel_base_mm",
        "kerb_weight_kg",
        "fuel_tank_ltr",
        "brake_front",
        "brake_rear",
        "suspension_front",
        "suspension_back",
        "steering",
        "wheel_type_front",
        "wheel_type_rear",
        "wheel_type_front_rims",
        "wheel_type_rear_rims",
        "features_equipments",
        "manufacturers_warranty",
        "cargurus_warranty",
        "road_tax_amount_rm"
    ];

    const CAR_DETAIL_RESET_FIELDS = [
        'car_detail_id',
        'car_info_category',
        'car_info_price',
        'car_info_location',
        'brand_id',
        'model_id',
        'variant_id',
        'car_info_fuel_type',
        'car_info_registration_type',
        'car_info_registration_number',
        'car_info_registration_date',
        'car_info_car_make_year',
        'car_info_exterior_color',
        'interior_color',
        'number_of_keys',
        'engine_number',
        'chassis_number',
        'mileage',
        'owner',
        'usage',
        'car_accident',
        'flood_car',
        'manufacturers_warranty',
        'cargurus_warranty',
        'road_tax_amount',
        'road_tax_year',
        'inspector_feedback_comment',
        'carguru_spotlight_header_copy',
        'carguru_spotlight_body_copy',
        'voc_document',
        'roadtax_document',
        'picture_of_keys',
        'others'
    ];

    const MARKETING_ADVERTISMENT_PROMOTION_FIELDS = [
        'set',
        'banner_web',
        'banner_mob',
        'banner_url',
        'status',
        'ad_placement',
        'ad_topic',
        'headline_content_text'
    ];

    const MARKETING_PROMOS_DISCOUNTS_FIELDS = [
        'promotion_name',
        'promotion_detail',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'car_category',
        'shortlist_car_promo_input',
        'car_detail_id_promo',
        'registration_number',
        'amount_discount',
        'percentage_discount',
        'discount_format',
        'display',
        'discount',
    ];

    const CAPITAL_HUMAN_STAFF = [
        "staff_id",
        "business_unit",
        "department",
        "status",
        "designated_role",
        "designated_location",
        "specific_function",
        "name",
        "i_c_number",
        "gender",
        "race",
        "contact_number",
        "email",
        "address_line_1",
        "address_line_2",
        "postcode",
        "state_id",
        "city_id",
        "emergency_name",
        "emergency_contact",
        "relationship",
        "bank_name",
        "bank_account_number",
        "profile_image",
    ];

    const BEAUTIFY_MANAGEMENTS_FIELDS = [
        'front_45',
        'back_45',
        'front_view',
        'back_view',
        'side',
        'interior_front',
        'interior_back',
        'dashboard',
        'speedometer',
        'gear',
        'engine',
        'tyre',
        'others',
        'car_video',
        'video_360',
    ];

    const BEAUTIFY_MANAGEMENTS_IMAGE_FIELDS = [
        'front_45',
        'back_45',
        'front_view',
        'back_view',
        'side',
        'interior_front',
        'interior_back',
        'dashboard',
        'speedometer',
        'gear',
        'engine',
        'tyre',
        'others',
    ];
    const BEAUTIFY_MANAGEMENTS_VIDEO_FIELDS = [
        'car_video',
        'video_360',
    ];

    const CAR_LOAN_PERCENTAGE = [
        'bank' => [
            'city_bank' => ['interest' => 3.5, 'max_tenure' => 7],
        ],
        'credit' => [
            'finance' => ['interest' => 7.75, 'max_tenure' => 9]
        ]
    ];

    const PROMOTION_CAR_DISCOUNT = [
        'Bump Discount Type' => ['name' => 'Bump Discount Type', 'value' => 'bump_discount_type'],
        'Straight Discount Type' => ['name' => 'Straight Discount Type', 'value' => 'straight_discount_type']
    ];

    const PROMOTION_CAR_DISPLAY = [
        'Discounted Price Only' => ['name' => 'Discounted Price Only', 'value' => 'discounted_price_only'],
        'Slashed with Original Price' => ['name' => 'Slashed with Original Price', 'value' => 'slashed_with_original_price']
    ];

    const PROMOTION_CAR_DISCOUNT_FORMAT = [
        'Percentage Discount' => ['name' => 'Percentage Discount', 'value' => 'percentage_discount'],
        'Amount Discount' => ['name' => 'Amount Discount', 'value' => 'amount_discount']
    ];

    const BID_STATUS_MANAGEMENT = [
        "status" => [
            [
                'id' => '1',
                'name' => 'Upcoming Bid'
            ],
            [
                'id' => '2',
                'name' => 'Bid In Session'
            ],
            [
                'id' => '3',
                'name' => 'Bid Completed'
            ],
            [
                'id' => '4',
                'name' => 'Win Bid'
            ],
            [
                'id' => '5',
                'name' => 'Lose Bid'
            ],
            [
                'id' => '6',
                'name' => 'View Bid'
            ],
        ],

        "statement" => [
            [
                'id' => '1',
                'name' => 'Notify Me'
            ],
            [
                'id' => '2',
                'name' => 'Bid In Progress'
            ],
            [
                'id' => '3',
                'name' => 'Bid Ended'
            ],
            [
                'id' => '4',
                'name' => 'Congratulations! For Winning The Bid!'
            ],
            [
                'id' => '5',
                'name' => 'You Lost The Bid. You can Try Again In The Upcoming Bid'
            ],
            [
                'id' => '6',
                'name' => 'Bid Has Ended.'
            ],
        ]
    ];
}
