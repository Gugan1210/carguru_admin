<?php $page = 'edit-role'; ?>
@extends('layouts.app', ['activePage' => 'table', 'title' => 'Update Make Country - Admin Panel - CarGuru', 'navName' => 'Table List', 'activeButton' => 'laravel'])


@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4 class="fw-bold">Update Country</h4>
                    <h6>Edit Country details</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i class="ti ti-refresh"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i class="ti ti-chevron-up"></i></a>
                </li>
            </ul>
            <div class="page-btn mt-0">
                <a href="{{ route('country.index') }}" class="btn btn-secondary">
                    <i data-feather="arrow-left" class="me-2"></i>Back
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('country.update', $country->id) }}" class="edit-country-form">
            @csrf
            @method('PUT')
            <div class="add-product">
                <div class="accordions-items-seperate" id="accordionSpacingExample">
                    <div class="accordion-item border mb-4">
                        <div id="SpacingOne" class="accordion-collapse collapse show" aria-labelledby="headingSpacingOne">
                            <div class="accordion-body border-top">
                                <div class="row">

                                    <!-- Country Name -->
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Country Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                value="{{ old('name', $country->name) }}" required>
                                        </div>
                                    </div>

                                    <!-- Phone Code -->
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Code <span class="text-danger">*</span></label>
                                            <input type="text" name="phone_code" id="phone_code" class="form-control"
                                                value="{{ old('phone_code', $country->phone_code) }}" placeholder="+91" required>
                                        </div>
                                    </div>

                                    <!-- Continent -->
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Continent <span class="text-danger">*</span></label>
                                            <select class="form-select" name="continent" id="continent" required>
                                                                                        <option value="">Select Country</option>
    <option value="Afghanistan" {{ old('name') == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
    <option value="Albania" {{ old('name') == 'Albania' ? 'selected' : '' }}>Albania</option>
    <option value="Algeria" {{ old('name') == 'Algeria' ? 'selected' : '' }}>Algeria</option>
    <option value="Andorra" {{ old('name') == 'Andorra' ? 'selected' : '' }}>Andorra</option>
    <option value="Angola" {{ old('name') == 'Angola' ? 'selected' : '' }}>Angola</option>
    <option value="Antigua and Barbuda" {{ old('name') == 'Antigua and Barbuda' ? 'selected' : '' }}>Antigua and Barbuda</option>
    <option value="Argentina" {{ old('name') == 'Argentina' ? 'selected' : '' }}>Argentina</option>
    <option value="Armenia" {{ old('name') == 'Armenia' ? 'selected' : '' }}>Armenia</option>
    <option value="Australia" {{ old('name') == 'Australia' ? 'selected' : '' }}>Australia</option>
    <option value="Austria" {{ old('name') == 'Austria' ? 'selected' : '' }}>Austria</option>
    <option value="Azerbaijan" {{ old('name') == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
    <option value="Bahamas" {{ old('name') == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
    <option value="Bahrain" {{ old('name') == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
    <option value="Bangladesh" {{ old('name') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
    <option value="Barbados" {{ old('name') == 'Barbados' ? 'selected' : '' }}>Barbados</option>
    <option value="Belarus" {{ old('name') == 'Belarus' ? 'selected' : '' }}>Belarus</option>
    <option value="Belgium" {{ old('name') == 'Belgium' ? 'selected' : '' }}>Belgium</option>
    <option value="Belize" {{ old('name') == 'Belize' ? 'selected' : '' }}>Belize</option>
    <option value="Benin" {{ old('name') == 'Benin' ? 'selected' : '' }}>Benin</option>
    <option value="Bhutan" {{ old('name') == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
    <option value="Bolivia" {{ old('name') == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
    <option value="Bosnia and Herzegovina" {{ old('name') == 'Bosnia and Herzegovina' ? 'selected' : '' }}>Bosnia and Herzegovina</option>
    <option value="Botswana" {{ old('name') == 'Botswana' ? 'selected' : '' }}>Botswana</option>
    <option value="Brazil" {{ old('name') == 'Brazil' ? 'selected' : '' }}>Brazil</option>
    <option value="Brunei" {{ old('name') == 'Brunei' ? 'selected' : '' }}>Brunei</option>
    <option value="Bulgaria" {{ old('name') == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
    <option value="Burkina Faso" {{ old('name') == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
    <option value="Burundi" {{ old('name') == 'Burundi' ? 'selected' : '' }}>Burundi</option>
    <option value="Cabo Verde" {{ old('name') == 'Cabo Verde' ? 'selected' : '' }}>Cabo Verde</option>
    <option value="Cambodia" {{ old('name') == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
    <option value="Cameroon" {{ old('name') == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
    <option value="Canada" {{ old('name') == 'Canada' ? 'selected' : '' }}>Canada</option>
    <option value="Central African Republic" {{ old('name') == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
    <option value="Chad" {{ old('name') == 'Chad' ? 'selected' : '' }}>Chad</option>
    <option value="Chile" {{ old('name') == 'Chile' ? 'selected' : '' }}>Chile</option>
    <option value="China" {{ old('name') == 'China' ? 'selected' : '' }}>China</option>
    <option value="Colombia" {{ old('name') == 'Colombia' ? 'selected' : '' }}>Colombia</option>
    <option value="Comoros" {{ old('name') == 'Comoros' ? 'selected' : '' }}>Comoros</option>
    <option value="Congo (Congo-Brazzaville)" {{ old('name') == 'Congo (Congo-Brazzaville)' ? 'selected' : '' }}>Congo (Congo-Brazzaville)</option>
    <option value="Costa Rica" {{ old('name') == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
    <option value="Croatia" {{ old('name') == 'Croatia' ? 'selected' : '' }}>Croatia</option>
    <option value="Cuba" {{ old('name') == 'Cuba' ? 'selected' : '' }}>Cuba</option>
    <option value="Cyprus" {{ old('name') == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
    <option value="Czechia (Czech Republic)" {{ old('name') == 'Czechia (Czech Republic)' ? 'selected' : '' }}>Czechia (Czech Republic)</option>
    <option value="Democratic Republic of the Congo" {{ old('name') == 'Democratic Republic of the Congo' ? 'selected' : '' }}>Democratic Republic of the Congo</option>
    <option value="Denmark" {{ old('name') == 'Denmark' ? 'selected' : '' }}>Denmark</option>
    <option value="Djibouti" {{ old('name') == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
    <option value="Dominica" {{ old('name') == 'Dominica' ? 'selected' : '' }}>Dominica</option>
    <option value="Dominican Republic" {{ old('name') == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
    <option value="Ecuador" {{ old('name') == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
    <option value="Egypt" {{ old('name') == 'Egypt' ? 'selected' : '' }}>Egypt</option>
    <option value="El Salvador" {{ old('name') == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
    <option value="Equatorial Guinea" {{ old('name') == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
    <option value="Eritrea" {{ old('name') == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
    <option value="Estonia" {{ old('name') == 'Estonia' ? 'selected' : '' }}>Estonia</option>
    <option value="Eswatini (fmr. "Swaziland")" {{ old('name') == 'Eswatini (fmr. "Swaziland")' ? 'selected' : '' }}>Eswatini (fmr. "Swaziland")</option>
    <option value="Ethiopia" {{ old('name') == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
    <option value="Fiji" {{ old('name') == 'Fiji' ? 'selected' : '' }}>Fiji</option>
    <option value="Finland" {{ old('name') == 'Finland' ? 'selected' : '' }}>Finland</option>
    <option value="France" {{ old('name') == 'France' ? 'selected' : '' }}>France</option>
    <option value="Gabon" {{ old('name') == 'Gabon' ? 'selected' : '' }}>Gabon</option>
    <option value="Gambia" {{ old('name') == 'Gambia' ? 'selected' : '' }}>Gambia</option>
    <option value="Georgia" {{ old('name') == 'Georgia' ? 'selected' : '' }}>Georgia</option>
    <option value="Germany" {{ old('name') == 'Germany' ? 'selected' : '' }}>Germany</option>
    <option value="Ghana" {{ old('name') == 'Ghana' ? 'selected' : '' }}>Ghana</option>
    <option value="Greece" {{ old('name') == 'Greece' ? 'selected' : '' }}>Greece</option>
    <option value="Grenada" {{ old('name') == 'Grenada' ? 'selected' : '' }}>Grenada</option>
    <option value="Guatemala" {{ old('name') == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
    <option value="Guinea" {{ old('name') == 'Guinea' ? 'selected' : '' }}>Guinea</option>
    <option value="Guinea-Bissau" {{ old('name') == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
    <option value="Guyana" {{ old('name') == 'Guyana' ? 'selected' : '' }}>Guyana</option>
    <option value="Haiti" {{ old('name') == 'Haiti' ? 'selected' : '' }}>Haiti</option>
    <option value="Holy See" {{ old('name') == 'Holy See' ? 'selected' : '' }}>Holy See</option>
    <option value="Honduras" {{ old('name') == 'Honduras' ? 'selected' : '' }}>Honduras</option>
    <option value="Hungary" {{ old('name') == 'Hungary' ? 'selected' : '' }}>Hungary</option>
    <option value="Iceland" {{ old('name') == 'Iceland' ? 'selected' : '' }}>Iceland</option>
    <option value="India" {{ old('name') == 'India' ? 'selected' : '' }}>India</option>
    <option value="Indonesia" {{ old('name') == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
    <option value="Iran" {{ old('name') == 'Iran' ? 'selected' : '' }}>Iran</option>
    <option value="Iraq" {{ old('name') == 'Iraq' ? 'selected' : '' }}>Iraq</option>
    <option value="Ireland" {{ old('name') == 'Ireland' ? 'selected' : '' }}>Ireland</option>
    <option value="Israel" {{ old('name') == 'Israel' ? 'selected' : '' }}>Israel</option>
    <option value="Italy" {{ old('name') == 'Italy' ? 'selected' : '' }}>Italy</option>
    <option value="Jamaica" {{ old('name') == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
    <option value="Japan" {{ old('name') == 'Japan' ? 'selected' : '' }}>Japan</option>
    <option value="Jordan" {{ old('name') == 'Jordan' ? 'selected' : '' }}>Jordan</option>
    <option value="Kazakhstan" {{ old('name') == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
    <option value="Kenya" {{ old('name') == 'Kenya' ? 'selected' : '' }}>Kenya</option>
    <option value="Kiribati" {{ old('name') == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
    <option value="Kuwait" {{ old('name') == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
    <option value="Kyrgyzstan" {{ old('name') == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
    <option value="Laos" {{ old('name') == 'Laos' ? 'selected' : '' }}>Laos</option>
    <option value="Latvia" {{ old('name') == 'Latvia' ? 'selected' : '' }}>Latvia</option>
    <option value="Lebanon" {{ old('name') == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
    <option value="Lesotho" {{ old('name') == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
    <option value="Liberia" {{ old('name') == 'Liberia' ? 'selected' : '' }}>Liberia</option>
    <option value="Libya" {{ old('name') == 'Libya' ? 'selected' : '' }}>Libya</option>
    <option value="Liechtenstein" {{ old('name') == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
    <option value="Lithuania" {{ old('name') == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
    <option value="Luxembourg" {{ old('name') == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
    <option value="Madagascar" {{ old('name') == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
    <option value="Malawi" {{ old('name') == 'Malawi' ? 'selected' : '' }}>Malawi</option>
    <option value="Malaysia" {{ old('name') == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
    <option value="Maldives" {{ old('name') == 'Maldives' ? 'selected' : '' }}>Maldives</option>
    <option value="Mali" {{ old('name') == 'Mali' ? 'selected' : '' }}>Mali</option>
    <option value="Malta" {{ old('name') == 'Malta' ? 'selected' : '' }}>Malta</option>
    <option value="Marshall Islands" {{ old('name') == 'Marshall Islands' ? 'selected' : '' }}>Marshall Islands</option>
    <option value="Mauritania" {{ old('name') == 'Mauritania' ? 'selected' : '' }}>Mauritania</option>
    <option value="Mauritius" {{ old('name') == 'Mauritius' ? 'selected' : '' }}>Mauritius</option>
    <option value="Mexico" {{ old('name') == 'Mexico' ? 'selected' : '' }}>Mexico</option>
    <option value="Micronesia" {{ old('name') == 'Micronesia' ? 'selected' : '' }}>Micronesia</option>
    <option value="Moldova" {{ old('name') == 'Moldova' ? 'selected' : '' }}>Moldova</option>
    <option value="Monaco" {{ old('name') == 'Monaco' ? 'selected' : '' }}>Monaco</option>
    <option value="Mongolia" {{ old('name') == 'Mongolia' ? 'selected' : '' }}>Mongolia</option>
    <option value="Montenegro" {{ old('name') == 'Montenegro' ? 'selected' : '' }}>Montenegro</option>
    <option value="Morocco" {{ old('name') == 'Morocco' ? 'selected' : '' }}>Morocco</option>
    <option value="Mozambique" {{ old('name') == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
    <option value="Myanmar (formerly Burma)" {{ old('name') == 'Myanmar (formerly Burma)' ? 'selected' : '' }}>Myanmar (formerly Burma)</option>
    <option value="Namibia" {{ old('name') == 'Namibia' ? 'selected' : '' }}>Namibia</option>
    <option value="Nauru" {{ old('name') == 'Nauru' ? 'selected' : '' }}>Nauru</option>
    <option value="Nepal" {{ old('name') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
    <option value="Netherlands" {{ old('name') == 'Netherlands' ? 'selected' : '' }}>Netherlands</option>
    <option value="New Zealand" {{ old('name') == 'New Zealand' ? 'selected' : '' }}>New Zealand</option>
    <option value="Nicaragua" {{ old('name') == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
    <option value="Niger" {{ old('name') == 'Niger' ? 'selected' : '' }}>Niger</option>
    <option value="Nigeria" {{ old('name') == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
    <option value="North Korea" {{ old('name') == 'North Korea' ? 'selected' : '' }}>North Korea</option>
    <option value="North Macedonia" {{ old('name') == 'North Macedonia' ? 'selected' : '' }}>North Macedonia</option>
    <option value="Norway" {{ old('name') == 'Norway' ? 'selected' : '' }}>Norway</option>
    <option value="siva"{{ old('Name')  ==  'siva' ? 'selected':''}}>Siva</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="col-sm-6 col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Status <span class="text-danger">*</span></label>
                                            <select class="form-select" name="status" id="status" required>
                                                <option value="1" {{ $country->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $country->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center justify-content-end mb-4">
                                            <a href="{{ route('country.index') }}" class="btn btn-secondary me-2">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>

                                </div> <!-- row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>


@endsection