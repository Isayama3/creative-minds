@extends('layouts.master', [
    'page_header' => __('الموظفين'),
])
@section('content')
    @include('layouts.partials.components.edit-page', [
        'record' => $record,
        'fields' => $fields,
        'update_route' => $update_route,
        'custom_fields' => [],
    ])
@stop
