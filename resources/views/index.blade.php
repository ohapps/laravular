@extends('layouts.master')

@section('content')
<div ng-controller="MainController">

    <div id="main-grid">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default" ng-click="editApplication(null)">
              <span class="glyphicon glyphicon-console" aria-hidden="true"></span> New Application
            </button>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newDeviceModal">
              <span class="glyphicon glyphicon-phone" aria-hidden="true"></span> New Device
            </button>
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#newCategoryModal">
              <span class="glyphicon glyphicon-tag" aria-hidden="true"></span> New Category
            </button>
        </div>
        <div class="panel panel-default">
            <table class="table table-striped">
                <tr>
                    <th></th>
                    <th ng-repeat="device in devices">@{{ device.name }}</th>
                </tr>
                <tr ng-repeat-start="category in categories">
                    <th>@{{ category.description }}</th>
                    <th ng-repeat="device in devices"></th>
                </tr>
                <tr ng-repeat="application in applications | filter: {category_id:category.id} | orderBy:orderApps" ng-repeat-end>
                    <td><a ng-click="editApplication(application)">@{{ application.name }}</a></td>
                    <td ng-repeat="device in devices"><input type="checkbox" ng-model="checked" ng-checked="checkDeviceAppStatus(device,application)" ng-click="toggleDeviceApp(device,application,checked)"></td>
                </tr>
            </table>
        </div>
    </div>

    <div id="applicationModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">@{{modifcationType}} Application</h4>
          </div>
          <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="name" class="control-label">Name:</label>
                  <input type="text" class="form-control" id="name" ng-model="application.name">
                </div>
                <div class="form-group">
                  <label for="category_id" class="control-label">Category:</label>
                  <select class="form-control" id="category_id" ng-model="application.category_id">
                    <option ng-repeat="category in categories" value="@{{ category.id }}">@{{ category.description }}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>
                      <input type="checkbox" id="portable" ng-true-value="1" ng-false-value="0" ng-model="application.portable"> Portable
                  </label>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="saveApplication()">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div id="newDeviceModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Device</h4>
          </div>
          <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="name" class="control-label">Name:</label>
                  <input type="text" class="form-control" id="name" ng-model="name">
                </div>
                <div class="form-group">
                  <label for="name" class="control-label">Operating System:</label>
                  <input type="text" class="form-control" id="os" ng-model="os">
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="saveDevice()">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div id="newCategoryModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Category</h4>
          </div>
          <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="name" class="control-label">Description:</label>
                  <input type="text" class="form-control" id="description" ng-model="description">
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" ng-click="saveCategory()">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div id="pleaseWaitDialog" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Processing...
                </div>
                <div class="modal-body">
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped active" role="progressbar"
                      aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
