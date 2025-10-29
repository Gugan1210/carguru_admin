@extends('layouts.app', ['activePage' => 'table', 'title' => 'Users - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4 class="fw-bold">CAR MASTER DATA/ BIDDING/ BIDDING OVERVIEWS</h4>
                    </div>
                </div>
            </div>

            @session('success')
                <div class="alert alert-success" role="alert">
                    {{ $value }}
                </div>
            @endsession
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- /product list -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                    <div class="search-set">
                        <div class="search-input">
                        </div>
                    </div>
                    <div class="page-btn">
                        <a href="{{ route('car-details.create') }}" class="btn btn-primary"><i
                                class="ti ti-circle-plus me-1"></i>Add
                        </a>
                        <a href="#" class="btn btn-primary"><i class="fa-solid fa-filter"></i> Filter
                        </a>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>Car ID</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Car Plate</th>
                                    <th>Bid Room</th>
                                    <th>Bid Status</th>
                                    <th>Date & Time(start-finish)</th>
                                    <th>Bidder</th>
                                    <th>Reserved Price(RM)</th>
                                    <th>Final Bid Price(RM)</th>
                                    <th>Bidding Activity</th>
                                    <th>Action</th>
                                    <!-- <th class="no-sort"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr>
                                        <td>B250901-000001</td>
                                        <td>Proton</td>
                                        <td>Saga</td>
                                        <td>JDV454</td>
                                        <td>001-2589-20</td>
                                        <td>Auto Assinged</td>
                                        <td>Aug 27, 2025, 8 PM</td>
                                        <td>NA</td>
                                        <td>20,000</td>
                                        <td>NA</td>
                                        <td><div id="toggleSwitch" class="toggle-switch off">
                    <span id="toggleText">OFF</span>
                    <div class="toggle-circle"></div>
                  </div></td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="btn me-2 p-2 mb-0"
                                                    href="#">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
        @include('layouts.partials.footer-moden')
    </div>
@endsection


<style>
    .toggle-switch {
        width: 90px;
        height: 40px;
        font-size: 10px;
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
        position: relative;
      }

      .toggle-circle {
        width: 20%;
        height: 30px;
        border-radius: 50%;
        background: #fff;
        position: absolute;
        top: 5px;
        transition: left 0.3s ease;
      }

      .off {
        background-color: #e0e0e0;
        color: #6c757d;
      }

      .off .toggle-circle {
        left: 5px;
      }

      .on {
        background-color: #ffc107;
        color: #000;
      }

      .on .toggle-circle {
        left: 105px;
      }

    .table thead tr th {
        background: #ffeebf !important;
    }

    .table thead tr th:nth-child(2) {
        background: #FFDCB8 !important;
    }

    .table thead tr th:nth-child(3) {
        background: #FFDCB8 !important;
    }

    .table tbody tr td:nth-child(2) {
        background: #fcedf5 !important;
    }

    .table tbody tr td:nth-child(3) {
        background: #fcedf5 !important;
    }

    .table thead tr th:nth-child(9) {
        background: #FAE1A0 !important;
    }

    .table thead tr th:nth-child(10) {
        background: #FAE1A0 !important;
    }

    .table tbody tr td:nth-child(9) {
        background: #f7edd2 !important;
    }

    .table tbody tr td:nth-child(10) {
        background: #f7edd2 !important;
    }
</style>