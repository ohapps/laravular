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
            $scope.modifcationType = "New";
        }else{
            $scope.application = application;
            $scope.application.category_id = application.category_id.toString();
            $scope.modifcationType = "Edit";
        }
        $('#applicationModal').modal('show');
    }

    $scope.saveApplication = function(){
        $('#applicationModal').modal('hide');
        $('#pleaseWaitDialog').modal('show');
        if($scope.modifcationType == 'New'){
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

    $scope.saveDevice = function(){
        $http.post(
            '/api/device',
            {
                name : $scope.name,
                os : $scope.os
            }).success(function(data){
                $scope.devices.push(data);
                $('#newDeviceModal').modal('hide');
            }
        );
    }

    $scope.saveCategory = function(){
        $http.post(
            '/api/category',
            {
                description : $scope.description
            }).success(function(data){
                $scope.categories.push(data);
                $('#newCategoryModal').modal('hide');
            }
        );
    }

}]);
