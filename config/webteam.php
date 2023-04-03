<?php

return [
	/*
	|--------------------------------------------------------------------------
	| CMS properties
	|--------------------------------------------------------------------------
	|
	*/

	'cms' => [
		/*
		|--------------------------------------------------------------------------
		| Site Path / Slug
		|--------------------------------------------------------------------------
		|
		*/

		'path' => 'webteam',
		
		/*
		|--------------------------------------------------------------------------
		| Custom Menu Links
		|--------------------------------------------------------------------------
		|
		| Add custom menu items for a given CMS site.
		|
		|	[
		|		'heading' => <string>,
		|		'urls' => [
		|			[
		|				'title' => <string>,
		|				'url' => <string> | route(),
		|				'public' => <string> | route() - OPTIONAL
		|			],
		|			...
		|			[
		|				'title' => <string>,
		|				'url' => <string> | route(),
		|				'public' => <string> | route() - OPTIONAL
		|			]
		|		],
		|	],
		|
		*/

		'custom' => [
			[
				'heading' => 'Test',
				'urls' => [
					[
						'title' => 'Hotels',
						'url' => 'h'
					],
					[
						'title' => 'Administrator',
						'url' => 'h'
					],
					[
						'title' => 'Hotels List',
						'url' => 'h'
					]
				],
			],
		],

		/*
		|--------------------------------------------------------------------------
		| Breadcrumbs
		|--------------------------------------------------------------------------
		|
		| Build various breadcrumb structures
		|
		|	'breadcrumb_slug' => [
		|			[
		|				'title' => <string>,
		|				'url' => <string> | route() - OPTIONAL
		|			],
		|			...
		|			[
		|				'title' => <string>,
		|				'url' => <string> | route() - OPTIONAL
		|			]
		|	],
		|
		| Select the desired breadcrumb trail when calling the view() function by
		| including it in the view data.
		|
		|	e.g. return view('index', [
		|			'breadcrumbs' => 'test'
		|		]);
		|
		| Then include $breadcrumbs in the template component on the view.
		|
		|	<x-layout.cms.admin.template :breadcrumbs="$breadcrumbs">
		|	</x-layout.cms.admin.template>
		|
		*/

		'breadcrumbs' => [
			'test' => [
				[
					'title' => 'Hotels',
					'url' => ''
				],
				[
					'title' => 'Administrator',
					'url' => ''
				],
				[
					'title' => 'Hotels List',
					'url' => ''
				]
			],
		]
	],
];