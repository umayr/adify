@extends('layout.master')

@section('content')
    <div ng-controller="Ad" class="ad-wrap">
        @include('_includes.ad_modals')
        <div class="row">
            <div class="col-md-5">
                <button class="btn btn-info" data-toggle="modal" data-target="#createAdModal">
                    <i class="fa fa-plus right-spacing x2"></i>Create New
                </button>
                <button class="btn btn-info">
                    <i class="fa fa-line-chart right-spacing x2"></i>Analytics
                </button>
            </div>
            <div class="col-md-7">
                <div class="input-group">
                    <input type="text" ng-model="filterAdText" placeholder="Enter name or anything.." class="form-control"/>
                    <span class="input-group-btn">
                        <button class="btn btn-default">
                            <i class="fa fa-search right-spacing x2"></i>Search
                        </button>
                    </span>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped table-ads-main">
                        <thead>
                            <tr>
                                <td>
                                    <strong>#</strong>
                                </td>
                                <td>
                                    <strong>Name</strong>
                                </td>
                                <td>
                                    <strong>Size</strong>
                                </td>
                                <td>
                                    <strong>Added On</strong>
                                </td>
                                <td>
                                    <strong>Actions</strong>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="ad in ads | filter:filterAdText">
                                <td>@{{ ad.id }}</td>
                                <td>@{{ ad.name }}</td>
                                <td>@{{ ad.size | size}}</td>
                                <td>@{{ ad.added_on | dateFormatting }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="#" class="btn btn-sm btn-primary">
                                          <i class="fa fa-eye right-spacing"></i> View
                                        </a>
                                       <a href="#" class="btn btn-sm btn-info">
                                          <i class="fa fa-edit right-spacing"></i> Edit
                                        </a>
                                       <a href="#" class="btn btn-sm btn-danger">
                                          <i class="fa fa-remove right-spacing"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@stop