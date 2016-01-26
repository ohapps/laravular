var app = angular.module("laravular", []);

app.controller('MainController', ['$scope','$http', function($scope, $http){

    $http.get('/api/category').success(function(data){
        $scope.categories = data;
    });

    $http.get('/api/device').success(function(data){
        $scope.devices = data;
    });

    $http.get('/api/application').success(function(data){
        $scope.applications = data;
    });

    $scope.orderApps = 'name';

    $scope.toggleDeviceApp = function(device, application, checked){
        if(checked){
            $http.post('/api/device-application', { device_id : device.id, application_id : application.id }).success(function(data){
                application.devices.push(device);
                //alert(angular.toJson(application, true));
            });
        }else{
            $http.delete('/api/device-application?device_id=' + device.id + '&application_id=' + application.id).success(function(data){
                angular.forEach(application.devices, function(appDevice, index){
                    if(device.id == appDevice.id){
                        application.devices.splice(index,1);
                    }
                });
                //alert(angular.toJson(application, true));
            });
        }
    }

    $scope.checkDeviceAppStatus = function(device, application){
        for(i = 0; i < application.devices.length; i++){
            if(application.devices[i].id == device.id){
                return true;
            }
        }
        return false;
    }

    $scope.editApplication = function(application){
        if(application == null){
            $scope.application = {
                id: null,
                portable: 0
            };
            $scope.newRecord = true;
        }else{
            $scope.application = application;
            $scope.application.category_id = application.category_id.toString();
            $scope.newRecord = false;
        }
        $('#applicationModal').modal('show');
    }

    $scope.saveApplication = function(){
        $('#applicationModal').modal('hide');
        $('#pleaseWaitDialog').modal('show');
        if($scope.newRecord == true){
            $http.post(
                '/api/application',
                $scope.application
            ).success(function(data){
                application = data;
                application.devices = new Array();
                $scope.applications.push(application);
                $('#pleaseWaitDialog').modal('hide');
            });
        }else{
            $http.put(
                '/api/application/' + $scope.application.id,
                $scope.application
            ).success(function(data){
                $('#pleaseWaitDialog').modal('hide');
            });
        }
    }

    $scope.deleteApplication = function(){        
        $('#applicationModal').modal('hide');
        $('#pleaseWaitDialog').modal('show');
        $http.delete(
            '/api/application/' + $scope.application.id
        ).success(function(data){
            angular.forEach($scope.applications, function(app, index){
                if($scope.application.id == app.id){
                    $scope.applications.splice(index,1);
                }
            });
            $('#pleaseWaitDialog').modal('hide');
        });
    }

    $scope.editDevice = function(device){
        if(device == null){
            $scope.device = {
                id: null
            };
            $scope.newRecord = true;
        }else{
            $scope.device = device;
            $scope.newRecord = false;
        }
        $('#deviceModal').modal('show');
    }

    $scope.saveDevice = function(){
        $('#deviceModal').modal('hide');
        $('#pleaseWaitDialog').modal('show');
        if($scope.newRecord == true){
            $http.post(
                '/api/device',
                $scope.device
            ).success(function(data){
                $scope.devices.push(data);
                $('#pleaseWaitDialog').modal('hide');
            });
        }else{
            $http.put(
                '/api/device/' + $scope.device.id,
                $scope.device
            ).success(function(data){
                $('#pleaseWaitDialog').modal('hide');
            });
        }
    }

    $scope.deleteDevice = function(){
        $('#deviceModal').modal('hide');
        $('#pleaseWaitDialog').modal('show');
        $http.delete(
            '/api/device/' + $scope.device.id
        ).success(function(data){
            angular.forEach($scope.devices, function(dev, index){
                if($scope.device.id == dev.id){
                    $scope.devices.splice(index,1);
                }
            });
            $('#pleaseWaitDialog').modal('hide');
        });
    }

    $scope.editCategory = function(category){
        if(category == null){
            $scope.category = {
                id: null
            };
            $scope.newRecord = true;
        }else{
            $scope.category = category;
            $scope.newRecord = false;
        }
        $('#categoryModal').modal('show');
    }

    $scope.saveCategory = function(){
        $('#categoryModal').modal('hide');
        $('#pleaseWaitDialog').modal('show');
        if($scope.newRecord == true){
            $http.post(
                '/api/category',
                $scope.category
            ).success(function(data){
                $scope.categories.push(data);
                $('#pleaseWaitDialog').modal('hide');
            });
        }else{
            $http.put(
                '/api/category/' + $scope.category.id,
                $scope.category
            ).success(function(data){
                $('#pleaseWaitDialog').modal('hide');
            });
        }
    }

    $scope.deleteCategory = function(){
        $('#categoryModal').modal('hide');
        $('#pleaseWaitDialog').modal('show');
        $http.delete(
            '/api/category/' + $scope.category.id
        ).success(function(data){
            angular.forEach($scope.categories, function(cat, index){
                if($scope.category.id == cat.id){
                    $scope.categories.splice(index,1);
                }
            });
            $('#pleaseWaitDialog').modal('hide');
        });
    }

    $scope.showConfirmDialog = function(message, callbackFunction){
        $scope.confirmMessage = message;
        $scope.confirmCallback = callbackFunction;
        $('#confirmModal').modal('show');
    }

    $scope.completeConfirmAction = function(){
        $('#confirmModal').modal('hide');
        $scope.confirmCallback();
    }

}]);
