@extends('backend.layouts.print')

@section('title')
    Print {{ $entry->full_name }}
@endsection

@push('after-styles')
    <style type="text/css" scoped>

        .table-xxs th, .table-xxs td{
            font-size: 14px;
            border-collapse: separate;
            border-spacing:0 20px;
        }

        .table-xxs td, .table-xxs th {
            padding: .25rem;
            /* vertical-align: top; */
            border-top: 1px solid #e9ecef;
        }

        .tr-gray {
            background-color: #e9ecef;
        }

        @media print {
            .tr-gray {
                background-color: #e9ecef !important;
            }
        }
    </style>
@endpush

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <label class="mb-0">Case Investigation Form</label>
                        <h5 class="mb-1"><strong>Coronavirus Disease (COVID-19)</strong></h5>
                        <h6>June 15, 2020 version</h6>
                    </div>
                    <div class="mt-3">
                        <table class="table table-bordered nowrap table-xxs mb-0">
                            <tr>
                                <td class="pb-4">
                                    Disease Reporting Unit/Hospital:
                                </td>
                                <td>Name of Investigator:</td>
                                <td>Date of Interview:</td>
                            </tr>
                            <tr class="tr-gray">
                                <td colspan="3" class="text-center"><strong>1. Patient Profile</strong></td>
                            </tr>
                        </table>
                        <table class="table table-bordered nowrap table-xxs mb-0">
                            <tr>
                                <td>
                                    Last Name
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->last_name }}</strong></h6>
                                </td>
                                <td>
                                    First Name
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->first_name }}</strong></h6>
                                </td>
                                <td>
                                    Middle Name
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->middle_name }}</strong></h6>
                                </td>
                                <td>
                                    Birthday (mm/dd/yyyy)
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->birthday ? date('M d, Y', strtotime($entry->birthday)) : '' }}</strong></h6>
                                </td>
                                <td>
                                    Age
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->age }}</strong></h6>
                                </td>
                                <td>
                                    Sex
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->sex }}</strong></h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Occupation
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->occupation }}</strong></h6>
                                </td>
                                <td>
                                    Civil Status
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->civil_status }}</strong></h6>
                                </td>
                                <td colspan="2">
                                    Nationality
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->nationality }}</strong></h6>
                                </td>
                                <td>
                                    PhilHealth No.
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->philhealth_number }}</strong></h6>
                                </td>
                                <td>
                                    Passport No
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->passport_number }}</strong></h6>
                                </td>
                            </tr>
                            <tr class="tr-gray">
                                <td colspan="6" class="text-center"><strong>2. Philippine Residence</strong></td>
                            </tr>
                            <tr class="tr-gray">
                                <td colspan="6"><strong>2.1. Permanent Address</strong></td>
                            </tr>
                        </table>
                        <table class="table table-bordered nowrap table-xxs mb-0">
                            <tr>
                                <td>
                                    House No./Lot/Bldg.
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->permanent_house_number }}</strong></h6>
                                </td>
                                <td>
                                    Street/Barangay
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->permanent_street_address }}</strong></h6>
                                </td>
                                <td>
                                    Municipality/City
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->permanent_municipality }}</strong></h6>
                                </td>
                                <td>
                                    Province
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->permanent_province }}</strong></h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Region
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->permanent_region }}</strong></h6>
                                </td>
                                <td>
                                    Home Phone No.
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->permanent_home_phone_number }}</strong></h6>
                                </td>
                                <td>
                                    Cellphone No.
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->permanent_cellphone_number }}</strong></h6>
                                </td>
                                <td>
                                    Email address
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->permanent_email_address }}</strong></h6>
                                </td>
                            </tr>
                            <tr class="tr-gray">
                                <td colspan="6"><strong>2.2. Current Address</strong></td>
                            </tr>
                            <tr>
                                <td>
                                    House No./Lot/Bldg.
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->current_house_number }}</strong></h6>
                                </td>
                                <td>
                                    Street/Barangay
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->current_street_address }}</strong></h6>
                                </td>
                                <td>
                                    Municipality/City
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->current_municipality }}</strong></h6>
                                </td>
                                <td>
                                    Province
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->current_province }}</strong></h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Region
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->current_region }}</strong></h6>
                                </td>
                                <td>
                                    Home Phone No.
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->current_home_phone_number }}</strong></h6>
                                </td>
                                <td>
                                    Cellphone No.
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->current_cellphone_number }}</strong></h6>
                                </td>
                                <td>
                                    Email address
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->current_other_email_address }}</strong></h6>
                                </td>
                            </tr>
                            <tr class="tr-gray">
                                <td colspan="6" class="text-center"><strong>3. Address Outside the Philippines (for Overseas Filipino Workers and Individuals with Residence Outside the Philippines)</strong></td>
                            </tr>
                        </table>
                        <table class="table table-bordered nowrap table-xxs mb-0">
                            <tr>
                                <td>
                                    Employer's Name:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_employer_name }}</strong></h6>
                                </td>
                                <td>
                                    Occupation 
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_occupation }}</strong></h6>
                                </td>
                                <td colspan="2">
                                    Place of Work:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_place_of_work }}</strong></h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    House No./Bldg. Name
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_house_number }}</strong></h6>
                                </td>
                                <td>
                                    Street 
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_street_address }}</strong></h6>
                                </td>
                                <td>
                                    City/Municipality 
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_city }}</strong></h6>
                                </td>
                                <td>
                                    Province
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_province }}</strong></h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Country:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_country }}</strong></h6>
                                </td>
                                <td>
                                    Office Phone No.:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_office_phone_number }}</strong></h6>
                                </td>
                                <td colspan="2">
                                    Cellphone No.:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->overseas_cellphone_number }}</strong></h6>
                                </td>
                            </tr>
                            <tr class="tr-gray">
                                <td colspan="6" class="text-center"><strong>4. Travel History</strong></td>
                            </tr>
                        </table>
                        <table class="table table-bordered nowrap table-xxs mb-0">
                            <tr>
                                <td>
                                    <strong>History of travel/visit/work in other countries with a known COVID-19 transmission</strong> 14 days before the onset of your signs and symptoms:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->is_history_of_travel_symptom ? 'Yes' : 'No' }}</strong></h6>
                                </td>
                                <td colspan="3">
                                    Port (Country) of exit:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->port_of_exit }}</strong></h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Airline/Sea vessel:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->airline_sea_vessel }}</strong></h6>
                                </td>
                                <td>
                                    Flight/Vessel Number:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->flight_vessel_number }}</strong></h6>
                                </td>
                                <td>
                                    Date of Departure (mm/dd/yyyy)
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->departure_date ? date('M d, Y', strtotime($entry->departure_date)) : '' }}</strong></h6>
                                </td>
                                <td>
                                    Date of Arrival in Philippines:
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->philippine_arrival_date ? date('M d, Y', strtotime($entry->philippine_arrival_date)) : '' }}</strong></h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Returning Overseas Filipino Worker (0FW)
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->is_returning_ofw ? 'Yes' : 'No' }}</strong></h6>
                                </td>
                                <td colspan="3">
                                    Locally Stranded Individual (LSI)
                                    <h6 class="text-capitalize mt-1"><strong>{{ $entry->is_locally_stranded_lsi ? 'Yes' : 'No' }}</strong></h6>
                                </td>
                            </tr>
                        </table>  
                    </div>
                </div>
            </div>  
        </div>
    </div>
    
@endsection

@push('after-scripts')

<script type="text/javascript">
    window.onload = window.print();
</script>

@endpush