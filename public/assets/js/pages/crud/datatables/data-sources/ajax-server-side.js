"use strict";
var KTDatatablesDataSourceAjaxServer = function() {

	var initRoutesTable = function() {
		var table = $('#routesTable');

		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: 'http://127.0.0.1:8000/api/routes',
				// type: 'POST',
				// method: 'GET',
				dataSrc: '',
				// data: 
				// 	// parameters for custom backend script demo
				// 	[
				// 		'client_id', 'driver_id',
				// 		'starting_point', 'ending_point', 'distance',
				// 		'price' , 'Actions'
				// 	],
				
			},
			// },
			// ajax: {
			// 	create: {
			// 		type: 'POST',
			// 		url:  'http://127.0.0.1:8000/api/routes',
			// 	},
			// 	show: {
			// 		type: 'GET',
			// 		url:  'http://127.0.0.1:8000/api/routes/{id}',
			// 	},
			// 	destroy: {
			// 			type: 'DELETE',
			// 			url:  'http://127.0.0.1:8000/api/routes',
			// 	}
			// },

			columns: [
				
				{data: 'id'},
				{data: 'client_id'},
				{data: 'driver_id'},
				{data: 'starting_point'},
				{data: 'ending_point'},
				{data: 'distance'},
				{data: 'price'},
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
				
			],
		});
	};
	var initCustomersTable = function() {
		var table = $('#customersTable');
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: 'http://127.0.0.1:8000/api/clients',
				dataSrc: '',
			},
			columns: [
				{data: 'id'},
				{data: 'user.id'},
				{data: 'user.name'},
				{data: 'user.avatar'},
				{data: 'user.email'},
				{data: 'user.cin'},
				{data: 'user.phoneNumber'},
				{data: 'user.rate'},
			],
			// columnDefs: [
			// 	{
			// 		targets: 8,
			// 		title: 'Actions',
			// 		orderable: false,
			// 		render: function(data, type, full, meta) {
			// 			return '\
			// 				<tr><a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
			// 					<i class="fas fa-cog"></i>\
	        //                     </a>\
			// 				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
			// 					<i class="fas fa-edit"></i>\
			// 				</a>\
			// 				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
			// 					<i class="fas fa-trash"></i>\
			// 				</a></tr>\
			// 			';
			// 		},
			// 	},
			// ],
		});
	};
	var initDriversTable = function() {
		var table = $('#driversTable');
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: 'http://127.0.0.1:8000/api/drivers',
				dataSrc: '',
			},
			columns: [
				{data: 'id'},
				{data: 'user.id'},
				{data: 'user.name'},
				{data: 'user.avatar'},
				{data: 'user.email'},
				{data: 'user.cin'},
				{data: 'user.phoneNumber'},
				{data: 'user.rate'},
			],
			// columnDefs: [
			// 	{
			// 		targets: 8,
			// 		title: 'Actions',
			// 		orderable: false,
			// 		render: function(data, type, full, meta) {
			// 			return '\
			// 				<tr><a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
			// 					<i class="fas fa-cog"></i>\
	        //                     </a>\
			// 				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
			// 					<i class="fas fa-edit"></i>\
			// 				</a>\
			// 				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
			// 					<i class="fas fa-trash"></i>\
			// 				</a></tr>\
			// 			';
			// 		},
			// 	},
			// ],
		});
	};
	var initReviewsTable = function() {
		var table = $('#reviewsTable');
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			processing: true,
			serverSide: true,
			ajax: {
				url: 'http://127.0.0.1:8000/api/reviews',
				dataSrc: '',
			},
			columns: [
				{data: 'id'},
				{data: 'rating'},
				{data: 'customer_service_rating'},
				{data: 'friendly_rating'},
				{data: 'pricing_rating'},
				{data: 'quality_rating'},
				{data: 'recommend'},
				{data: 'title'},
				{data: 'body'},
				{data: 'approved'},
				{data: 'reviewrateable_id'},
				{data: 'author_id'},
				
			],
			// columnDefs: [
			// 	{
			// 		targets: 8,
			// 		title: 'Actions',
			// 		orderable: false,
			// 		render: function(data, type, full, meta) {
			// 			return '\
			// 				<tr><a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">\
			// 					<i class="fas fa-cog"></i>\
	        //                     </a>\
			// 				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Edit details">\
			// 					<i class="fas fa-edit"></i>\
			// 				</a>\
			// 				<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">\
			// 					<i class="fas fa-trash"></i>\
			// 				</a></tr>\
			// 			';
			// 		},
			// 	},
			// ],
		});
	};
	return {

		//main function to initiate the module
		init: function() {
			initRoutesTable();
			initCustomersTable();
			initDriversTable();
			initReviewsTable();
		},

	};

}();

jQuery(document).ready(function() {
	KTDatatablesDataSourceAjaxServer.init();
});

