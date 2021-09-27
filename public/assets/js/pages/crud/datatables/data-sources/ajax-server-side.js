// "use strict";
// var KTDatatablesDataSourceAjaxServer = function() {

// 	var initTable1 = function() {
// 		var table = $('#kt_datatable');

// 		// begin first table
// 		table.DataTable({
// 			responsive: true,
// 			searchDelay: 500,
// 			processing: true,
// 			serverSide: true,
// 			ajax: {
// 				url:  'https://preview.keenthemes.com/metronic/theme/html/tools/preview/',
// 				type: 'GET',
// 				data: {
// 					// parameters for custom backend script demo
// 					columnsDef: [
// 						'id', 'email',
// 						'first_name', 'last_name', 'avatar', 'Actions'
// 					],
// 				},
// 			},
// 			columns: [
// 				{data: 'id'},
// 				{data: 'email'},
// 				{data: 'first_name'},
// 				{data: 'last_name'},
// 				{data: 'avatar'},
// 				// {data: 'Actions', responsivePriority: -1},
// 			],
// 			columnDefs: [
// 				{
// 					targets: -1,
// 					title: 'Actions',
// 					orderable: false,
// 					render: function(data, type, full, meta) {
// 						return '\
// 							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
// 							<i class="fas fa-cog"></i>\
// 	                        </a>\
// 							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
// 							<i class="fas fa-edit"></i>\
// 							</a>\
// 							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
// 							<i class="fas fa-trash"></i>\
// 							</a>\
// 						';
// 					},
// 				},
// 				// {
// 				// 	width: '75px',
// 				// 	targets: -3,
// 				// 	render: function(data, type, full, meta) {
// 				// 		var status = {
// 				// 			1: {'title': 'Pending', 'class': 'label-light-primary'},
// 				// 			2: {'title': 'Delivered', 'class': ' label-light-danger'},
// 				// 			3: {'title': 'Canceled', 'class': ' label-light-primary'},
// 				// 			4: {'title': 'Success', 'class': ' label-light-success'},
// 				// 			5: {'title': 'Info', 'class': ' label-light-info'},
// 				// 			6: {'title': 'Danger', 'class': ' label-light-danger'},
// 				// 			7: {'title': 'Warning', 'class': ' label-light-warning'},
// 				// 		};
// 				// 		if (typeof status[data] === 'undefined') {
// 				// 			return data;
// 				// 		}
// 				// 		return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
// 				// 	},
// 				// },
// 				// {
// 				// 	width: '75px',
// 				// 	targets: -2,
// 				// 	render: function(data, type, full, meta) {
// 				// 		var status = {
// 				// 			1: {'title': 'Online', 'state': 'danger'},
// 				// 			2: {'title': 'Retail', 'state': 'primary'},
// 				// 			3: {'title': 'Direct', 'state': 'success'},
// 				// 		};
// 				// 		if (typeof status[data] === 'undefined') {
// 				// 			return data;
// 				// 		}
// 				// 		return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
// 				// 			'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
// 				// 	},
// 				// },
// 			],
// 		});
// 	};

// 	return {

// 		//main function to initiate the module
// 		init: function() {
// 			initTable1();
// 		},

// 	};

// }();

// jQuery(document).ready(function() {
// 	KTDatatablesDataSourceAjaxServer.init();
// });



"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

	var initTable1 = function() {
		var table = $('#kt_datatable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: 'https://preview.keenthemes.com/metronic/theme/html/tools/preview//api/datatables/demos/server.php',
				type: 'POST',
				data: {
					// parameters for custom backend script demo
					columnsDef: [
						'OrderID', 'Country',
						'ShipAddress', 'CompanyName', 'ShipDate',
						'Status', 'Type', 'Actions'],
				},
			},
			columns: [
				{data: 'OrderID'},
				{data: 'Country'},
				{data: 'ShipAddress'},
				{data: 'CompanyName'},
				{data: 'ShipDate'},
				{data: 'Status'},
				{data: 'Type'},
				{data: 'Actions', responsivePriority: -1},
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					render: function(data, type, full, meta) {
						return '\
								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
								<i class="fas fa-cog"></i>\
	                            </a>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
								<i class="fas fa-edit"></i>\
							</a>\
							<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
								<i class="fas fa-trash"></i>\
							</a>\
						';
					},
				},
				{
					width: '75px',
					targets: -3,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Pending', 'class': 'label-light-primary'},
							2: {'title': 'Delivered', 'class': ' label-light-danger'},
							3: {'title': 'Canceled', 'class': ' label-light-primary'},
							4: {'title': 'Success', 'class': ' label-light-success'},
							5: {'title': 'Info', 'class': ' label-light-info'},
							6: {'title': 'Danger', 'class': ' label-light-danger'},
							7: {'title': 'Warning', 'class': ' label-light-warning'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-lg font-weight-bold' + status[data].class + ' label-inline">' + status[data].title + '</span>';
					},
				},
				{
					width: '75px',
					targets: -2,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Online', 'state': 'danger'},
							2: {'title': 'Retail', 'state': 'primary'},
							3: {'title': 'Direct', 'state': 'success'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
							'<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
					},
				},
			],
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceAjaxServer.init();
});