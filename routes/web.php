<?php

use App\Http\Controllers\AdPlacementController;
use App\Http\Controllers\AdTopicController;
use App\Http\Controllers\AdvertismentController;
use App\Http\Controllers\BeautifyController;
use App\Http\Controllers\BodyTypeController;
use App\Http\Controllers\BiddingController;
use App\Http\Controllers\BranchCenterController;
use App\Http\Controllers\BranchTypeController;
use App\Http\Controllers\CarDetailCategoryController;
use App\Http\Controllers\CarDetailController;
use App\Http\Controllers\CarDetailRegistrationTypeController;
use App\Http\Controllers\CarDetailUsageController;
use App\Http\Controllers\CarMakeCarGurusWarrantyController;
use App\Http\Controllers\CarMakeManufacturersWarrantyController;
use App\Http\Controllers\CarMakeSteeringController;
use App\Http\Controllers\CarMakeSuspensionController;
use App\Http\Controllers\CarMakeBrakeController;
use App\Http\Controllers\CarMakeConsumptionController;
use App\Http\Controllers\CarMakeController;
use App\Http\Controllers\CarMakeDriveTrainController;
use App\Http\Controllers\CarMakeEngineTypeController;
use App\Http\Controllers\CarMakeExteriorColorController;
use App\Http\Controllers\CarMakeFuelTypeController;
use App\Http\Controllers\CarMakeInteriorColorController;
use App\Http\Controllers\CarMakeMadeYearController;
use App\Http\Controllers\CarMakeSeatController;
use App\Http\Controllers\CarMakeTransmissionController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CarValuationController;
use App\Http\Controllers\EngineCcController;
use App\Http\Controllers\InspectionCertificateController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MakeController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\PromosDiscountController;
use App\Http\Controllers\StaffRaceController;
use App\Http\Controllers\StaffRelationshipController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffDepartmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommitionController;
use App\Http\Controllers\Fee_Tax_Controller;
use App\Http\Controllers\CustomerManagementController;
use App\Http\Controllers\CarInTakeManagementController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Auth::routes(['register' => false]);

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);
    Route::resource('makes', MakeController::class);

    Route::resource('models', ModelController::class);
    Route::resource('variants', VariantController::class);
    Route::resource('carmakes', CarMakeController::class);
    Route::resource('bidding', BiddingController::class);
    //Import Car Make
    Route::post('/car-makes/imports', [CarMakeController::class, 'importCarMake'])->name('car-make-import');
    //Import Car Make
    Route::post('/car-detail/imports', [CarDetailController::class, 'importCarDetail'])->name('car-detail-import');
    Route::resource('commition', CommitionController::class);
    Route::resource('fee_tax', Fee_Tax_Controller::class);
    Route::resource('customermanagement', CustomerManagementController::class);
    // Get MMV Fuel Type 
    Route::get('/get-fuel-type', [CarMakeController::class, 'getFuelType'])->name('getFuelType');

    // Car Make - Details Fetch
    Route::get('/list-car-make-details', [CarDetailController::class, 'getCarMake'])->name('get-car-make.details');
    // Make Dropdown
    Route::get('/list-brand/search', [MakeController::class, 'getBrands'])->name('brands.search');
    Route::post('/add-brand', [MakeController::class, 'postBrands'])->name('brands.add');
    // Brand Emblem
    Route::get('get-brand-logo', [MakeController::class, 'getBrandLogo'])->name('brand.logo');
    // Model Dropdown
    Route::get('/list-model/search', [ModelController::class, 'getModels'])->name('models.search');
    Route::post('/add-model', [ModelController::class, 'postModels'])->name('models.add');
    Route::get('/list-model-category', [ModelController::class, 'getModelWithCategory']);
    // Variant Dropdown
    Route::get('/list-variant/search', [VariantController::class, 'getVariants'])->name('variants.search');
    Route::post('/add-variant', [VariantController::class, 'postVariant'])->name('variants.add');
    // Car Make Feature Dropdown
    Route::get('/list-feature/search', [CarMakeController::class, 'getFeature'])->name('feature.search');
    Route::post('/add-feature', [CarMakeController::class, 'postFeature'])->name('feature.add');
    // Car Make Transmissions Dropdown
    Route::get('/list-transmission/search', [CarMakeTransmissionController::class, 'getTransmissions'])->name('transmissions.search');
    Route::post('/add-transmission', [CarMakeTransmissionController::class, 'postTransmissions'])->name('transmissions.add');
    // Car Make Fuel Type Dropdown
    Route::get('/list-fuel-type/search', [CarMakeFuelTypeController::class, 'getFuelTypes'])->name('fuelType.search');
    Route::post('/add-fuel-type', [CarMakeFuelTypeController::class, 'postFuelTypes'])->name('fuelType.add');
    // Car Make Drive Train Dropdown
    Route::get('/list-drive-train/search', [CarMakeDriveTrainController::class, 'getDriveTrains'])->name('driveTrains.search');
    Route::post('/add-drive-train', [CarMakeDriveTrainController::class, 'postDriveTrains'])->name('driveTrains.add');
    // Car Make Made Year Dropdown
    Route::get('/list-made-year/search', [CarMakeMadeYearController::class, 'getMadeYear'])->name('madeYear.search');
    Route::post('/add-made-year', [CarMakeMadeYearController::class, 'postMadeYear'])->name('madeYear.add');
    // Car Make Seat Dropdown
    Route::get('/list-seat/search', [CarMakeSeatController::class, 'getSeat'])->name('seat.search');
    Route::post('/add-seat', [CarMakeSeatController::class, 'postSeat'])->name('seat.add');
    // Car Make Exterior Color Dropdown
    Route::get('/list-exteriorColor/search', [CarMakeExteriorColorController::class, 'getExteriorColor'])->name('exteriorColor.search');
    Route::post('/add-exteriorColor', [CarMakeExteriorColorController::class, 'postExteriorColor'])->name('exteriorColor.add');
    // Car Make Interior Color Dropdown
    Route::get('/list-interiorColor/search', [CarMakeInteriorColorController::class, 'getInteriorColor'])->name('interiorColor.search');
    Route::post('/add-interiorColor', [CarMakeInteriorColorController::class, 'postInteriorColor'])->name('interiorColor.add');
    // Car Make Seat Dropdown
    Route::get('/list-consumption/search', [CarMakeConsumptionController::class, 'getConsumption'])->name('consumption.search');
    Route::post('/add-consumption', [CarMakeConsumptionController::class, 'postConsumption'])->name('consumption.add');
    // Car Make Engine type Dropdown
    Route::get('/list-engineType/search', [CarMakeEngineTypeController::class, 'getEngineType'])->name('engineType.search');
    Route::post('/add-engineType', [CarMakeEngineTypeController::class, 'postEngineType'])->name('engineType.add');
    // Car Make Brake Fornt Dropdown
    Route::get('/list-brake/search', [CarMakeBrakeController::class, 'getBrakes'])->name('brake.search');
    Route::post('/add-brake', [CarMakeBrakeController::class, 'postBrakes'])->name('brake.add');
    // Car Make Suspension Dropdown
    Route::get('/list-suspension/search', [CarMakeSuspensionController::class, 'getSuspension'])->name('suspension.search');
    Route::post('/add-suspension', [CarMakeSuspensionController::class, 'postSuspension'])->name('suspension.add');
    // Car Make Steering Dropdown
    Route::get('/list-steering/search', [CarMakeSteeringController::class, 'getSteering'])->name('steering.search');
    Route::post('/add-steering', [CarMakeSteeringController::class, 'postSteering'])->name('steering.add');
    // Car Make Mamufacturer Warranty Dropdown
    Route::get('/list-manufacturersWarranty/search', [CarMakeManufacturersWarrantyController::class, 'getManufacturersWarranty'])->name('manufacturersWarranty.search');
    Route::post('/add-manufacturersWarranty', [CarMakeManufacturersWarrantyController::class, 'postManufacturersWarranty'])->name('manufacturersWarranty.add');
    // Car Make Mamufacturer Warranty Dropdown
    Route::get('/list-cargurusWarranty/search', [CarMakeCarGurusWarrantyController::class, 'getCargurusWarranty'])->name('cargurusWarranty.search');
    Route::post('/add-cargurusWarranty', [CarMakeCarGurusWarrantyController::class, 'postCargurusWarranty'])->name('cargurusWarranty.add');
    // Car Make Body Type Dropdown
    Route::get('/list-body-type/search', [BodyTypeController::class, 'getBodyType'])->name('bodyType.search');
    Route::post('/add-body-type', [BodyTypeController::class, 'postBodyType'])->name('bodyType.add');

    Route::resource('car-details', CarDetailController::class);
    // Car Detail Category Dropdown
    Route::get('/list-carcategory/search', [CarDetailCategoryController::class, 'getCarCategory'])->name('categoryDetail-search');
    // Route::post('/add-carcategory', [CarDetailCategoryController::class, 'postCarCategory'])->name('category.add');
    Route::get('/generate-code/{prefix}', [CarDetailController::class, 'generateCode']);
    // Car Detail Register Type Dropdown
    Route::get('/list-registrationType/search', [CarDetailRegistrationTypeController::class, 'getRegistrationType'])->name('registrationType.search');
    Route::post('/add-registrationType', [CarDetailRegistrationTypeController::class, 'postRegistrationType'])->name('registrationType.add');
    // Car Detail Usage Dropdown
    Route::get('/list-Usage/search', [CarDetailUsageController::class, 'getUsage'])->name('usage.search');
    Route::post('/add-Usage', [CarDetailUsageController::class, 'postUsage'])->name('usage.add');

    Route::resource('marketing/advertising-promotion', AdvertismentController::class);
    // Car Ad Placement Dropdown
    Route::get('/list-adplacement/search', [AdPlacementController::class, 'getAdPlacement'])->name('Adplacement.search');
    Route::post('/add-adplacement', [AdPlacementController::class, 'postAdplacement'])->name('Adplacement.add');
    // Car Ad Topic Dropdown

