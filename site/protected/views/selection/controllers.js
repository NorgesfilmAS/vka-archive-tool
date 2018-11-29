/*
 * this is the controllers.js
 * 
 * this is version 1.
 */

app.controller('SelectController', ['$scope', '$rootScope', '$log', '$http','$timeout', 'Fields', function ($scope, $rootScope,$log, $http, $timeout, Fields) {
		
	
	$scope.messageError = false;
	$scope.messageInfo = false;
	$scope.showWait = false;
	
	$scope.navState = 'select'; // select|order
	$scope.state='preview';			// preview|design|save|load
	$scope.form = [];						// the form with the select/order fields
	$scope.model = {
		'model' : 'Art'
	};
	$scope.result = '';
	$scope.selected = [];
	
	$scope.queryFields = [];		// fields defined in $scope.form | filter (query:1)
	
	$scope.allowedOrderFields = [];
	$scope.orderFields = [];			// array of names
	// array of {attribute, label, order, fields: [ {attribute, label},.. ]
	$scope.headerFields = [];			// fields allowed in a group header { attribute, label }
	$scope.showHeaderFields = [];
	
	$scope.groupFields = [];			// if in orderFields[x].group then structure { attribute, fields[] }
	$scope.alloweBodyFields = [];
	$scope.bodyFields = [];				// array of names
	$scope.allowedBodyFields = [];
	$scope.reports = [];					// list of reports
	
	$scope.store = {
		reportFilename : '',
		reportUserFilename : ''
	};	
	
	$scope.reportData = '';
	$scope.recordCount = '';
	$scope.canExport = false;
	
	$scope.$watch('config.isLoaded', function(newValue) {		
		if (newValue) {
			$log.log('loading fields', newValue);
			Fields.list($scope, 'form');
			$scope.reportLoadAll();
		}
	});
	
	$scope.$watch('form', function(newValue) {
		if (newValue) {
			$http({
				url: $rootScope.config.serverUrl + 'quickload/guid/' + $rootScope.config.deviceGuid
			}).success(function(response) {
				$scope.load(response.data);
			});
			$log.log('form loaded', newValue);			
			$scope.queryFields = [];
			$scope.headerFields = [];
			$scope.allowedOrderFields = [];
			for (var l = 0; l < newValue.elements.length; l++) {
				var field = newValue.elements[l];
				if (typeof field.query === 'undefined' || field.query === 1) {
					$scope.queryFields.push(field);
				};
				if (typeof field.group === 'undefined' || field.group === 1) {
					$scope.allowedOrderFields.push({ 
							attribute: field.attribute, 
							label : field.label,
							format : field.format,
							order : 'asc'
					});
				};
				if (typeof field.header === 'undefined' || field.header === 1) {
					$scope.headerFields.push({
						attribute : field.attribute, 
						label: field.label,
						format : field.format,
						type: field.type
					});
					
				} 
				if (typeof field.body === 'undefined' || field.body === 1) {
					$scope.allowedBodyFields.push({
						attribute : field.attribute,
						label : field.label
					});
				}	
			}
			$log.log('allowedOrderFields', $scope.allowedOrderFields);
			$log.log('headerFields', $scope.headerFields);
			$log.log('queryFields', $scope.queryFields);
		}		
	});
	
  $scope.$watch('messageInfo',function(newValue) {
    $timeout.cancel($rootScope.infoPromise);
    if (newValue) {
      $scope.infoPromise = $timeout(function() {
        $scope.messageInfo = '';
      },4000);
    } 
  });

	
	/**
	 * add a field to the order / grouping fields 
	 * 
	 * @param {integer} index
	 */
	$scope.orderAdd = function(index) {  // index in orderFields to add
		$scope.orderFields.push({ 
			attribute: $scope.allowedOrderFields[index].attribute, 
			label : $scope.allowedOrderFields[index].label,
			order : $scope.allowedOrderFields[index].order,
			fields:[]
		});
		$scope.quickSave();
		$log.log('orderFields',$scope.orderFields );
	};
	$scope.bodyAdd = function(index) {
		$scope.bodyFields[$scope.bodyFields.length] = $scope.allowedBodyFields[index].attribute;		
		$scope.quickSave();
	};
	$scope.headerAdd = function(parentIndex, index) {
		$log.log('headerAdd', parentIndex, $scope.orderFields, index);
		$scope.orderFields[parentIndex].fields.push($scope.headerFields[index]);
		$scope.quickSave();
	};
	/**
	 * find the attribute in the orderFields
	 * @param {string} attribute
	 * @returns {integer}
	 */
	$scope.orderIndex = function(attribute) {
		for (var index = 0; index < $scope.orderFields.length; index++) {
			if (attribute === $scope.orderFields[index].attribute) {
				return index;
			}
		}
		return -1;
	};
	$scope.allowedOrderIndex = function(attribute) {
		for (var index = 0; index < $scope.allowedOrderFields.length; index++) {
			if (attribute === $scope.allowedOrderFields[index].attribute) {
				return index;
			}
		}
		return -1;
	};
	$scope.headerIndex = function(parentIndex, attribute) {
		for (var index=0; index < $scope.orderFields[parentIndex].fields.length; index++) {
			if (attribute=== $scope.orderFields[parentIndex].fields[index].attribute) {
				return index;
			}
		}
		return -1;
	};
	$scope.fieldIndex = function(attribute) {
		for (var index = 0; index < $scope.orderFields.length; index++) {
			if (attribute === $scope.orderFields[index].attribute) {
				return index;
			}
		}
		return -1;		
	};
	
	
	/**
	 * remove one element by name
	 * @param {string} index
	 * 
	 */

	$scope.orderRemove = function(index) {
		if (index > -1) {
			$scope.orderFields.splice(index, 1);
			$scope.quickSave();
		}
	};
	$scope.bodyRemove = function(attribute) {
		var index = $scope.bodyFields.indexOf(attribute);
		if (index > -1) {
			$scope.bodyFields.splice(index, 1);
			$scope.quickSave();
		}
	};
	$scope.headerRemove = function(parentIndex, index) {
		$scope.orderFields[parentIndex].fields.splice(index, 1);
			$scope.quickSave();
	};
	
	/**
	 * return the label of the the attribute
	 * @param {string} attribute
	 * @returns {string}
	 */
	$scope.orderLabel = function(attribute) {

		var index = $scope.allowedOrderIndex(attribute);
		if (index > -1) {
			return $scope.allowedOrderFields[index].label;
		}
		return '(none)';
	};
	$scope.bodyLabel = function(attribute) {
		for (var index=0; index < $scope.allowedBodyFields.length; index ++) {
			if ($scope.allowedBodyFields[index].attribute === attribute) {
				return $scope.allowedBodyFields[index].label;
			}
		}
		return '(none)';
	};

	/**
	 * returns the ordering in a human readable form
	 * @param {object} attribute
	 * @returns {String}
	 */
	$scope.orderSort = function(attribute) {
		switch(attribute.order) {
			case 'desc' : return 'descending';
			case 'group' : return 'group';
			default : return 'ascending';
		}
	};
	
	$scope.orderSortNext = function(index) {		
		
		if ($scope.orderFields[index].order === 'asc') {
			$scope.orderFields[index].order = 'desc';
		} else if ($scope.orderFields[index].order === 'desc') {
			$scope.orderFields[index].order = 'group';
		} else {
			$scope.orderFields[index].order = 'asc';
		}
		$log.log($scope.orderFields[index]);
		$scope.quickSave();
	};
	
	$scope.orderMoveUp = function(index) {
		if (index > 0) {
			var a = $scope.orderFields[index - 1];
			$scope.orderFields[index - 1] = $scope.orderFields[index];
			$scope.orderFields[index] = a;
			$scope.quickSave();
		}
	};
	$scope.bodyMoveUp = function(attribute) {
		var index = $scope.bodyFields.indexOf(attribute);
		if (index > 0) {
			var a = $scope.bodyFields[index - 1];
			$scope.bodyFields[index - 1] = $scope.bodyFields[index];
			$scope.bodyFields[index] = a;
			$scope.quickSave();
		}
	};
	
	$scope.orderMoveDown = function(index) {
		if (index >= 0 && index < $scope.orderFields.length) {
			var a = $scope.orderFields[index + 1];
			$scope.orderFields[index + 1] = $scope.orderFields[index];
			$scope.orderFields[index] = a;
			$scope.quickSave();			
		}
	};
		
	$scope.bodyMoveDown = function(attribute) {
		var index = $scope.bodyFields.indexOf(attribute);
		if (index >= 0 && index < $scope.bodyFields.length) {
			var a = $scope.bodyFields[index + 1];
			$scope.bodyFields[index + 1] = $scope.bodyFields[index];
			$scope.bodyFields[index] = a;
			$scope.quickSave();
		}
	};
	/******************************************
	 * Saving, Loading, Quick, Named
	 */
		
	/**
	 * save the report to the server just to keep the user from loosing information
	 * @returns 
	 */
	$scope.quickSave = function() {
//		$scope.errorMessage = false;
		$scope.canExport = false;
		$http({
        url: $rootScope.config.serverUrl + 'quicksave/guid/' + $rootScope.config.deviceGuid,
        method: "POST",
        data: $scope.reportInfo() // JSON.stringify($scope.model),
		}).error(function (data) {
			//$scope.errorMessage = data;
		});	
	};
	
	/**
	 * return the design of the report
	 * 
	 * @returns {array}
	 */
	$scope.design = function() {
		var design = {
			order : $scope.orderFields,
			fields : $scope.bodyFields
		};
		return design;
		for (var index = 0; index < $scope.orderFields.length; index++) {
			var attributeName = $scope.orderFields[index].attribute;
			var index = $scope.allowedOrderIndex(attributeName);
			
			
			for (var l=0; l < $scope.allowedOrderFields.length; l++) {
				if ($scope.allowedOrderFields[l].attribute === attributeName) {
					var attribute = $scope.allowedOrderFields[l];
					design.order.push({ 
						attribute: attributeName, 
						order : attribute.order, 
						group: 0 });
					break;
				}
			}
		}
		return design;
	};
	
	/**
	 * load the report into the designer 
	 * 
	 * @param {array} data Use load() for an empty report
	 */
	$scope.load = function(data) {		
		if (typeof data === 'undefined') {
			data = [];
		}
		$log.log('loading:  ', data);
		$scope.store.reportFilename = data['name'];
		if (typeof data.select !== 'undefined') {
			for(var l = 0; l < data.select.length; l++) {
				for (var index=0; index < $scope.queryFields.length; index++) {
					if ($scope.queryFields[index].attribute === data.select[l].attribute) {
						$scope.queryFields[index].value = data.select[l].value;
						break;
					}
				}
			}
		} else {
			for (var index=0; index < $scope.queryFields.length; index++) {
				$scope.queryFields[index].value = '';
			}
		}
		if (typeof data.report !== 'undefined') {
			var report = data.report;
			if (typeof report.fields !== 'undefined') {
				$scope.bodyFields = report.fields;
			} else {
				$scope.bodyFields = [];
			}
			$scope.orderFields = [];
			if (typeof report.order !== 'undefined') {
				for (var l = 0; l < report.order.length; l++) {
					var index = $scope.allowedOrderIndex(report.order[l].attribute);
					if (index >= 0) {
						$scope.orderFields.push({ 
								attribute: report.order[l].attribute, 
								label : $scope.allowedOrderFields[index].label,
								order : report.order[l].order,
								format: report.order[l].format,
								fields: report.order[l].fields
						});
					}
				} 
				$log.log('order:', $scope.orderFields, report.order);
			} else {
				$scope.orderFields = []; // reset it
				for (var index=0; index < $scope.allowedOrderFields.length; index++) {
					$scope.allowedOrderFields[index].group = 0;
					$scope.allowedOrderFields[index].order = 'asc';
				}
			}			
		} else {
			$scope.bodyFields = [];
			$scope.orderFields = [];
			for (var index=0; index < $scope.allowedOrderFields.length; index++) {
				$scope.allowedOrderFields[index].group = 0;
				$scope.allowedOrderFields[index].order = 'asc';
			}
		}
		$scope.quickSave();
	};
		
	
	/** 
	 * return the full defintion of the report
	 * @param {string} name 
	 * @returns array
	 */
	$scope.reportInfo = function(name)	{
		if (typeof name === 'undefined') {
			name = $scope.store.reportFilename;
		}
	  var def = {
			model : 'Art',
			report : $scope.design(),
			select : [],
			name: name
		};
		$log.log($scope.model);
		for (var l = 0; l < $scope.queryFields.length; l++) {
			var e = $scope.queryFields[l];
			if (typeof e.value !== 'undefined' && e.value.toString().trim() !== '') {
				var d = { attribute : e.attribute, value : e.value };
				if (typeof e.compare !== 'undefined') { d.compare = e.compare; }
				def.select.push(d);
			}
		}
		return def;
	};	
	
	$scope.submit = function() {	
		$scope.designState = false;
		$scope.canExport = false;
		$scope.showWait = true;
		$scope.reportData = '';
		$rootScope.errorMessage = false;
		$http({
        url: $rootScope.config.serverUrl + 'show/guid/' + $rootScope.config.deviceGuid,
        method: "POST",
        data: $scope.reportInfo() // JSON.stringify($scope.model),
		}).success(function (response) {
			$scope.showWait = false;
			if (response.status.success) {
				$rootScope.selectionChanged = true;	
				$scope.recordCount = response.data.count;
				$scope.loadSelection();
				$scope.canExport = true;
			} else {
				$rootScope.errorMessage = response.status.message;
			}
		}).error(function (data, status, headers, config) {
			$scope.showWait = false;
			$rootScope.errorMessage = 'Unexpected error';
		});
	};
	
	
	/**
	 * returns the group information from the fields
	 * 
	 * @param {string} attribute
	 * @returns {array}
	 */
	$scope.groupFields = function(attribute) {
		return [];  
	};
	
	
	$scope.loadSelection = function()
	{
		$scope.showWait = true;
		$http({
        url: $rootScope.config.serverUrl + 'report/guid/' + $rootScope.config.deviceGuid
		}).success(function (response) {			
			$scope.reportData = response;
			$scope.showWait = false;
			//$scope.reportData = 'SEND SOMETHING';
		}).error(function (response) {
			$rootScope.errorMessage = 'Unexpected error:' + response;
			$scope.showWait = false;
		});
	};
	/**
	 * reload the list of reports
	 */
	$scope.reportLoadAll = function()	{
		$http({
			url: $rootScope.config.serverUrl + 'listReports',
			method: "GET"
		}).success(function (response) {
			$scope.reports = response.data;
		});
	};

	/**
	 * return true if it's save to go to an other report
	 * @returns false|true
	 */
	$scope.reportOnDirtySave = function() {
		return true;
	};
	/**
	 * create an empty report
	 */
	$scope.reportNew = function() {
		if (!$scope.reportOnDirtySave()) { return; };
		$scope.stateReset();
		$scope.load();
		$scope.store.reportFilename = '';
		$scope.store.reportUserFilename = $scope.storeFilename;
	};
	/**
	 * Saves or renames the report
	 */
	$scope.reportSave = function() {
		$log.info('Save report');
		$scope.stateReset();
		$http({
        url: $rootScope.config.serverUrl + 'save',
        method: "POST",
        data: $scope.reportInfo() // JSON.stringify($scope.model),
		}).success(function(reponse) {			
			$scope.messageInfo = 'The report has been saved';
		}).error(function (response) {
			$scope.errorMessage = response;
		});
	};
	/**
	 * return true if the report name is unique
	 */
	$scope.reportNameUnique = function() {
//		$log.log('$scope.reports',$scope.reports);
		return $scope.reports.indexOf($scope.store.reportUserFilename) < 0;
	};
/*	
	$scope.reportOpen = function(name) {
		$scope.stateReset();
		if (!$scope.reportOnDirtySave()) { return; };
		$log.info('Load report');
		if (typeof name !== 'undefined') {
			$scope.store.reportUserFilename = name;
		}
		$http({
					url : $rootScope.config.serverUrl + 'load', 
					method : 'POST',
					data:	$.param({name : $scope.store.reportUserFilename}),
					headers: { 'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
			 }).success(function(response) {
			if (response.status.success) {
				$scope.load(response.data);
				$scope.store.reportFilename = $scope.store.reportUserFilename;
				$scope.messageInfo = 'Report loaded';
//				$scope.state = 'preview';
			} else {
				$scope.messageError = 'There was an error.' + response.statue.message;
			}	
		}).error(function(response) {
			$scope.messageError = response;
		});
	};
*/
	$scope.reportOpen = function(name) {
		$log.log('open report', name);
		$http({
			url : $rootScope.config.serverUrl + 'setActive/guid/' + $rootScope.config.deviceGuid, 
			method : 'POST',
			data:	$.param({name : name}),
			headers: { 'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
		}).success(function(response) {
			if (response.status.success) {
				window.location.assign(response.data.url);
			} else {
				$scope.errorMessage = response.status.message;
			}
		}).error(function(response) {
			$log.error('Error opening report', response);
			$scope.errorMessage = response;
		});
	};
	
	$scope.reportDelete = function(name) {
		$scope.stateReset();
		if (!confirm('Do you want to delete the report "'+$scope.store.reportFilename+'"?')) {return;}
		$http({
			url : $rootScope.config.serverUrl + 'delete', 
			method : 'POST',
			data:	$.param({name : $scope.store.reportFilename}),
			headers: { 'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}			
		}).success(function(response) {
			window.location = $rootScope.config.serverUrl;
		});
	};
	
	
	$scope.reportExport = function() {
		window.open($rootScope.config.serverUrl + 'export/guid/' + $rootScope.config.deviceGuid);
	};
	/**
	 * general purpose routine
	 */
	
	/**
	 * reset the error / info state
	 */	
	$scope.stateReset = function()
	{
		$scope.messageError = '';
		$scope.messageInfo = '';
	};
	
	$scope.processResponse = function(response, message) {
		if (response.status && response.status.success) {
			$scope.messageInfo  = message;
		} else if (response.status) {
			$scope.messageError = response.status.message;
		} else {
			$scope.messageError = response;
		}
	};
	
	$scope.showDialog = function() {
		$log.log('open dialog');
		$('#id-dialog-reportname').modal('show');
	};
	
	/**
	 * create the report retuns an error if the report exists
	 * 
	 */
	$scope.newReport = function() {
		
		$http({
			url : $rootScope.config.serverUrl + 'create/guid/' + $rootScope.config.deviceGuid, 
			method : 'POST',
			data:	$.param({name : $scope.store.reportFilename}),
			headers: { 'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}			
		}).success(function(response) {
			if (response.status.success) {
				window.location.assign(response.data.url);
			} else {
				$scope.errorMessage = response.status.message;
			}
		}).error (function(response) {
			$scope.errorMessage = response;
		});		
	};
	
	$scope.sayIt = function() {
		alert('yes we ')
		$log.info('Say it');
	};
	$log.info('Starup SelectController');	
}]);
