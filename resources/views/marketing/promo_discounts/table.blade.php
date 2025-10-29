<?php
use App\Traits\commonTrait;

$common = new class {
    use commonTrait;
};
?>
<div class="mt-4">
    <h6 class="fw-bold mb-2">CARS SELECTED FOR PROMO</h6>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Car ID</th>
                    <th>Category</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Variant</th>
                    <th>Mileage</th>
                    <th>Transmission</th>
                    <th>Loan Description</th>
                    <th>Location</th>
                    <th>Car Price (RM)</th>
                    <th>Beautification</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($promoCars as $promoCar)
                                <tr>
                                    <td>{{ $promoCar->carDetail->car_detail_id ?? '-' }}</td>
                                    <td>{{ $promoCar->carDetail->getCarDetailCategory->name ?? '-' }}</td>
                                    <td>{{ $promoCar->carDetail->getVariant->model->brand->brand_name ?? '-' }}</td>
                                    <td>{{ $promoCar->carDetail->getVariant->model->model_name ?? '-' }}</td>
                                    <td>{{ $promoCar->carDetail->getVariant->variant_name ?? '-' }}</td>
                                    <td>{{ $promoCar->carDetail->mileage ?? '-' }}</td>
                                    <td>{{ $promoCar->transmission ?? '-' }}</td>
                                    <td>{{ '-' }}</td>
                                    <td>{{ $promoCar->carDetail->getBranchCenter->name ?? '-' }}</td>
                                    <td>{{ $promoCar->carDetail->car_info_price ?? '-' }}</td>

                                    <td>
                                        <?php
                    $array = $common->beautifyMediaCount($promoCar->carDetail->car_detail_id);
                    $count = 'Photos(' . $array['photos'] . '), Videos(' . $array['videos'] . ')';
                                                                                            ?>
                                        {{ $count }}
                                    </td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="btn me-2 p-2 mb-0" href="{{ route('beautify.edit', $promoCar->id) }}">
                                                {{ $common->isBeautification($promoCar->carDetail->car_detail_id) ? 'Beautify' : 'Edit' }}
                                            </a>
                                            <form method="POST" action="{{ route('deleteSelectCar', $promoCar->id) }}"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm ml-1"><i data-feather="trash-2"
                                                        class="feather-trash-2"
                                                        onclick="return confirm('Are you sure to delete?')"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                @empty
                    <tr>No Data</tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>