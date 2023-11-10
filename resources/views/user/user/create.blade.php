@extends('layouts.master', [
    'page_header' => __('الموظفين'),
])


@section('content')
@include('layouts.partials.components.create-page', [
    'fields'=> $fields,
    'store_route' => $store_route,
    'custom_fields'=>[]
])
@stop