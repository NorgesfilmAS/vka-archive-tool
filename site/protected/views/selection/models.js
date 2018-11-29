/* 
 * 
 */
app.factory('Fields',function() {
	var items = {
		elements : [
			 {
				 attribute: 'count',
				 type			: 'recordcount',
				 label		: 'Count in group',
				 query		: 0,
				 group		: 0,
				 body			: 0,
				 header		: 1
			 },
/*			 
			 {
				 attribute: 'resource_type',
				 type			: 'dropdown',
				 data			: [
											{ id: 3, label : 'Art' },
											{ id: 4, label : 'Artist'}
										],	
				 compare	: '=',						
				 label		: 'type',
				 query		: 1,
				 group		: 1,
				 body			: 0,
				 header		: 0
			 },
*/			 
			 { 
				attribute : 'id',
				type			: 'text',
				label			: 'Id',
				query			: 0,
			},
			 
			 { 
				attribute : 'title',
				type			: 'text',
				label			: 'Title',
			},
			{
				attribute : 'agent',
				type			: 'text',
				label			: 'Artist',				
			},
			{
				attribute : 'year',
				type			: 'text',
				label			: 'Year',
			},	
			{
				attribute : 'agent_id.gender',
				type			: 'dropdown',
				label			: 'Gender',
 			  data			: [
											{ id: '', label: ''},
											{ id: 'Male',		label : 'Male' },
											{ id: 'Female', label : 'Female'}
										],	
				compare	: '=',						
				query		: 1,
				group		: 1,
				body		: 1,
				header	: 1
				
			},
			{
				'attribute' : 'collection',
				'type'			: 'dropdown',
				'label'			: 'collection',
				'compare'		: 'contains',
				'data'			: typeof collections === 'undefined' ? [] : collections,
				'query'			: 1,
				'group'			: 0,
				'body'			: 1,
				'header'		: 1,
			},
			{
				attribute : 'decennia',
				type			: 'text',
				label			: 'Decennia',
				query			: false,			// do not show in query interface
			},
			{
				attribute : 'seconds',
				type			: 'text',
				label			: 'Seconds',
				query			: 0,
				group			: 0,
				body			: 1,
				header		: 0
			},
			{
				attribute : 'seconds',
				type			: 'sum',
				label			: 'Total time',
				format		: 'time',
				query			: 0,
				group			: 0,
				body			: 0,
				header		: 1
			},

			{
				attribute : 'masterFileSize',
				type			: 'text',
				label			: 'Size master file',
				query			: 0,
				group			: 0,
				body			: 1,
				header		: 0
			},
			{
				attribute : 'masterFileSizeBytes',
				type			: 'sum',
				label			: 'Total Size',
				format		: 'bytes',
				query			: 0,
				group			: 0,
				body			: 0,
				header		: 1
			},
			{
				attribute : 'is_digitized',
				type			: 'text',
				label			: 'Digitized',
				query			: 0,
				group			:	0,
				header		: 0,
				body			: 1
			},
			{
				attribute : 'tags_gama',
				type			: 'split',
				label			: 'Gama tags',
				query			: 0,
				group			:	0,
				header		: 0,
				body			: 1
			},
			{
				attribute : 'format',
				type			: 'text',
				label			: 'Format',
				query			: 0,
				group			:	0,
				header		: 0,
				body			: 1				
			}
		]
	};
	return {
		list : function(scope, model) {
			model = typeof model === 'undefined' ? 'list' : model;
			scope[model] = items;
		}
	};
});


