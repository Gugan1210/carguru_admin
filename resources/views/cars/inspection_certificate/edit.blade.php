@extends('layouts.app', ['activePage' => 'table', 'title' => 'Dynamic Drop Down - Inspection - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])
@section('content')
  <div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="add-item d-flex">
          <div class="page-title">

          </div>
        </div>
        <div class="container-fluid">


          <!-- Title -->
          <h6 class="fw-bold mb-4">CAR MASTER DATA / INSPECTION & CERTIFICATION</h6>


          <!-- Car Category -->
          <div class="mb-4">
            <label class="form-label fw-bold">CAR CATEGORY</label>
            <select class="form-select w-auto">
              <option>Certified</option>
              <option>Bidding</option>
            </select>
          </div>

          <!-- Card Section -->
          <div class="border rounded p-4 mb-4">
            <div class="row mb-3">
              <div class="col">
                <label class="fw-bold">TOPIC</label>
                <p>Exterior</p>
              </div>
              <div class="col">
                <label class="fw-bold">AREA</label>
                <p>Body Parts & Bumpers</p>
              </div>
              <div class="col">
                <label class="fw-bold">SPECIFIC AREA</label>
                <p>Right Front Bumper</p>
              </div>
              <div class="col">
                <label class="fw-bold">PHOTO / VIDEO CAPTURE</label>
                <p>Single Photo Capture</p>
              </div>
              <div class="col">
                <label class="fw-bold">NOTES</label>
                <p>Added</p>
              </div>
            </div>

            <!-- Reasons -->
            <div class="mb-3">
              <label class="fw-bold">REASONS</label>
              <div class="d-flex flex-wrap gap-2 mt-1">
                <span class="badge bg-light text-dark border">Not Align <button type="button"
                    class="btn-close btn-close-white btn-sm ms-1"></button></span>
                <span class="badge bg-light text-dark border">Paint Pell Out <button type="button"
                    class="btn-close btn-close-white btn-sm ms-1"></button></span>
                <span class="badge bg-light text-dark border">Scratches <button type="button"
                    class="btn-close btn-close-white btn-sm ms-1"></button></span>
                <span class="badge bg-light text-dark border">Repainted <button type="button"
                    class="btn-close btn-close-white btn-sm ms-1"></button></span>
                <span class="badge bg-light text-dark border">Repaired <button type="button"
                    class="btn-close btn-close-white btn-sm ms-1"></button></span>
              </div>
            </div>

            <!-- State -->
            <div class="mb-3">
              <label class="fw-bold">STATE</label>
              <div class="d-flex flex-wrap gap-2 mt-1">
                <span class="badge bg-white">✔ Pass <button type="button"
                    class="btn-close btn-close-success btn-sm ms-1"></button></span>
                <span class="badge bg-warning text-dark">⚠ Fail <button type="button"
                    class="btn-close btn-close-white btn-sm ms-1"></button></span>
                <span class="badge bg-info text-dark">↻ Not Available <button type="button"
                    class="btn-close btn-close-white btn-sm ms-1"></button></span>
                <span class="badge bg-danger">N/A Repaired <button type="button"
                    class="btn-close btn-close-white btn-sm ms-1"></button></span>
                <span class="badge bg-secondary">✖ Replaced <button type="button"
                    class="btn-close btn-close-white btn-sm ms-1"></button></span>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end gap-2">
              <button class="btn btn-warning">Edit</button>
              <button class="btn btn-danger">Delete</button>
            </div>
          </div>
          <!-- Reset & Submit -->
          <div class="d-flex justify-content-end gap-2">
            <button class="btn btn-warning">Reset</button>
            <button class="btn btn-success">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection