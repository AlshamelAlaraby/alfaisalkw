@extends('backend.layouts.app')
@section('title','تصنيفات البوفية')
@section('headerTitle')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    الرئيسية
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="{{route('backend.home')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                </div>
            </div>

        </div>
    </div>
@stop
@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-xl-12 order-lg-2 order-xl-1">
                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                تصنيفات البوفية
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            @can('Create Buffet Category')
                                <a href="{{ route('backend.buffetcategory.create') }}" class="btn btn-primary">إضافة تصنيف للبوفيه</a>
                            @endcan
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="col-xl-12 order-lg-2 order-xl-1">
                            <table id="clientSideDataTable" class="display" style="width:100%;" class="table table-bordered dt-responsive">
                                <thead>
                                <tr>
                                    <th class="tdesign">#</th>
                                    <th class="tdesign">اﻷسم</th>
                                    <th class="tdesign">الصورة</th>
                                    <th class="tdesign">العملية</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($list as $cat)
                                    {{-- @if(!$role->hasRole('Admin')) --}}
                                    <tr>
                                        <td class="tdesign">{{ $loop->iteration }}</td>
                                        <td class="tdesign">{{ $cat->name }}</td>
                                        <td class="tdesign">
                                            <img width="100px" src="{{optional($cat->getFirstMedia('images'))->getUrl()}}"/>
                                        </td>

                                        <td class="tdesign">

                                            @can('Edit Buffet Category')
                                                <a href="{{ route('backend.buffetcategory.edit',$cat->id) }}" class="bluebutton" ><i class="fa fa-edit"></i></a>&nbsp;
                                            @endcan

                                            @can('Delete Buffet Category')
                                                <a title="Delete" href="#" data-action="{{route('backend.buffetcategory.destroy',$cat->id)}}" class="redbutton deleteRecord"><i class="fa fa-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@include('backend.layouts.partial.datatable')