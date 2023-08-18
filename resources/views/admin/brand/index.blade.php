@extends('admin.master')
@section('content')
    <div>
        <livewire:brand-show>
    </div>
@endsection
@section('script')
    <script>
window.addEventListener('close-model', event => {
    $('#addBrand').modal('hide');
    $('#editBrandModal').modal('hide');
    $('#deleteBrandModal').modal('hide');

})

</script>
@endsection