//     Route::get('/list-getadTopic/search', [AdTopicController::class, 'getAdTopic'])->name('getAdTopic.search');
//    Route::post('/add-adplacement', [AdPlacementController::class, 'postAdplacement'])->name('create_ad');
//     Route::get('get-ads-banner', [AdvertismentController::class, 'getBanner'])->name('advertisment.getSet');
//     Route::get('get-ads-id', [AdvertismentController::class, 'getBannerById'])->name('getBannerById');

//     Route::prefix('adplacements')->group(function () {
//     Route::get('/', [AdPlacementController::class, 'index']);
//     Route::post('/', [AdPlacementController::class, 'postAdplacement']);
//     Route::get('/{id}', [AdPlacementController::class, 'show']);
//     Route::put('/{id}', [AdPlacementController::class, 'update']);
//     Route::delete('/{id}', [AdPlacementController::class, 'destroy']);
// });

    Route::resource('marketing/promo_discounts', PromosDiscountController::class);
    Route::post('/promotion-update-status', [PromosDiscountController::class, 'updatePromoStatus'])->name('promotion-update-status');
    Route::post('/promotion-update-approve', [PromosDiscountController::class, 'updatePromoApprove'])->name('promotion-update-approve');


    Route::resource('dynamic/dropdown/transmission', CarMakeTransmissionController::class);
    Route::resource('dynamic/dropdown/fuel_type', CarMakeFuelTypeController::class);
    Route::resource('dynamic/dropdown/drive_train', CarMakeDriveTrainController::class);
    Route::resource('dynamic/dropdown/made_year', CarMakeMadeYearController::class);
    Route::resource('dynamic/dropdown/engine_type', CarMakeEngineTypeController::class);
    Route::resource('dynamic/dropdown/brake', CarMakeBrakeController::class);
    Route::resource('dynamic/dropdown/steering', CarMakeSteeringController::class);
    Route::resource('dynamic/dropdown/cargurus_warranty', CarMakeCarGurusWarrantyController::class);
    Route::resource('dynamic/dropdown/usage', CarDetailUsageController::class);
    Route::resource('dynamic/dropdown/registration_type', CarDetailRegistrationTypeController::class);
    Route::resource('dynamic/dropdown/make_seat', CarMakeSeatController::class);
    Route::resource('dynamic/dropdown/make_consumption', CarMakeConsumptionController::class);
    Route::resource('dynamic/dropdown/make_suspension', CarMakeSuspensionController::class);
    Route::resource('dynamic/dropdown/manufacturers_warranty', CarMakeManufacturersWarrantyController::class);
    Route::resource('dynamic/dropdown/detail_category', CarDetailCategoryController::class);
    Route::resource('dynamic/dropdown/exterior_color', CarMakeExteriorColorController::class);
    Route::resource('marketing/promo_discounts', PromosDiscountController::class);
    Route::resource('dynamic/dropdown/interior_color', CarMakeInteriorColorController::class);
    Route::resource('dynamic/dropdown/body_type', BodyTypeController::class);
    Route::resource('dynamic/dropdown/branch_center', BranchCenterController::class);

    Route::get('/promo-discounts-partial', function () {
        $brands = App\Models\Make::withCount([
            'carinfos as model_count' => function ($query) {
                $query->where('isSold', '0')
                    ->where('status', '1')
                    ->whereIn('car_info_category', ['A', 'C'])
                    ->select(DB::raw('COUNT(DISTINCT model_id)'));
            }
        ])->get(['id', 'brand_name']);
        $fuelTypes = App\Models\CarMakeFuelType::where('status', '1')->get();
        $bodyTypes = App\Models\BodyType::where('status', '1')->get();
        $transmissions = App\Models\CarMakeTransmission::where('status', '1')->get();
        $colors = App\Models\CarMakeExteriorColor::where('status', '1')->get();
        $centers = App\Models\BranchCenter::where('status', '1')->get();
        return view('marketing.promo_discounts.offcanva', compact('brands', 'fuelTypes', 'bodyTypes', 'transmissions', 'colors', 'centers'));
    });
    Route::post('/promo-discounts-partial/filter-store', [PromosDiscountController::class, 'filterInput']);
    Route::delete('/promo-discounts-partial/selected-delete/{id}', [PromosDiscountController::class, 'deleteCarSelected'])->name('deleteSelectCar');
    Route::get('/promo-discounts-partial/filter-apply-count', [PromosDiscountController::class, 'filterCount'])->name('filter.count');
    Route::resource('marketing/beautify', BeautifyController::class);
    Route::resource('car_master/inspections', InspectionCertificateController::class);
    Route::post('/inspections/updatestatus', [InspectionCertificateController::class, 'updatestatus'])->name('inspections.updatestatus');
    Route::post('/inspections/store-status', [InspectionCertificateController::class, 'storestatus'])->name('inspections.storestatus');
    Route::post('/inspections/updatestatus', [InspectionCertificateController::class, 'updatestatus'])->name('inspections.updatestatus');
    Route::resource('car_makes/car_valuation', CarValuationController::class);
    Route::resource('human_capital/staff', StaffController::class);
    Route::get('/staff/last-id', [StaffController::class, 'getLastStaffId'])->name('staff.lastId');
    Route::get('/get-states/{country}', [StaffController::class, 'getstates'])->name('get.states');
    Route::get('/get-cities/{state}', [StaffController::class, 'getCities'])->name('get.cities');
    Route::post('/commition/togglestatus', [CommitionController::class, 'togglestatus'])->name('commition.togglestatus');
    Route::resource('fee_tax', Fee_Tax_Controller::class);

    // Car Ad Department Dropdown
    Route::get('/list-department/search', [StaffDepartmentController::class, 'getStaffDepartment'])->name('department.search');
    Route::post('/add-department', [StaffDepartmentController::class, 'postStaffDepartment'])->name('department.add');
    // Commition Type Dropdown
    Route::get('/list-commision-type/search', [CommitionController::class, 'get_commision_type'])->name('commition.searchtype');
    Route::post('/add-commision-type', [CommitionController::class, 'post_commision_type'])->name('commition.addtype');
    // Commition Type Dropdown
    Route::get('/list-relation-ship/search', [StaffRelationshipController::class, 'get_relationship'])->name('relationship.searchtype');
    Route::post('/add-relation-ship', [StaffRelationshipController::class, 'Postrelationship'])->name('relationship.addtype');
    // Staff Race Dropdown
    Route::get('/list-race/search', [StaffRaceController::class, 'getStaffRace'])->name('race.searchtype');
    Route::post('/add-race', [StaffRaceController::class, 'postStaffRace'])->name('race.addtype');
    // Branch Center Dropdown
    Route::get('/list-branch-type/search', [BranchTypeController::class, 'getBranchType'])->name('branchType.search');
    Route::post('/add-branch-type', [BranchTypeController::class, 'postBranchType'])->name('branchType.add');
    // Branch Type Dropdown
    Route::get('/list-branch-center/search', [BranchCenterController::class, 'getBranchCenter'])->name('branchCenter.search');
    Route::post('/add-branch-center', [BranchCenterController::class, 'postBranchCenter'])->name('branchCenter.add');
    // Search Country
    Route::get('/list-brand-country/search', [CountryController::class, 'getBrandCountry'])->name('brandCountry.search');
    // Engine CC Dropdown
    Route::get('/list-engine-cc/search', action: [EngineCcController::class, 'getEngineCC'])->name('engineCC.search');
    Route::post('/add-engine-cc', [EngineCcController::class, 'postEngineCC'])->name('engineCC.add');

    Route::resource('/country', CountryController::class);
    Route::resource('/language', LanguageController::class);


    Route::post('/commition/togglestatus', [CommitionController::class, 'togglestatus'])->name('commition.togglestatus');
    // Commition Business Unit Dropdown
    Route::get('/list-business-unit/search', [CommitionController::class, 'get_business_unit'])->name('commition.search');
    Route::post('/add-business-unit', [CommitionController::class, 'post_business_unit'])->name('commition.add');
    // Commition Type Dropdown
    Route::get('/list-commision-type/search', [CommitionController::class, 'get_commision_type'])->name('commition.searchtype');
    Route::post('/add-commision-type', [CommitionController::class, 'post_commision_type'])->name('commition.addtype');
    // Car Ad Department Dropdown
    Route::get('/list-department/search', [StaffDepartmentController::class, 'getStaffDepartment'])->name('department.search');
    Route::post('/add-department', [StaffDepartmentController::class, 'postStaffDepartment'])->name('department.add');
    // Fee & Tax Handling Fee Dropdown
    Route::get('/list-handling-fee/search', [Fee_Tax_Controller::class, 'gethandlingfee'])->name('fee_tax.search');
    Route::post('/add-handling-fee', [Fee_Tax_Controller::class, 'posthandlingfee'])->name('fee_tax.add');
    // Fee & Tax Handling Fee Dropdown
    Route::get('/list-inspection-fee/search', [Fee_Tax_Controller::class, 'getinspectionfee'])->name('fee_tax.searchins');
    Route::post('/add-inspection-fee', [Fee_Tax_Controller::class, 'postinspectionfee'])->name('fee_tax.addins');
    // Fee & Tax Handling Fee Dropdown
    Route::get('/list-dealer-fee/search', [Fee_Tax_Controller::class, 'getdealerfee'])->name('fee_tax.searchdealer');
    Route::post('/add-dealer-fee', [Fee_Tax_Controller::class, 'postdealerfee'])->name('fee_tax.adddealer');
    // Fee & Tax Handling Fee Dropdown
    Route::get('/list-othertype-fee/search', [Fee_Tax_Controller::class, 'getothertypefee'])->name('fee_tax.searchothertype');
    Route::post('/add-othertype-fee', [Fee_Tax_Controller::class, 'postothertypefee'])->name('fee_tax.addothertype');
    // Fee & Tax Handling Fee Dropdown
    Route::get('/list-taxtype-fee/search', [Fee_Tax_Controller::class, 'gettaxtypefee'])->name('fee_tax.searchtaxtype');
    Route::post('/add-taxtype-fee', [Fee_Tax_Controller::class, 'posttaxtypefee'])->name('fee_tax.addtaxtype');

    Route::post('/customermanagement/togglestatus', [CustomerManagementController::class, 'togglestatus'])->name('customermanagement.togglestatus');

    // Bidding Car Make Dropdown
    Route::get('/list-car-make/search', [BiddingController::class, 'getcarmake'])->name('bidding.search');

    Route::get('/search-car', [CustomerManagementController::class, 'searchCar'])->name('search.car');

    // Customer Management Activity
    Route::post('/add-activity-store', [CustomerManagementController::class, 'activitystore'])->name('customermanagement.activitystore');
    Route::get('/activityshow/{customer_id}', [CustomerManagementController::class, 'activityshow'])->name('customermanagement.activityshow');
    Route::put('/activityupdate/{activity_id}', [CustomerManagementController::class, 'activityupdate'])->name('customermanagement.activityupdate');
    Route::resource('bidding', BiddingController::class);
    Route::resource('fee_tax', Fee_Tax_Controller::class);
    Route::resource('customermanagement', CustomerManagementController::class);
    Route::get('/filter-car-count', [PromosDiscountController::class, 'filterCount'])->name('cars.filter');
    Route::get('/get-bid-management-statement', [BiddingController::class, 'getBidStatements'])->name('get-bid-management-statement');
    Route::get('/inspections/editgetdata/{inpection}', [InspectionCertificateController::class, 'editgetdata']);
    Route::post('/inspections/updatedata', [InspectionCertificateController::class, 'updatedata']);
    Route::resource('operations/car-in-take-management', CarInTakeManagementController::class);




    
});
